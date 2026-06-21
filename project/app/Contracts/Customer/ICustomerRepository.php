<?php

namespace App\Contracts\Customer;

use App\DTOs\Address\CreateAddressDTO;
use App\DTOs\Customer\CreateCustomerDTO;
use App\DTOs\Customer\CustomerFilterDTO;
use App\DTOs\Customer\UpdateCustomerDTO;
use App\Models\Customer;

interface ICustomerRepository
{
    public function create(CreateCustomerDTO $createCustomerDTO);

    public function getAll();


    public function query();

    public function filter(CustomerFilterDTO $filter);

    public function delete(Customer $customer);
    public function update(Customer $customer, UpdateCustomerDTO $updateCustomerDTO);
}
