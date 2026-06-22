<?php

namespace App\Http\Controllers\Web;

use App\Enums\OrderServiceStatus;
use App\Http\Controllers\Controller;
use App\Http\Requests\StoreServiceOrderRequest;
use App\Http\Requests\UpdateServiceOrderRequest;
use App\Models\Product;
use App\Models\ServiceOrder;

class ServiceOrderController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreServiceOrderRequest $request)
    {
        $data = $request->validated();

        $totalProductsValue = 0;

        foreach ($data["products"] as $productId) {
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
    public function show(ServiceOrder $serviceOrder)
    {
        //
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
}
