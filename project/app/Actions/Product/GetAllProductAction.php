<?php

namespace App\Actions\Product;

use App\Contracts\Product\IProductRepository;

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
