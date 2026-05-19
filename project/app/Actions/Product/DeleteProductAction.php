<?php

namespace App\Actions\Product;

use App\Contracts\Product\IProductRepository;
use App\Models\Product;

class DeleteProductAction
{
    private IProductRepository $productRepository;

    public function __construct(IProductRepository $productRepository)
    {
        $this->productRepository = $productRepository;
    }

    public function execute(Product $product){
        return $this->productRepository->delete($product);
    }
}
