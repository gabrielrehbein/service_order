<?php

namespace App\Http\Controllers;

use App\Actions\Product\CreateProductAction;
use App\Actions\Product\DeleteProductAction;
use App\Actions\Product\EditProductAction;
use App\Actions\Product\FilterProductAction;
use App\Actions\Product\GetAllProductAction;
use App\DTOs\CreateProductDTO;
use App\DTOs\EditProductDTO;
use App\DTOs\ProductFilterDTO;
use App\Filters\Product\ProductFilter;
use App\Http\Requests\StoreProductRequest;
use App\Http\Requests\UpdateProductRequest;
use App\Models\Product;
use App\Services\Generic\HandleNumericService;
use Illuminate\Http\Request;

class ProductController extends Controller
{

    public function index(Request $request, GetAllProductAction $getAllProductsAction, FilterProductAction $filterProductAction)
    {

        if(($request->filled("search"))){
            $filters = ProductFilterDTO::fromArray($request->all());
            $products = $filterProductAction->execute($filters);
            return view("list-products", [
                "products" => $products
            ]);
        }
        $filters = ProductFilterDTO::fromArray($request->all());
        $products = $getAllProductsAction->execute();
        return view("list-products", [
            "products" => $products
        ]);
    }

    public function seed(CreateProductAction $createProductAction)
    {
        $products = [
            [
                "name" => "Produto Genérico 1",
                "description" => "Descrição do produto genérico 1",
                "cost_price" => 10,
                "sale_price" => 30,
                "quantity" => 10
            ],
            [
                "name" => "Teclado Mecânico",
                "description" => "Teclado mecânico RGB switch blue",
                "cost_price" => 120,
                "sale_price" => 250,
                "quantity" => 15
            ],
            [
                "name" => "Mouse Gamer",
                "description" => "Mouse gamer com 7200 DPI",
                "cost_price" => 50,
                "sale_price" => 120,
                "quantity" => 20
            ],
            [
                "name" => "Monitor 24 Polegadas",
                "description" => "Monitor Full HD 144Hz",
                "cost_price" => 700,
                "sale_price" => 1100,
                "quantity" => 5
            ],
            [
                "name" => "Notebook",
                "description" => "Notebook Intel i5 16GB RAM SSD 512GB",
                "cost_price" => 2500,
                "sale_price" => 3700,
                "quantity" => 3
            ],
            [
                "name" => "Headset Gamer",
                "description" => "Headset surround com microfone",
                "cost_price" => 80,
                "sale_price" => 180,
                "quantity" => 12
            ],
        ];

        foreach ($products as $product) {

            $dto = CreateProductDTO::fromArray($product);

            $createProductAction->execute($dto);
        }
        return redirect("products.index");
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view("create-product");
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreProductRequest $request, CreateProductAction $createProductAction)
    {
        $data = $request->validated();

        $dto = CreateProductDTO::fromArray($data);
        $createProductAction->execute($dto);
        return redirect()->route("products.index")->with("success", true);
    }

    /**
     * Display the specified resource.
     */
    public function show(Product $product)
    {
        return view("detail-product", ["product" => $product]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Product $product)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(
        UpdateProductRequest $request, Product $product, EditProductAction $editProductAction
    )
    {
        $editProductDTO = EditProductDTO::fromArray($request->validated());
        $editProductAction->execute($product, $editProductDTO);
        return redirect()->route("products.index")->with("success", true);
    }

    public function delete(Product $product){
        return view("delete-product", ["product" => $product]);
    }
    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Product $product, DeleteProductAction $deleteProductAction)
    {
        $deleteProductAction->execute($product);
        return redirect()->route("products.index")->with("success", true);
    }
}
