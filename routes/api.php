<?php

use Illuminate\Http\Request;
use App\Http\Controllers\CustomerController;
use Illuminate\Support\Facades\Route;

// Route::get('/user', function (Request $request) {
//     return $request->user();
// })->middleware('auth:sanctum');
// Route::get('/', function (){
//     return 'API';
// });

Route::apiResource('/customer', CustomerController::class);