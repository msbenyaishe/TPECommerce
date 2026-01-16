<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductController;

Route::get('/', function () {
    return view('home');
});

Route::get('/electronics', [ProductController::class, 'categories'])
    ->name('electronics.categories');

Route::get('/electronics/{category}', [ProductController::class, 'byCategory'])
    ->name('electronics.category');

Route::get('/about', function () {
    return view('about');
});

Route::get('/contact', function () {
    return view('contact');
});
