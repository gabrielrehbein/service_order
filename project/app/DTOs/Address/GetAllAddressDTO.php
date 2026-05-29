<?php

namespace App\DTOs\Address;

use App\Contracts\Array\IArrayable;
use App\Contracts\Array\ICreateByArray;

readonly class GetAllAddressDTO implements IArrayable, ICreateByArray
{
    public function __construct(
        public int $id,
        public string $state,
        public int $customer_id,
        public string $city,
        public string $neighborhood,
        public string $street,
        public string $number,
        public ?string $complement,
    ) {}

    public static function fromArray(array $data): self
    {
        return new self(
            id: $data['id'],
            state: $data['state'],
            customer_id: $data['customer_id'],
            city: $data['city'],
            neighborhood: $data['neighborhood'],
            street: $data['street'],
            number: $data['number'],
            complement: $data['complement'] ?? null,
        );
    }
    public function toArray(): array{
        return [
            "id" => $this->id,
            "state" => $this->state,
            "customer_id" => $this->customer_id,
            "city" => $this->city,
            "neighborhood" => $this->neighborhood,
            "street" => $this->street,
            "number" => $this->number,
            "complement" => $this->complement,
        ];
    }
}
