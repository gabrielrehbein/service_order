<?php


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
