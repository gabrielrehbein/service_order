<?php

namespace App\Repositories\Products;

use App\Contracts\Product\IProductRepository;
use App\DTOs\CreateProductDTO;
use App\DTOs\EditProductDTO;
use App\Models\Product;
use Override;

class ProductEloquentRepository implements IProductRepository
{

    #[Override]
    public function create(CreateProductDTO $createProductDTO)
    {
        return Product::create($createProductDTO->toArray());
    }

    #[Override]
    public function getAll()
    {
        return Product::all();
    }

    #[Override]
    public function query()
    {
        return Product::query();
    }

    #[Override]
    public function delete(Product $product)
    {
        return $product->delete($product->id);
    }

    #[Override]
    public function edit(Product $product, EditProductDTO $editProductDTO)
    {
        return $product->update(
            $editProductDTO->toArray()
        );
    }
}
