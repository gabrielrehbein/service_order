<?php

namespace App\Contracts\Product;

use App\DTOs\Product\CreateProductDTO;
use App\DTOs\Product\EditProductDTO;
use App\DTOs\Product\ProductFilterDTO;
use App\Models\Product;

interface IProductRepository
{
    public function create(CreateProductDTO $createProductDTO);
    public function getAll();
    public function query();
    public function delete(Product $product);
    public function edit(Product $product, EditProductDTO $editProductDTO);
    public function filter(ProductFilterDTO $filters);
}
