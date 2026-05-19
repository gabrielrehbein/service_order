<?php

namespace App\Contracts\Product;

use App\DTOs\CreateProductDTO;
use App\DTOs\EditProductDTO;
use App\Models\Product;

interface IProductRepository
{
    public function create(CreateProductDTO $createProductDTO);
    public function getAll();
    public function query();
    public function delete(Product $product);
    public function edit(Product $product, EditProductDTO $editProductDTO);
}
