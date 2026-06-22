<?php

use App\Http\Controllers\Web\CustomerController;
use Illuminate\Support\Facades\Route;

Route::get("/clientes/criar", [CustomerController::class, "create"])->name("customers.create");
Route::post("/clientes/criar", [CustomerController::class, "store"])->name("customers.store");
Route::get("/clientes", [CustomerController::class, "index"])->name("customers.index");
Route::get("/clientes/{customer}", [CustomerController::class, "show"])->name("customers.show");
Route::put("/clientes/{customer}", [CustomerController::class, "update"])->name("customers.update");

Route::delete("/clientes/{customer}", [CustomerController::class, "destroy"])->name("customers.destroy");
Route::get("/clientes/{customer}/deletar", [CustomerController::class, "delete"])->name("customers.delete");


