<?php

namespace App\Http\Controllers\Web;

use App\Actions\Product\FilterProductAction;
use App\DTOs\Product\ProductFilterDTO;
use App\Enums\StockFilterStatus;
use App\Http\Controllers\Controller;
use App\Models\ServiceOrder;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Http\Request;

class PDFController extends Controller
{
    public function listProductsWithoutStockRelatory(Request $request, FilterProductAction $filterProductAction){
        $productFilterDTO = ProductFilterDTO::fromArray(
            [
                "in_stock" => StockFilterStatus::FALSE->value
            ]
        );
        $products = $filterProductAction->execute($productFilterDTO);
        $pdf = Pdf::loadView(
            "list-products-without-stock-relatory",
            ["products" => $products]
        );
        return $pdf->stream('relatorio.pdf');
    }

    public function printOrderService(ServiceOrder $orderService)
    {

        $pdf = Pdf::loadView(
            'order_service/print-order-service',
            [
                'orderService' => $orderService
            ]
        );

        return $pdf->stream(
            "ordem-servico-{$orderService->id}.pdf"
        );
    }
}
