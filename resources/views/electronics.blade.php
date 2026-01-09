@extends('layout.master')

@section('title', 'Electronics')

@section('content')
<div class="fade-in-up">
    <h1 class="page-title text-center">Electronics</h1>
    <p class="page-subtitle text-center">
        Explore our range of premium electronic products across multiple categories.
    </p>

    @foreach ($products as $group)
        <div class="category-section">
            <h2 class="category-title">{{ $group['category'] }}</h2>

            <div class="products-grid">
                @foreach ($group['items'] as $item)
                <div class="product-card">
                    <img
                        src="{{ asset('imgs/' . $item['image']) }}"
                        class="product-card-image"
                        alt="{{ $item['name'] }}"
                    >
                    <div class="product-card-content">
                        <h3 class="product-card-name">{{ $item['name'] }}</h3>
                        <div class="product-card-price">{{ number_format($item['price'], 0) }}</div>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
    @endforeach
</div>
@endsection
