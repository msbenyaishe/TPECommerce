@php
    $cartCount = 0;

    if (session()->has('cart')) {
        foreach (session('cart') as $item) {
            $cartCount += $item['quantity'];
        }
    }
@endphp

<header class="navbar">
    <div class="navbar-inner">

        <a href="/" class="logo">
            <img src="{{ asset('imgs/MS1-4.png') }}" alt="MSONE Logo">
            <span>Electronics</span>
        </a>

        <nav class="nav-links">
            {{-- AUTHENTICATED USERS --}}
            @auth

                {{-- ADMIN ONLY --}}
                @if(auth()->user()->role === 'admin')
                <a href="/">Home</a>
                <a href="/electronics">Electronics</a>
                <a href="{{ route('products.create') }}">Add</a>
                <a href="/email">Share</a>
                <form action="{{ route('logout') }}" method="POST" style="display:inline;">
                    @csrf
                    <button type="submit" class="msone-nav-logout">
                        Logout
                    </button>
                </form>
                @endif
                
                @if(auth()->user()->role === 'user')
                <a href="/">Home</a>
                <a href="/electronics">Electronics</a>
                <a href="/contact">Contact</a>
                <a href="/cart" class="msone-cart-link">
                    <img src="{{ asset('imgs/cart-shopping-solid-full.svg') }}" width="30">

                    @if($cartCount > 0)
                        <span class="cart-badge-circle">
                            {{ $cartCount }}
                        </span>
                    @endif
                </a>

                <form action="{{ route('logout') }}" method="POST" style="display:inline;">
                    @csrf
                    <button type="submit" class="msone-nav-logout">
                        Logout
                    </button>
                </form>
                @endif
                
            {{-- GUEST USERS --}}
            @else
                <a href="/">Home</a>
                <a href="/electronics">Electronics</a>
                <a href="{{ route('login') }}">Login</a>
                <a href="{{ route('register') }}">Register</a>
                <a href="/about">About</a>
            @endauth
        </nav>

    </div>
</header>
