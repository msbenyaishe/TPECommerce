@extends('layout.master')

@section('title', 'Add Product')

@section('content')
<div class="msone-elegant-wrapper fade-in-up">
    <h1 class="msone-hero-title page-title text-center">Add New Product</h1>

    @if ($errors->any())
        <div class="msone-minimal-error" role="alert">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form 
        action="{{ route('products.store') }}" 
        method="POST" 
        enctype="multipart/form-data" 
        class="msone-minimal-form"
    >
        @csrf

        <div class="msone-field">
            <label class="msone-label">Product Name</label>
            <input
                class="msone-input"
                type="text"
                name="nom"
                value="{{ old('nom') }}"
                placeholder="MacBook Pro M3 Max"
            >
        </div>

        <div class="msone-field">
            <label class="msone-label">Price</label>
            <input
                class="msone-input"
                type="number"
                name="prix"
                value="{{ old('prix') }}"
                placeholder="3199"
            >
        </div>

        <div class="msone-field">
            <label class="msone-label">Category</label>
            <input
                class="msone-input"
                type="text"
                name="categorie"
                value="{{ old('categorie') }}"
                placeholder="Laptops"
            >
        </div>

        <div class="msone-field">
            <label class="msone-label">Product Image</label>
            <input
                class="msone-input"
                type="file"
                name="image"
            >
        </div>

        <div class="msone-toggle-group">
            <input
                class="msone-checkbox"
                type="checkbox"
                name="solde"
                id="solde"
                value="1"
            >
            <label class="msone-checkbox-label" for="solde">
                Mark as "On Sale"
            </label>
        </div>

        <button type="submit" class="btn-msone-modern hero-btn primary">
            Add Product
        </button>
    </form>
</div>
@endsection
