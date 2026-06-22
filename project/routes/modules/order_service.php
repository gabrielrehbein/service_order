<?php

use App\Http\Controllers\Web\CustomerController;
use App\Http\Controllers\Web\PDFController;
use App\Http\Controllers\Web\ServiceOrderController;
use Illuminate\Support\Facades\Route;

Route::post("/ordem-servico/criar", [ServiceOrderController::class, "store"])->name("order_service.store");
Route::get("/ordem-servico/criar", [ServiceOrderController::class, "create"])->name("order_service.create");
Route::get("/ordem-servico", [ServiceOrderController::class, "index"])->name("order_service.index");
Route::get("/ordem-servico/{orderService}/imprimir", [PDFController::class, "printOrderService"])->name("order_service.printOrderService");
Route::get("/ordem-servico/{orderService}", [ServiceOrderController::class, "show"])->name("order_service.show");
Route::get(
    '/service-orders/seed',
    [ServiceOrderController::class, 'seed']
)->name('service-orders.seed');
