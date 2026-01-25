@extends('layout.master')

@section('title', $product->nom)

@section('content')
<div class="msone-details-page fade-in-up">
    <div class="msone-grid-card">

        <div class="msone-image-only-side">
            <img src="{{ $product->image }}" class="msone-main-img" alt="{{ $product->nom }}">
        </div>

        <div class="msone-content-side">
            <h1 class="msone-detail-title">{{ $product->nom }}</h1>

            <div class="msone-info-box">
                <span class="msone-price-display">
                    $ {{ number_format($product->prix, 0) }}
                </span>
                <p class="msone-category-tag">
                    Category: <strong>{{ $product->categorie }}</strong>
                </p>
            </div>

            {{-- ADMIN ACTIONS ONLY --}}
            @auth
                @if(auth()->user()->role === 'admin')
                    <div class="msone-actions-container">
                        <a href="{{ route('products.edit', $product) }}" class="msone-btn-primary-edit">
                            Edit Product
                        </a>

                        <form action="{{ route('products.destroy', $product) }}" method="POST">
                            @csrf
                            @method('DELETE')
                            <button class="msone-btn-danger-outline"
                                    onclick="return confirm('Delete this product?')">
                                Delete Product
                            </button>
                        </form>
                    </div>
                @endif
            @endauth
        </div>
    </div>
</div>
@endsection
