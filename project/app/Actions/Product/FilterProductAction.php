<?php

namespace App\Actions\Product;

use App\Contracts\Product\IProductRepository;
use App\DTOs\CreateProductDTO;
use App\DTOs\GetProductDTO;
use App\DTOs\ProductFilterDTO;
use App\Filters\Product\ProductFilter;

class FilterProductAction
{
    private ProductFilter $filter;

    public function __construct(ProductFilter $filter)
    {
        $this->filter = $filter;

    }

    public function execute(ProductFilterDTO $filters){
        return $this->filter->execute($filters);
    }
}
