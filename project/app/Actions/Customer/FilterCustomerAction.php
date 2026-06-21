<?php

namespace App\Actions\Customer;

use App\Contracts\Customer\ICustomerRepository;
use App\DTOs\Customer\CustomerFilterDTO;


class FilterCustomerAction
{
    private ICustomerRepository $customerRepository;

    public function __construct(ICustomerRepository $customerRepository)
    {
        $this->customerRepository = $customerRepository;

    }

    public function execute(CustomerFilterDTO $filters){
        return $this->customerRepository->filter($filters);
    }
}
