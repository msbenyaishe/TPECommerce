<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Product;
use Illuminate\Http\Request;
use Cloudinary\Cloudinary;

class ProductApiController extends Controller
{
    public function index(Request $request)
    {
        $query = Product::query();

        // Filter by category
        if ($request->filled('categorie')) {
            $query->where('categorie', $request->categorie);
        }

        // Filter by name (typing letters)
        if ($request->filled('search')) {
            $query->where('nom', 'LIKE', '%' . $request->search . '%');
        }

        return response()->json(
            $query->select('id', 'nom', 'prix', 'categorie', 'image')
                  ->paginate(100)
        );
    }

    public function store(Request $request)
    {
        $request->validate([
            'nom' => 'required|string|max:255',
            'prix' => 'required|numeric',
            'categorie' => 'required|string|max:255',
            'image' => 'nullable|image|mimes:jpg,jpeg,png,webp|max:2048',
        ]);

        $imagePath = null;

        try {
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

                $imagePath = $uploadResult['secure_url'];
            }
        } catch (\Exception $e) {
            return response()->json([
                'error' => 'Failed to upload image: ' . $e->getMessage(),
            ], 400);
        }

        try {
            $product = Product::create([
                'nom' => $request->nom,
                'prix' => $request->prix,
                'categorie' => $request->categorie,
                'image' => $imagePath,
            ]);

            return response()->json([
                'message' => 'Product created successfully',
                'product' => $product,
            ], 201);
        } catch (\Exception $e) {
            return response()->json([
                'error' => 'Failed to create product: ' . $e->getMessage(),
            ], 400);
        }
    }
}