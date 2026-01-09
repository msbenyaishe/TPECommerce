<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('home');
});

Route::get('/electronics', function () {

    $products = [
        [
            'category' => 'Phones',
            'items' => [
                ['name' => 'Samsung Galaxy S25 FE', 'price' => 700, 'image' => 'image.png'],
                ['name' => 'Smartphone Y', 'price' => 599, 'image' => 'phone2.jpg'],
            ]
        ],
        [
            'category' => 'Laptops',
            'items' => [
                ['name' => 'Laptop Pro', 'price' => 1299, 'image' => 'laptop.jpg'],
            ]
        ],
        [
            'category' => 'Accessories',
            'items' => [
                ['name' => 'Wireless Mouse', 'price' => 49, 'image' => 'mouse.jpg'],
            ]
        ],
        [
            'category' => 'Components',
            'items' => [
                ['name' => 'SSD 1TB', 'price' => 149, 'image' => 'ssd.jpg'],
            ]
        ],
    ];

    return view('electronics', ['products' => $products]);
});

Route::get('/about', function () {
    return view('about');
});

Route::get('/contact', function () {
    return view('contact');
});
