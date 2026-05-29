<?php

namespace App\Repositories\Customer;

use App\Contracts\Customer\ICustomerRepository;
use App\DTOs\Customer\CreateCustomerDTO;
use App\Models\Customer;
use Override;

class CustomerEloquentRepository implements ICustomerRepository
{
    #[Override]
    public function create(CreateCustomerDTO $createCustomerDTO)
    {
        $customer = Customer::create(
            $createCustomerDTO->toArray()
        );
        $customer->address()->create(
            $createCustomerDTO->address->toArray()
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
