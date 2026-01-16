<?php

namespace App\Http\Controllers;

use App\Models\Product;

class ProductController extends Controller
{
    /**
     * Show all electronics categories
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
     * Show products by category WITH pagination
     */
    public function byCategory(string $category)
    {
        $products = Product::where('categorie', $category)
            ->paginate(3);

        return view('electronics-products', [
            'products' => $products,
            'category' => $category
        ]);
    }
}
