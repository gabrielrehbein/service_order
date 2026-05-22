<?php

namespace App\Actions\Product;

use App\Contracts\Product\IProductRepository;
use App\DTOs\Product\ProductFilterDTO;


class FilterProductAction
{
    private IProductRepository $productRepository;

    public function __construct(IProductRepository $productRepository)
    {
        $this->productRepository = $productRepository;

    }

    public function execute(ProductFilterDTO $filters){
        return $this->productRepository->filter($filters);
    }
}
