<?php

namespace App\Actions\Product;

use App\Contracts\Product\IProductRepository;
use App\DTOs\Product\CreateProductDTO;

class CreateProductAction
{
    private IProductRepository $productRepository;

    public function __construct(IProductRepository $productRepository)
    {
        $this->productRepository = $productRepository;
    }

    public function execute(CreateProductDTO $createProductDTO){
        return $this->productRepository->create($createProductDTO);
    }
}
