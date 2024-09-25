<?php

use Illuminate\Http\Request;
use App\Http\Controllers\CustomerController;
use App\Http\Controllers\OrderController;
use Illuminate\Support\Facades\Route;

// Route::get('/user', function (Request $request) {
//     return $request->user();
// })->middleware('auth:sanctum');

Route::apiResource("customers", CustomerController::class);
Route::apiResource("customers.orders", OrderController::class);