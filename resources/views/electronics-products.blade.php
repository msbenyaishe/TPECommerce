@extends('layout.master')

@section('title', $category)

@section('content')
<div class="fade-in-up">
    <h1 class="page-title text-center">{{ $category }}</h1>

    <div class="products-grid">
        @foreach ($products as $item)
            <div class="product-card">
                <img
                    src="{{ $item->image }}"
                    class="product-card-image"
                    alt="{{ $item->nom }}"
                >
                <div class="product-card-content">
                    <h3 class="product-card-name">{{ $item->nom }}</h3>
                    <div class="product-card-price">
                        {{ number_format($item->prix, 0) }}
                    </div>
                </div>
            </div>
        @endforeach
    </div>
</div>
@endsection
