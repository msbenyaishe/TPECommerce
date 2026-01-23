@extends('layout.master')

@section('title', 'Edit Product')

@section('content')
<div class="msone-elegant-wrapper fade-in-up">
    <h1 class="page-title text-center">Edit Product</h1>

    <form action="{{ route('products.update', $product) }}" method="POST" enctype="multipart/form-data" class="msone-minimal-form">
        @csrf
        @method('PUT')

        <div class="msone-field">
            <label class="msone-label">Product Name</label>
            <input type="text" name="nom" value="{{ old('nom', $product->nom) }}" class="msone-input">
        </div>

        <div class="msone-field">
            <label class="msone-label">Price</label>
            <input type="number" name="prix" value="{{ old('prix', $product->prix) }}" class="msone-input">
        </div>

        <div class="msone-field">
            <label class="msone-label">Category</label>
            <input type="text" name="categorie" value="{{ old('categorie', $product->categorie) }}" class="msone-input">
        </div>

        <div class="msone-field">
            <label class="msone-label">Product Image</label>
            <input type="file" name="image" class="msone-input">
        </div>

        <button type="submit" class="btn-msone-modern hero-btn primary">
            Update
        </button>
    </form>
</div>
@endsection
