<?php

namespace App\DTOs\Customer;

use App\Contracts\Array\IArrayable;
use App\Contracts\Array\ICreateByArray;


class CustomerFilterDTO implements IArrayable, ICreateByArray
{
    public function __construct(
        public ?string $search = null,
    ) {}

    public static function fromArray(array $data): self
    {
        return new self(
            search: $data["search"] ?? null,
        );
    }

    public function toArray(): array
    {
        return [
            "search" => $this->search,
        ];
    }

}
