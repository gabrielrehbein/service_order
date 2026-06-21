<?php

namespace App\Http\Controllers\Web;

use App\Actions\Customer\CreateCustomerAction;
use App\Actions\Customer\DeleteCustomerAction;
use App\Actions\Customer\FilterCustomerAction;
use App\Actions\Customer\UpdateCustomerAction;
use App\DTOs\Address\CreateAddressDTO;
use App\DTOs\Address\UpdateAddressDTO;
use App\DTOs\Customer\CreateCustomerDTO;
use App\DTOs\Customer\CustomerFilterDTO;
use App\DTOs\Customer\UpdateCustomerDTO;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\StoreCustomerRequest;
use App\Http\Requests\UpdateCustomerRequest;
use App\Models\Customer;
use App\Services\External\AddressService;

class CustomerController extends Controller
{
    public function index(Request $request, FilterCustomerAction $filterCustomerAction, AddressService $addressService){

        $customers = $filterCustomerAction->execute(new CustomerFilterDTO(
            $request["search"] ?? ""
        ));
        $initialFilter = [
            "search" => $request["search"] ?? "",
            "personType" => $request["personType"] ?? "all",

        ];

        $initialData = [
            "states" => $addressService->getAllStates(),
        ];

        return view("customers/list-customers",
            [
                "initialData" => $initialData,
                "initialFilter" => $initialFilter,
                "customers" => $customers
            ]
        );
    }

    public function delete(Customer $customer){
        return view(
            "customers/delete-customer",
            ["customer" => $customer]
        );
    }

    public function update(UpdateCustomerRequest $request, Customer $customer, UpdateCustomerAction $updateCustomerAction){
        $data = $request->validated();
        $customerDTO = UpdateCustomerDTO::fromArray($data);
        $addresDTO = UpdateAddressDTO::fromArray($data);
        $updateCustomerAction->execute($customer, $customerDTO, $addresDTO);
        return redirect()->route("customers.show", $customer->id)->with("success", true);
    }

    public function destroy(Customer $customer, DeleteCustomerAction $deleteCustomerAction)
    {
        $deleteCustomerAction->execute($customer);
        return redirect()->route("customers.index")->with("success", true);
    }

    public function create(Request $request, AddressService $addressService){

        $initialData = [
            "states" => $addressService->getAllStates(),
        ];
        return view("customers/create-customer", ["states" => $addressService->getAllStates()]);
    }

    public function show(Customer $customer, AddressService $addressService)
    {
        return view("customers/detail-customer", ["customer" => $customer, "states" => $addressService->getAllStates()]);
    }

    public function store(StoreCustomerRequest $request, CreateCustomerAction $createCustomerAction)
    {
        $data = $request->validated();
        $customerDTO = CreateCustomerDTO::fromArray($data);
        $addresDTO = CreateAddressDTO::fromArray($data);
        $createCustomerAction->execute($customerDTO, $addresDTO);
        return redirect()->route("customers.create")->with("success", true);
    }


}
