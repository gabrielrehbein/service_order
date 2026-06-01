<?php

namespace App\Http\Controllers\Web;

use App\Actions\Customer\CreateCustomerAction;

use App\DTOs\Address\CreateAddressDTO;
use App\DTOs\Customer\CreateCustomerDTO;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\StoreCustomerRequest;
use App\Services\External\AddressService;

class CustomerController extends Controller
{

    public function create(Request $request, AddressService $addressService){

        $initialData = [
            "states" => $addressService->getAllStates(),
        ];
        return view("create-customer", ["initialData" => $initialData]);
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
