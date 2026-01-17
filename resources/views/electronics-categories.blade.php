@extends('layout.master')

@section('title', 'Electronics')

@section('content')
<div class="fade-in-up">
    <h1 class="page-title text-center">Categories</h1>
    <p class="page-subtitle text-center">
        Choose a category to explore our products
    </p>

    <div class="products-grid">
        @foreach($categories as $cat)
            <a href="{{ url('/electronics/' . $cat->categorie) }}" class="product-card" style="text-decoration: none; padding-top:20px; font-size:50px;">
                <div class="product-card-content text-center">
                    <h3 class="product-card-name">
                        {{ $cat->categorie }}
                    </h3>
                </div>
            </a>
        @endforeach
    </div>
</div>
@endsection
