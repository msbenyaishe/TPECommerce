<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Http\Requests\AddProductRequest;
use Cloudinary\Cloudinary;
use Illuminate\Support\Facades\Auth;

class ProductController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Categories (PUBLIC)
    |--------------------------------------------------------------------------
    */
    public function categories()
    {
        $categories = Product::select('categorie')
            ->distinct()
            ->get();

        return view('electronics-categories', compact('categories'));
    }

    /*
    |--------------------------------------------------------------------------
    | Products by category (PUBLIC)
    |--------------------------------------------------------------------------
    */
    public function byCategory(string $category)
    {
        $products = Product::where('categorie', $category)
            ->paginate(6);

        return view('electronics-products', compact('products', 'category'));
    }

    /*
    |--------------------------------------------------------------------------
    | Product details (PUBLIC — role-aware)
    |--------------------------------------------------------------------------
    */
    public function show(Product $product)
    {
        // One page for everyone
        return view('products.show', compact('product'));
    }

    /*
    |--------------------------------------------------------------------------
    | Admin: create
    |--------------------------------------------------------------------------
    */
    public function create()
    {
        return view('products.create');
    }

    /*
    |--------------------------------------------------------------------------
    | Admin: store (Cloudinary)
    |--------------------------------------------------------------------------
    */
    public function store(AddProductRequest $request)
    {
        $cloudinary = new Cloudinary([
            'cloud' => [
                'cloud_name' => config('services.cloudinary.cloud_name'),
                'api_key'    => config('services.cloudinary.api_key'),
                'api_secret' => config('services.cloudinary.api_secret'),
            ],
        ]);

        $uploadResult = $cloudinary->uploadApi()->upload(
            $request->file('image')->getRealPath(),
            ['folder' => 'products']
        );

        Product::create([
            'nom'       => $request->nom,
            'prix'      => $request->prix,
            'categorie' => $request->categorie,
            'image'     => $uploadResult['secure_url'],
            'solde'     => $request->solde ?? false,
        ]);

        return redirect()
            ->route('electronics.categories')
            ->with('success', 'Produit ajouté avec succès');
    }

    /*
    |--------------------------------------------------------------------------
    | Admin: edit / update / delete
    |--------------------------------------------------------------------------
    */
    public function edit(Product $product)
    {
        return view('products.edit', compact('product'));
    }

    public function update(AddProductRequest $request, Product $product)
    {
        $product->update($request->validated());
        return redirect()->route('products.show', $product);
    }

    public function destroy(Product $product)
    {
        $product->delete();
        return redirect()->route('electronics.categories');
    }
}
