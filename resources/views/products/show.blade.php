@extends('layout.master')

@section('title', $product->nom)

@section('content')
<div class="msone-details-page fade-in-up">
    <div class="msone-grid-card">
        {{-- Left Side: Product Image (No gray container) --}}
        <div class="msone-image-only-side">
            <img src="{{ $product->image }}" class="msone-main-img" alt="{{ $product->nom }}">
        </div>

        {{-- Right Side: Content & Actions --}}
        <div class="msone-content-side">
            <h1 class="msone-detail-title">{{ $product->nom }}</h1>
            
            <div class="msone-info-box">
                <span class="msone-price-display">
                    <span class="currency">$</span>{{ number_format($product->prix, 0) }}
                </span>
                <p class="msone-category-tag">Category: <strong>{{ $product->categorie }}</strong></p>
            </div>

            <div class="msone-actions-container">
                <a href="{{ route('products.edit', $product) }}" class="msone-btn-primary-edit">
                    Edit Product
                </a>

                <form action="{{ route('products.destroy', $product) }}" method="POST" class="msone-delete-form">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="msone-btn-danger-outline" onclick="return confirm('Delete this product?')">
                        Delete Product
                    </button>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection