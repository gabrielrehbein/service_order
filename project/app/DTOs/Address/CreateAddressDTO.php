<?php

namespace App\DTOs\Address;

use App\Contracts\Array\IArrayable;
use App\Contracts\Array\ICreateByArray;

class CreateAddressDTO implements IArrayable, ICreateByArray
{
    public string $state;
    public string $city;
    public ?int $customer_id;
    public string $neighborhood;
    public string $street;
    public string $number;
    public ?string $complement;

    public function __construct(
         string $state,
         string $city,
        ?int $customer_id,
         string $neighborhood,
         string $street,
         string $number,
         ?string $complement,
    ) {
        $this->state = $state;
        $this->city = $city;
        $this->customer_id = $customer_id;
        $this->neighborhood = $neighborhood;
        $this->street = $street;
        $this->number = $number;
        $this->complement = $complement;
    }

    public static function fromArray(array $data): self
    {
        return new self(
            state: $data['state'],
            customer_id: $data['customer_id'] ?? null,
            city: $data['city'],
            neighborhood: $data['neighborhood'],
            street: $data['street'],
            number: $data['number'],
            complement: $data['complement'] ?? null,
        );
    }
    public function toArray(): array{
        return [
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
