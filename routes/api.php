<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\ProductApiController;

Route::get('/products', [ProductApiController::class, 'index']);
Route::get('/products/filter', [ProductApiController::class, 'filter']);
Route::post('/products', [ProductApiController::class, 'store']);
