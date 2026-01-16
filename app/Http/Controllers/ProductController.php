<?php

namespace App\Http\Controllers;

use App\Models\Product;

class ProductController extends Controller
{
    /**
     * Show all categories
     */
    public function categories()
    {
        $categories = Product::select('categorie')
            ->distinct()
            ->get();

        return view('electronics-categories', [
            'categories' => $categories
        ]);
    }

    /**
     * Show products by category
     */
    public function byCategory($category)
    {
        $products = Product::where('categorie', $category)->get();

        return view('electronics-products', [
            'products' => $products,
            'category' => $category
        ]);
    }
}
