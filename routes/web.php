<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\SaleController;

Route::get('/', function () {
    return view('welcome');
});

Route::post('/sales', [SaleController::class, 'store']);
Route::get('/sales', [SaleController::class, 'index']);
Route::delete('sales/{id}', [SaleController::class, 'destroy']);

