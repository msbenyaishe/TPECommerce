<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;

class CartController extends Controller
{
    public function index()
    {
        return view('cart');
    }

    public function add($id)
    {
        $product = Product::findOrFail($id);

        $cart = session()->get('cart', []);

        if (isset($cart[$id])) {
            $cart[$id]['quantity']++;
        } else {
            $cart[$id] = [
                'name' => $product->nom,
                'price' => $product->prix,
                'quantity' => 1,
                'image' => $product->image,
            ];
        }

        session()->put('cart', $cart);

        return redirect()->back()->with('success', 'Product added to cart.');
    }

    public function update(Request $request)
    {
        $cart = session()->get('cart');

        $cart[$request->id]['quantity'] = $request->quantity;

        session()->put('cart', $cart);

        return redirect()->back();
    }

    public function remove(Request $request)
    {
        $cart = session()->get('cart');

        unset($cart[$request->id]);

        session()->put('cart', $cart);

        return redirect()->back();
    }
}
