<?php

namespace App\Contracts\Customer;

use App\DTOs\Address\CreateAddressDTO;
use App\DTOs\Customer\CreateCustomerDTO;
use App\Models\Customer;

interface ICustomerRepository
{
    public function create(CreateCustomerDTO $createCustomerDTO, CreateAddressDTO $createAddressDTO);

    public function getAll();


    public function query();

    public function delete(Customer $customer);
}
