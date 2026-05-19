<?php

namespace App\Filters\Product;

use App\Contracts\Product\IProductRepository;
use App\DTOs\ProductFilterDTO;

class ProductFilter
{
    private IProductRepository $productRepository;

    public function __construct(IProductRepository $productRepository)
    {
        $this->productRepository = $productRepository;
    }

    public function execute(ProductFilterDTO $productFilterDTO){
        $query = $this->productRepository->query();
        return $this->filter_by_name($query, $productFilterDTO->search)->get();
    }

    public function filter_by_name($query, string $name){
        return $query->where("name", "like", "%{$name}%");
    }
}
