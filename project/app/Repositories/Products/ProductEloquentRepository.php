<?php

namespace App\Repositories\Products;

use App\Contracts\Product\IProductRepository;
use App\DTOs\Product\CreateProductDTO;
use App\DTOs\Product\EditProductDTO;
use App\DTOs\Product\ProductFilterDTO;
use App\Models\Product;
use Illuminate\Database\Query\Builder;
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
        $product->update(
            $editProductDTO->toArray()
        );
        return $product->refresh();
    }

    public function filter(ProductFilterDTO $filters){
        return Product::query()
            ->when($filters->search, fn($query) =>
                $query->where("name", "like", "%{$filters->search}%")
            )
            ->when($filters->minPrice, fn($query) =>
                $query->where("min_price", "=>", $filters->minPrice)
            )
            ->when($filters->maxPrice, fn($query) =>
                $query->where("max_price", "=>", $filters->maxPrice)
            )
            ->when($filters->inStock, fn($query) =>
                $query->where("quantity", ">", 0)
            )->get();
    }
}
