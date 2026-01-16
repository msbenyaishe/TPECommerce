<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductController;

Route::get('/', function () {
    return view('home');
});

// Show categories
Route::get('/electronics', [ProductController::class, 'categories']);

// Show products by category
Route::get('/electronics/{category}', [ProductController::class, 'byCategory']);

Route::get('/about', function () {
    return view('about');
});

Route::get('/contact', function () {
    return view('contact');
});
