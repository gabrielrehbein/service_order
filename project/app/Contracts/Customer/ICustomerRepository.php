<?php

namespace App\Contracts\Customer;

use App\DTOs\Customer\CreateCustomerDTO;
use App\Models\Customer;

interface ICustomerRepository
{
    public function create(CreateCustomerDTO $createCustomerDTO);

    public function getAll();


    public function query();

    public function delete(Customer $customer);
}
