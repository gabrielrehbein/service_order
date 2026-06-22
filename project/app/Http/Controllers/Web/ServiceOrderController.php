<?php

namespace App\Http\Controllers\Web;

use App\Enums\OrderServiceStatus;
use App\Http\Controllers\Controller;
use App\Http\Requests\StoreServiceOrderRequest;
use App\Http\Requests\UpdateServiceOrderRequest;
use App\Models\Product;
use App\Models\ServiceOrder;
use App\Models\Vehicle;
use Illuminate\Http\Request;

class ServiceOrderController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $serviceOrders = ServiceOrder::all();
        return view("order_service/list-order-service", ["serviceOrders" => $serviceOrders]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('order_service/create-order-service', [
            'vehicles' => Vehicle::all(),
            'products' => Product::all(),
            'statuses' => [
                'pending' => 'Aberta',
                'in_progress' => 'Em andamento',
                'completed' => 'Concluída',
                'cancelled' => 'Cancelada',
            ],
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreServiceOrderRequest $request)
    {
        $data = $request->validated();

        $totalProductsValue = 0;

        foreach ($data["products"] ?? [] as $productId) {
            $product = Product::findOrFail($productId);
            $totalProductsValue += $product->sale_price;
        }

        $totalValue = $totalProductsValue + $data["service_value"] - $data["discount"];
        $data["total_value"] = $totalValue;
        $data["status"] = OrderServiceStatus::PENDING->value;

        ServiceOrder::create($data);
    }


    /**
     * Display the specified resource.
     */
    public function show(ServiceOrder $orderService)
    {


        return view(
            'order_service/detail-order-service',
            [
                'orderService' => $orderService
            ]
        );
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(ServiceOrder $serviceOrder)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateServiceOrderRequest $request, ServiceOrder $serviceOrder)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(ServiceOrder $serviceOrder)
    {
        //
    }


public function seed()
{
    $vehicles = Vehicle::all();
    $products = Product::all();

    if ($vehicles->isEmpty()) {
        return redirect()->back()->with(
            'error',
            'Cadastre veículos antes de gerar ordens de serviço.'
        );
    }

    $problems = [
        'Troca de óleo e filtros',
        'Freios apresentando ruído',
        'Motor falhando em marcha lenta',
        'Suspensão dianteira com folga',
        'Troca de correia dentada',
        'Ar-condicionado sem refrigeração',
        'Vazamento de óleo no motor',
        'Alinhamento e balanceamento',
        'Bateria descarregando',
        'Troca de amortecedores'
    ];

    $results = [
        'Serviço realizado com sucesso.',
        'Peças substituídas e sistema testado.',
        'Problema identificado e corrigido.',
        'Veículo liberado após testes.',
        'Componentes desgastados substituídos.',
        'Sistema revisado e funcionando normalmente.',
        'Falha eliminada após manutenção.',
        'Todos os testes aprovados.'
    ];

    for ($i = 0; $i < 20; $i++) {

        $vehicle = $vehicles->random();

        $startedAt = now()->subDays(rand(1, 90));
        $finishedAt = (clone $startedAt)->addHours(rand(1, 48));

        $serviceValue = rand(100, 1000);
        $discount = rand(0, 100);

        $serviceOrder = ServiceOrder::create([
            'status' => OrderServiceStatus::COMPLETED->value,
            'service_value' => $serviceValue,
            'discount' => $discount,
            'total_value' => 0,
            'problem_description' => $problems[array_rand($problems)],
            'result_description' => $results[array_rand($results)],
            'vehicle_id' => $vehicle->id,
            'started_at' => $startedAt,
            'finished_at' => $finishedAt,
        ]);

        $totalProductsValue = 0;

        if ($products->isNotEmpty()) {

            $selectedProducts = $products->random(
                rand(1, min(5, $products->count()))
            );

            $pivotData = [];

            foreach ($selectedProducts as $product) {

                $quantity = rand(1, 5);

                $pivotData[$product->id] = [
                    'quantity' => $quantity,
                    'unit_price' => $product->sale_price,
                ];

                $totalProductsValue +=
                    $product->sale_price * $quantity;
            }

            $serviceOrder->products()->attach($pivotData);
        }

        $serviceOrder->update([
            'total_value' =>
                $serviceValue +
                $totalProductsValue -
                $discount
        ]);
    }
    return redirect()
        ->route('order_service.index')
        ->with('success', 'Ordens de serviço criadas com sucesso.');
}
}
