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
        return Customer::create(
            $createCustomerDTO->toArray()
        );
    }

    #[Override]
    public function getAll()
    {
        return Customer::all();
    }

    #[Override]
    public function query()
    {
        throw new \Exception('Not implemented');
    }
    #[Override]
    public function delete(Customer $customer)
    {
        $customer->delete($customer->id);
    }
}
