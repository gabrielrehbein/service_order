<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreVehicleRequest;
use App\Http\Requests\UpdateVehicleRequest;
use App\Models\Brand;
use App\Models\Customer;
use App\Models\Vehicle;
use Illuminate\Http\Request;

class VehicleController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $initialFilter = [
            "search" => $request->search ?? ""
        ];
        $vehicles = Vehicle::all();
        return view(
            "vehicles/list-vehicles",
            [
                "vehicles" => $vehicles,
                "initialFilter" => $initialFilter
            ]
        );
    }


    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view(
            "vehicles/create-vehicle",
            [
                "brands" => Brand::all(),
                "customers" => Customer::all(),
                "types" => [
                    "car" => "Carro",
                    "motorcycle" => "Moto",
                    "truck" => "Caminhão",
                    "bicycle" => "Bicicleta",
                ]
            ]
        );
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreVehicleRequest $request)
    {
        $data = $request->validated();

        $vehicle = Vehicle::create(
            $data
        );
        return redirect()->route("vehicles.index")->with("success", true);
    }

    /**
     * Display the specified resource.
     */
    public function show(Vehicle $vehicle)
    {
        return view(
            "vehicles/detail-vehicle",
            [
                "vehicle" => $vehicle,
                "brands" => Brand::all(),
                "customers" => Customer::all(),
                "types" => [
                    "car" => "Carro",
                    "motorcycle" => "Moto",
                    "truck" => "Caminhão",
                    "bicycle" => "Bicicleta",
                ]
            ]
        );
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Vehicle $vehicle)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateVehicleRequest $request, Vehicle $vehicle)
    {

    }

    public function delete(Vehicle $vehicle)
    {
        return view("vehicles/delete-vehicle", ["vehicle" => $vehicle]);
    }
    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Vehicle $vehicle)
    {
        $vehicle->delete();
        return redirect()->route("vehicles.index")->with("success", true);

    }

    public function seed(){
        Vehicle::create(
            [
                "plate" => "*AAAA000",
                "model" => "Uno 2005",
                'brand_id'=> 4,
                'km' => 0,
                'year_released' => 2005,
                'customer_id' => 1,
                'type' => "car",
            ]
        );
    }

}
