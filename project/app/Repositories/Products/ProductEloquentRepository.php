<?php

namespace App\Repositories\Products;

use App\Contracts\Product\IProductRepository;
use App\DTOs\Product\CreateProductDTO;
use App\DTOs\Product\EditProductDTO;
use App\DTOs\Product\ProductFilterDTO;
use App\Enums\StockFilterStatus;
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
        $query = Product::query()
            ->when($filters->search, fn($query) =>
                $query->where("name", "like", "%{$filters->search}%")
            )
            ->when($filters->minPrice && $filters->maxPrice, fn($query) =>
                $query->whereBetween("sale_price", [$filters->minPrice, $filters->maxPrice])
            )
            ->when($filters->inStock === StockFilterStatus::TRUE, fn($query) =>
                $query->where("quantity", ">", 0)
            )
            ->when($filters->inStock === StockFilterStatus::FALSE, fn($query) =>
                $query->where("quantity", "=", 0)
            );

        return $query->get();
    }
}
