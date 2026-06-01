<?php

namespace App\Actions\Customer;

use App\Contracts\Customer\ICustomerRepository;
use App\DTOs\Address\CreateAddressDTO;
use App\DTOs\Customer\CreateCustomerDTO;

class CreateCustomerAction
{
    private ICustomerRepository $customerRepository;

    public function __construct(ICustomerRepository $customerRepository)
    {
        $this->customerRepository = $customerRepository;
    }

    public function execute(CreateCustomerDTO $createCustomerDTO, CreateAddressDTO $createAddressDTO){
        return $this->customerRepository->create($createCustomerDTO, $createAddressDTO);
    }
}
