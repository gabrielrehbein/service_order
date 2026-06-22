<?php

use App\Http\Controllers\Web\BrandController;
use App\Http\Controllers\Web\VehicleController;
use Illuminate\Support\Facades\Route;

Route::get("/brands/seed", [BrandController::class, "seed"])->name("brands.seed");
Route::get("/vehicles/seed", [VehicleController::class, "seed"])->name("vehicles.seed");
Route::get("/veiculos", [VehicleController::class, "index"])->name("vehicles.index");
Route::get("/veiculos/criar", [VehicleController::class, "create"])->name("vehicles.create");
Route::post("/veiculos/criar", [VehicleController::class, "store"])->name("vehicles.store");
Route::get("/veiculos/{vehicle}", [VehicleController::class, "show"])->name("vehicles.show");
Route::delete("/veiculos/{vehicle}/deletar", [VehicleController::class, "destroy"])->name("vehicles.destroy");
Route::get("/veiculos/{vehicle}/deletar", [VehicleController::class, "delete"])->name("vehicles.delete");
