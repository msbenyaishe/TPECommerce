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
                ['name' => 'Samsung Galaxy S25 FE', 'price' => 700, 'image' => 'samsungphone.png'],
                ['name' => 'iphone 17 pro', 'price' => 1099, 'image' => 'iphonephone.png'],
                ['name' => 'Samsung Galaxy S25 Ultra', 'price' => 1200, 'image' => 'samsungphone2.png']
            ]
        ],
        [
            'category' => 'Laptops',
            'items' => [
                ['name' => 'Dell Inspiron 16 7640 2-in-1', 'price' => 1300, 'image' => 'dellinsperon.png'],
                ['name' => 'Samsung Galaxy Book5 Pro 360', 'price' => 1600, 'image' => 'samsunglaptop.png'],
                ['name' => 'MacBook Pro M3 Max', 'price' => 3199 , 'image' => 'macbook.png']
            ]
        ],
        [
            'category' => 'Accessories',
            'items' => [
                ['name' => 'Logitech MX Master 3S', 'price' => 140, 'image' => 'mouse.png'],
                ['name' => 'Bose SoundLink Micro Bluetooth Speaker', 'price' => 89, 'image' => 'speaker.png'],
                ['name' => 'Samsung Galaxy Buds 3', 'price' => 149, 'image' => 'buds.png'],
            ]
        ],
        [
            'category' => 'Components',
            'items' => [
                ['name' => 'Samsung SSD 980 M.2 PCIe NVMe 1TB', 'price' => 110, 'image' => 'ssd.png'],
                ['name' => 'Asus Laptop Fan', 'price' => 60, 'image' => 'fan.png'],
                ['name' => 'Dell Laptop Charger 65W Watt USB Type C', 'price' => 40, 'image' => 'charger.png'],
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
