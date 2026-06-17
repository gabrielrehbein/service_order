<?php

namespace App\Repositories\Address;

use App\Contracts\Address\IAddressRepository;
use App\DTOs\Address\CreateAddressDTO;
use App\Models\Address;
use Override;

class AddressEloquentRepository implements IAddressRepository
{
    #[Override]
    public function create(CreateAddressDTO $createAddressDTO)
    {
        return Address::create($createAddressDTO->toArray());
    }
    #[Override]
    public function getAll()
    {
        throw new \Exception('Not implemented');
    }

    #[Override]
    public function query()
    {
        throw new \Exception('Not implemented');
    }
    #[Override]
    public function delete(Address $address)
    {
        $address->delete($address->id);
    }
}
