<?php

namespace App\Repositories\Customer;

use App\Contracts\Customer\ICustomerRepository;
use App\DTOs\Address\CreateAddressDTO;
use App\DTOs\Customer\CreateCustomerDTO;
use App\Models\Address;
use App\Models\Customer;
use Override;

class CustomerEloquentRepository implements ICustomerRepository
{
    #[Override]
    public function create(CreateCustomerDTO $createCustomerDTO, CreateAddressDTO $createAddressDTO)
    {
        $customer = Customer::create(
            $createCustomerDTO->toArray()
        );
        $createAddressDTO->customer_id = $customer->id;
        $address = Address::create(
            $createAddressDTO->toArray()
        );
        return $customer->load('address');
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
    public function delete(Customer $customer)
    {
        throw new \Exception('Not implemented');
    }
}
