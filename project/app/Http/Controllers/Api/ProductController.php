<?php

namespace App\Http\Controllers\Api;

use App\Actions\Product\CreateProductAction;
use App\Actions\Product\DeleteProductAction;
use App\Actions\Product\EditProductAction;
use App\Actions\Product\FilterProductAction;
use App\Actions\Product\GetAllProductAction;
use App\DTOs\Product\CreateProductDTO;
use App\DTOs\Product\EditProductDTO;
use App\DTOs\Product\ProductFilterDTO;
use App\DTOs\Response\APIResponsePayloadDTO;
use App\Http\Controllers\Controller;
use App\Http\Requests\StoreProductRequest;
use App\Http\Requests\UpdateProductRequest;
use App\Http\Resources\ProductResource;
use App\Http\Responses\APIResponse;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class ProductController extends Controller
{

    public function index(Request $request, GetAllProductAction $getAllProductsAction, FilterProductAction $filterProductAction)
    {

        $filters = ProductFilterDTO::fromArray($request->only(["search"]));
        $products = $filterProductAction->execute($filters);

        $payload = new APIResponsePayloadDTO(
            true,
            "Produtos listados com sucesso.",
            ProductResource::collection($products)
        );
        return APIResponse::make($payload, Response::HTTP_OK);

    }


    public function store(StoreProductRequest $request, CreateProductAction $createProductAction)
    {
        $data = $request->validated();

        $dto = CreateProductDTO::fromArray($data);
        $product = $createProductAction->execute($dto);
        $payload = new APIResponsePayloadDTO(
            true,
            "Produto criado com sucesso.",
            new ProductResource($product)
        );
        return APIResponse::make($payload, Response::HTTP_CREATED);
    }


    public function show(Product $product)
    {
        $payload = new APIResponsePayloadDTO(
            true,
            "Produto obtido com sucesso.",
            new ProductResource($product)
        );
        return APIResponse::make($payload, Response::HTTP_OK);
    }


    public function update(
        UpdateProductRequest $request,
        Product $product,
        EditProductAction $editProductAction
    )
    {
        $editProductDTO = EditProductDTO::fromArray($request->validated());

        $updatedProduct = $editProductAction->execute($product, $editProductDTO);

        $payload = new APIResponsePayloadDTO(
            true,
            "Produto modificado com sucesso.",
            new ProductResource($updatedProduct)
        );

        return APIResponse::make($payload, Response::HTTP_OK);
    }


    public function destroy(Product $product, DeleteProductAction $deleteProductAction)
    {
        $deleteProductAction->execute($product);
        $payload = new APIResponsePayloadDTO(
            true,
            "Produto deletado com sucesso.",
            null
        );
        return APIResponse::make($payload, Response::HTTP_NO_CONTENT);
    }
}
