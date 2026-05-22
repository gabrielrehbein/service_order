<?php

use App\Http\Controllers\Api\ProductController;
use Illuminate\Support\Facades\Route;


Route::prefix("v1")->group(function () {
    Route::get("/produtos", [ProductController::class, "index"]);
    Route::get("/produtos/{product}", [ProductController::class, "show"]);
    Route::delete("/produtos/{product}", [ProductController::class, "destroy"]);
    Route::post("/produtos", [ProductController::class, "store"]);
    Route::put("/produtos/{product}", [ProductController::class, "update"]);
});
