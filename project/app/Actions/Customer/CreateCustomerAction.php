<?php

namespace App\Actions\Customer;

use App\Contracts\Address\IAddressRepository;
use App\Contracts\Customer\ICustomerRepository;
use App\DTOs\Address\CreateAddressDTO;
use App\DTOs\Customer\CreateCustomerDTO;

class CreateCustomerAction
{
    private ICustomerRepository $customerRepository;
    private IAddressRepository $addressRepository;

    public function __construct(ICustomerRepository $customerRepository, IAddressRepository $addressRepository)
    {
        $this->customerRepository = $customerRepository;
        $this->addressRepository = $addressRepository;
    }

    public function execute(CreateCustomerDTO $createCustomerDTO, CreateAddressDTO $createAddressDTO){
        $customer = $this->customerRepository->create($createCustomerDTO);
        $createAddressDTO->customer_id = $customer->id;
        $address = $this->addressRepository->create($createAddressDTO);
        return $customer->load("address");
    }
}
