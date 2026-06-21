<?php

namespace App\Actions\Customer;

use App\Contracts\Address\IAddressRepository;
use App\Contracts\Customer\ICustomerRepository;
use App\DTOs\Address\CreateAddressDTO;
use App\DTOs\Address\UpdateAddressDTO;
use App\DTOs\Customer\CreateCustomerDTO;
use App\DTOs\Customer\UpdateCustomerDTO;
use App\Models\Address;
use App\Models\Customer;

class UpdateCustomerAction
{
    private ICustomerRepository $customerRepository;
    private IAddressRepository $addressRepository;

    public function __construct(ICustomerRepository $customerRepository, IAddressRepository $addressRepository)
    {
        $this->customerRepository = $customerRepository;
        $this->addressRepository = $addressRepository;
    }

    public function execute(Customer $customer, UpdateCustomerDTO $updateCustomerDTO, UpdateAddressDTO $updateAddressDTO){
        $this->customerRepository->update($customer, $updateCustomerDTO);
        $this->addressRepository->update($customer->address, $updateAddressDTO);
        return $customer->load("address");
    }
}
