@extends('layout.master')
@section('title', 'Shopping Cart')

@section('content')
<div class="fade-in-up" class="msone-cart-container">

    <h1 class="page-title text-center">Cart</h1>

    <div class="fade-in-up" class="msone-cart-container">

        @if(session('cart') && count(session('cart')) > 0)

            <table class="msone-table">
                <thead>
                    <tr>
                        <th>Product</th>
                        <th>Price</th>
                        <th>Quantity</th>
                        <th>Action</th>
                    </tr>
                </thead>

                <tbody>
                    @php $total = 0; @endphp

                    @foreach(session('cart') as $id => $item)
                        @php 
                            $subtotal = $item['price'] * $item['quantity'];
                            $total += $subtotal;
                        @endphp

                        <tr>
                            <td data-label="Product">
                                <div class="msone-product-cell">
                                    <img src="{{ $item['image'] }}" class="msone-cart-img">
                                    <span class="msone-product-name">{{ $item['name'] }}</span>
                                </div>
                            </td>

                            <td data-label="Price" class="msone-price-text">
                                $ {{ $item['price'] }}
                            </td>

                            <td data-label="Quantity">
                                <form action="{{ route('cart.update') }}" method="POST" class="msone-update-form">
                                    @csrf
                                    <input type="hidden" name="id" value="{{ $id }}">
                                    <input type="number" name="quantity" value="{{ $item['quantity'] }}" min="1" class="msone-qty-input">
                                    <button class="msone-btn-blue-sm">Modify</button>
                                </form>
                            </td>

                            <td data-label="Action">
                                <form action="{{ route('cart.remove') }}" method="POST">
                                    @csrf
                                    <input type="hidden" name="id" value="{{ $id }}">
                                    <button class="msone-btn-remove"
                                            onclick="return confirm('Remove this product?')">
                                        Remove
                                    </button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>

        @else

            <p style="text-align: center; font-size: 18px; margin-top: 40px; font-weight:600;">
                Your cart is empty.
            </p>
            <div style="text-align: center; padding:50px">
                <a href="{{ url('/electronics') }}" class="msone-btn-outline">
                    Add Product
                </a>
            </div>
            

        @endif

    </div>

    @if(session('cart') && count(session('cart')) > 0)
        <div class="msone-cart-summary" style="text-align: center;">
            <div class="msone-total-box">
                <span style="font-size: 25px; font-weight:600;">Total:</span>
                <h4 class="msone-total-amount">$ {{ $total }}</h4>
            </div>

            <form action="{{ route('stripe.checkout') }}" method="POST" style="margin-top:20px;">
                @csrf
                <button type="submit" class="stripe-button">
                    Pay with Stripe
                </button>
            </form>

            <a href="{{ url('/electronics') }}" class="msone-btn-outline">
                Continue Shopping
            </a>
        </div>
    @endif

</div>
@endsection
