<?php

namespace App\DTOs;

use App\Contracts\Array\IArrayable;
use App\Contracts\Array\ICreateByArray;

readonly class EditProductDTO implements IArrayable, ICreateByArray
{
    public function __construct(
        public ?string $name,
        public ?string $description,
        public ?float $costPrice,
        public ?float $salePrice,
        public ?float $quantity,
    ) {}

    public static function fromArray(array $data): self
    {
        return new self(
            name: $data['name'] ?? null,
            description: $data['description'] ?? null,
            costPrice: (float) $data['cost_price'] ?? null,
            salePrice: (float) $data['sale_price'] ?? null,
            quantity: (float) ($data['quantity'] ?? 0),
        );
    }

    public function toArray(): array{
        return [
            "name" => $this->name,
            "description" => $this->description,
            "cost_price" => $this->costPrice,
            "sale_price" => $this->salePrice,
            "quantity" => $this->quantity,
        ];
    }
}
