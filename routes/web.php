<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\HomeController;

/*
|--------------------------------------------------------------------------
| 1. Public Pages
|--------------------------------------------------------------------------
*/
Route::get('/', fn () => view('home'))->name('welcome'); // Often used as default home
Route::get('/about', fn () => view('about'));
Route::get('/contact', fn () => view('contact'));

/*
|--------------------------------------------------------------------------
| 2. Electronics (PUBLIC)
|--------------------------------------------------------------------------
*/
Route::get('/electronics', [ProductController::class, 'categories'])
    ->name('electronics.categories');

Route::get('/electronics/{category}', [ProductController::class, 'byCategory'])
    ->name('electronics.category');

/*
|--------------------------------------------------------------------------
| 3. Authentication & Base Home
|--------------------------------------------------------------------------
*/
Auth::routes();

// This is the default redirect for many Laravel starters
Route::get('/home', [HomeController::class, 'index'])->name('home');

/*
|--------------------------------------------------------------------------
| 4. ADMIN ROUTES
|--------------------------------------------------------------------------
| FIXED: Moved above {product} wildcard to ensure 'create' is accessible.
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

    Route::get('/email', [ProductController::class, 'email']);
    Route::post('/send/email', [ProductController::class, 'sendEmail'])
        ->name('send.email');
});

/*
|--------------------------------------------------------------------------
| 5. USER ROUTES
|--------------------------------------------------------------------------
*/
Route::middleware(['useruser'])->group(function () {
    Route::get('/client', [ProductController::class, 'client'])
        ->name('client.space');
});

/*
|--------------------------------------------------------------------------
| 6. Product Details (Wildcard)
|--------------------------------------------------------------------------
| FIXED: Placed at the bottom so it doesn't intercept '/products/create'.
|--------------------------------------------------------------------------
*/
Route::get('/products/{product}', [ProductController::class, 'show'])
    ->middleware('auth')
    ->name('products.show');




