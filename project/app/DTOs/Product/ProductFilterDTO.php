<?php

namespace App\DTOs\Product;

use App\Contracts\Array\IArrayable;
use App\Contracts\Array\ICreateByArray;
use App\Enums\StockFilterStatus;

class ProductFilterDTO implements IArrayable, ICreateByArray
{
    public function __construct(
        public ?string $search = null,
        public ?float $minPrice = null,
        public ?float $maxPrice = null,
        public StockFilterStatus $inStock = StockFilterStatus::ALL,
        public ?string $orderBy = null,
    ) {}

    public static function fromArray(array $data): self
    {
        return new self(
            search: $data["search"] ?? null,
            minPrice: $data["min_price"] ?? null,
            maxPrice: $data["max_price"] ?? null,
            inStock: StockFilterStatus::tryFrom($data["in_stock"] ?? StockFilterStatus::ALL->value) ?? StockFilterStatus::ALL,
            orderBy: $data["order_by"] ?? null,
        );
    }

    public function toArray(): array
    {
        return [
            "search" => $this->search,
            "min_price"=> $this->minPrice,
            "max_price"=> $this->maxPrice,
            "in_stock" => $this->inStock,
            "order_by" => $this->orderBy,
        ];
    }

}
