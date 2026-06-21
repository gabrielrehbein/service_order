<?php

namespace App\Actions\Customer;

use App\Contracts\Customer\ICustomerRepository;
use App\Models\Customer;

class DeleteCustomerAction
{

    private ICustomerRepository $customerRepository;

    public function __construct(ICustomerRepository $customerRepository)
    {
        $this->customerRepository = $customerRepository;
    }

    public function execute(Customer $customer){
        $this->customerRepository->delete($customer);
    }
}
