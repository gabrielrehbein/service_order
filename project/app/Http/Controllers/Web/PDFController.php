<?php

namespace App\Http\Controllers\Web;

use App\Actions\Product\FilterProductAction;
use App\DTOs\Product\ProductFilterDTO;
use App\Enums\StockFilterStatus;
use App\Http\Controllers\Controller;
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
}
