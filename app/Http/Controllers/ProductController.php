<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Http\Requests\AddProductRequest;
use Illuminate\Http\Request;
use Cloudinary\Cloudinary;
use Illuminate\Support\Facades\Mail;
use App\Mail\TestMail;

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
     * Show products by category (WITH pagination)
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

    /**
     * Show the form to create a new product (Atelier 8)
     */
    public function create()
    {
        return view('products.create');
    }

    /**
     * Store a new product in database (Atelier 8 + Cloudinary)
     */
    public function store(AddProductRequest $request)
    {
        $cloudinary = new Cloudinary([
            'cloud' => [
                'cloud_name' => env('CLOUDINARY_CLOUD_NAME'),
                'api_key'    => env('CLOUDINARY_API_KEY'),
                'api_secret' => env('CLOUDINARY_API_SECRET'),
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

    /**
     * Show a single product (Atelier 9)
     */
    public function show(Product $product)
    {
        return view('products.show', [
            'product' => $product
        ]);
    }

    /**
     * Show edit form (Atelier 9)
     */
    public function edit(Product $product)
    {
        return view('products.edit', [
            'product' => $product
        ]);
    }

    /**
     * Update product (Atelier 9 + Cloudinary optional update)
     */
    public function update(Request $request, Product $product)
    {
        $request->validate([
            'nom'       => 'required|string|max:255',
            'prix'      => 'required|numeric',
            'categorie' => 'required|string|max:255',
            'image'     => 'nullable|image|mimes:jpg,jpeg,png,webp|max:2048',
            'solde'     => 'nullable|boolean',
        ]);

        if ($request->hasFile('image')) {

            $cloudinary = new Cloudinary([
                'cloud' => [
                    'cloud_name' => env('CLOUDINARY_CLOUD_NAME'),
                    'api_key'    => env('CLOUDINARY_API_KEY'),
                    'api_secret' => env('CLOUDINARY_API_SECRET'),
                ],
            ]);

            $uploadResult = $cloudinary->uploadApi()->upload(
                $request->file('image')->getRealPath(),
                ['folder' => 'products']
            );

            $product->image = $uploadResult['secure_url'];
        }

        $product->nom       = $request->nom;
        $product->prix      = $request->prix;
        $product->categorie = $request->categorie;
        $product->solde     = $request->solde ?? false;

        $product->save();

        return back()->with('success', 'Produit modifié avec succès');
    }

    /**
     * Delete product (Atelier 9)
     */
    public function destroy(Product $product)
    {
        $product->delete();

        return back()->with('success', 'Produit supprimé avec succès');
    }

    public function client()
    {
        $products = Product::where('solde', true)->get();

        return view('client-space', compact('products'));
    }

    public function email()
    {
        return view('email');
    }

    public function sendEmail(Request $request)
    {
        $request->validate([
            'recipient_email' => 'required|email',
            'subject' => 'required|string|max:255',
            'message' => 'required|string',
        ]);

        $data = [
            'recipient_email' => $request->recipient_email,
            'subject' => $request->subject,
            'message' => $request->message,
        ];

        Mail::to($data['recipient_email'])->send(new TestMail($data));

        return back()->with('success', 'Email sent successfully!');
    }


}