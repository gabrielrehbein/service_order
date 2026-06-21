<?php

namespace App\DTOs\Customer;

use App\Contracts\Array\IArrayable;
use App\Contracts\Array\ICreateByArray;


readonly class UpdateCustomerDTO implements IArrayable, ICreateByArray
{
    public function __construct(
        public string $name,
        public int $phone,
        public string $email,
        public string $document,
        public string $personType = "PJ" | "PF",
    ) {}

    public static function fromArray(array $data): self
    {
        return new self(
            name: $data['name'],
            phone: $data['phone'],
            email: $data['email'],
            document: $data['document'],
            personType: $data['person_type'],
        );
    }
    public function toArray(): array{
        return [
            "name" => $this->name,
            "phone" => $this->phone,
            "email" => $this->email,
            "document" => $this->document,
            "person_type" => $this->personType,
        ];
    }
}
