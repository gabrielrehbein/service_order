<?php

namespace App\Actions\Product;

use App\Contracts\Product\IProductRepository;
use App\DTOs\CreateProductDTO;
use App\DTOs\GetProductDTO;
use App\DTOs\ProductFilterDTO;
use App\Filters\Product\ProductFilter;

class GetAllProductAction
{

    private IProductRepository $productRepository;

    public function __construct(IProductRepository $productRepository)
    {
        $this->productRepository = $productRepository;

    }

    public function execute(){
        return $this->productRepository->getAll();
    }
}
