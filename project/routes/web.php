<?php

use App\Http\Controllers\Web\CustomerController;
use App\Http\Controllers\Web\PDFController;
use App\Http\Controllers\Web\ProductController;
use Illuminate\Support\Facades\Route;

Route::get("/produtos", [ProductController::class, "index"])->name("products.index");
Route::get("/produtos/criar", [ProductController::class, "create"])->name("products.create");
Route::post("/produtos/criar", [ProductController::class, "store"])->name("products.store");
Route::get("/produtos/{product}", [ProductController::class, "show"])->name("products.show");
Route::delete("/produtos/{product}", [ProductController::class, "destroy"])->name("products.destroy");
Route::put("/produtos/{product}", [ProductController::class, "update"])->name("products.update");
Route::get("/produtos/{product}/deletar", [ProductController::class, "delete"])->name("products.delete");
Route::get("/secret/products/seed", [ProductController::class, "seed"])->name("products.seed");

Route::get("/produtos/relatorio/sem_estoque", [PDFController::class, "listProductsWithoutStockRelatory"])->name("products.listProductsWithoutStockRelatory");


Route::get("/secret/customer/seed", [CustomerController::class, "seed"])->name("customers.seed");
Route::get("/clientes/criar", [CustomerController::class, "create"])->name("customers.create");
Route::post("/clientes/criar", [CustomerController::class, "store"])->name("customers.store");
Route::get("/clientes", [CustomerController::class, "index"])->name("customers.index");

Route::delete("/clientes/{customer}", [CustomerController::class, "destroy"])->name("customers.destroy");
Route::get("/clientes/{customer}/deletar", [CustomerController::class, "delete"])->name("customers.delete");


