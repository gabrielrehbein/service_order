<?php

namespace App\Repositories\Customer;

use App\Contracts\Customer\ICustomerRepository;
use App\DTOs\Customer\CreateCustomerDTO;
use App\DTOs\Customer\CustomerFilterDTO;
use App\DTOs\Customer\UpdateCustomerDTO;
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
        $customer->address()->delete();
        $customer->delete($customer->id);
    }

    #[Override]
    public function filter(CustomerFilterDTO $filter)
    {
        return Customer::all();
    }

    #[Override]
    public function update(Customer $customer, UpdateCustomerDTO $updateCustomerDTO)
    {
        $customer->update(
            $updateCustomerDTO->toArray()
        );
        return $customer->refresh();
    }
}
