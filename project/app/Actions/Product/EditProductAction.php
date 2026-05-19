<?php

namespace App\Actions\Product;

use App\Contracts\Product\IProductRepository;
use App\DTOs\EditProductDTO;
use App\Models\Product;

class EditProductAction
{
    private IProductRepository $productRepository;

    public function __construct(IProductRepository $productRepository)
    {
        $this->productRepository = $productRepository;
    }

    private function mergeContent(Product $product, EditProductDTO $editProductDTO): EditProductDTO {
        return EditProductDTO::fromArray(
            [
                "name" => $editProductDTO->name ?? $product->name,
                "description" => $editProductDTO->description ?? $product->description,
                "cost_price" => $editProductDTO->costPrice ?? $product->costPrice,
                "sale_price" => $editProductDTO->salePrice ?? $product->salePrice,
                "quantity" => $editProductDTO->quantity ?? $product->quantity,
            ]
        );
    }

    public function execute(Product $product, EditProductDTO $editProductDTO){
        $mergedContent = $this->mergeContent($product, $editProductDTO);
        return $this->productRepository->edit($product, $mergedContent);
    }
}
