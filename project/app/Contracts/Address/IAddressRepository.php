<?php

namespace App\Contracts\Address;

use App\DTOs\Address\CreateAddressDTO;
use App\Models\Address;
use App\Models\Product;

interface IAddressRepository
{
    public function create(CreateAddressDTO $createAddressDTO);
    public function getAll();
    public function query();
    public function delete(Address $address);
}
