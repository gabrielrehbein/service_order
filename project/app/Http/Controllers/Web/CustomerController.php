<?php

namespace App\Http\Controllers\Web;

use App\Actions\Customer\CreateCustomerAction;

use App\DTOs\Address\CreateAddressDTO;
use App\DTOs\Address\GetAllAddressDTO;
use App\DTOs\Customer\CreateCustomerDTO;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Services\External\AddressService;

class CustomerController extends Controller
{

    public function create(Request $request, AddressService $addressService){

        $initialData = [
            "states" => $addressService->getAllStates(),
        ];
        return view("create-customer", ["initialData" => $initialData]);
    }

    public function seed(CreateCustomerAction $createCustomerAction)
    {
        $address = [
            "state" => "RS",
            "customer_id" => 1,
            "city" => "Camaquã",
            "neighborhood" => "Cohab",
            "street" => "Avenida José",
            "number" => "1190",
        ];
        $addressDTO = CreateAddressDTO::fromArray($address);

        $customerDTO = [
            "address" => $addressDTO,
            "name" => "Gabriel Rehbein",
            "person_type" => "PF",
            "document" => "04507675073",
            "email" => "gabrielrehbei@gmail.com",
            "phone" => "51990083958",
        ];

        $createCustomerDTO = CreateCustomerDTO::fromArray($customerDTO);

        $createCustomerAction->execute($createCustomerDTO);


        return redirect("products.index");
    }
}
