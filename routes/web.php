<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\ProductController;

/*
|--------------------------------------------------------------------------
| Public pages
|--------------------------------------------------------------------------
*/

Route::get('/', fn () => view('home'));
Route::get('/about', fn () => view('about'));
Route::get('/contact', fn () => view('contact'));

/*
|--------------------------------------------------------------------------
| Electronics (PUBLIC)
|--------------------------------------------------------------------------
*/

Route::get('/electronics', [ProductController::class, 'categories'])
    ->name('electronics.categories');

Route::get('/electronics/{category}', [ProductController::class, 'byCategory'])
    ->name('electronics.category');

/*
|--------------------------------------------------------------------------
| Product details (PUBLIC: guest + user + admin)
|--------------------------------------------------------------------------
*/

Route::get('/products/{product}', [ProductController::class, 'show'])
    ->name('products.show');

/*
|--------------------------------------------------------------------------
| Authentication
|--------------------------------------------------------------------------
*/

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])
    ->name('home');

/*
|--------------------------------------------------------------------------
| ADMIN ROUTES
|--------------------------------------------------------------------------
*/

Route::middleware(['adminuser'])->group(function () {

    Route::get('/products/create', [ProductController::class, 'create'])
        ->name('products.create');

    Route::post('/products', [ProductController::class, 'store'])
        ->name('products.store');

    Route::get('/products/{product}/edit', [ProductController::class, 'edit'])
        ->name('products.edit');

    Route::put('/products/{product}', [ProductController::class, 'update'])
        ->name('products.update');

    Route::delete('/products/{product}', [ProductController::class, 'destroy'])
        ->name('products.destroy');

    Route::get('/admin', fn () => view('admin.dashboard'))
        ->name('admin.dashboard');
});

/*
|--------------------------------------------------------------------------
| USER ROUTES
|--------------------------------------------------------------------------
*/

Route::middleware(['useruser'])->group(function () {

    Route::get('/client', [ProductController::class, 'client'])
        ->name('client.space');
});
