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
                <a href="/contact">Contact</a>
            @endauth


            {{-- THE REFINED LANGUAGE SWITCHER --}}
            @if(Request::is('/') || Request::is('ar') || Request::is('fr') || Request::is('en'))
                <form id="localeForm" class="msone-nav-form">
                    <select id="locale" name="lang" onchange="changeLocale()" class="msone-lang-select">
                        <option value="ar" {{ App::getLocale() == 'ar' ? 'selected' : '' }}>AR</option>
                        <option value="fr" {{ App::getLocale() == 'fr' ? 'selected' : '' }}>FR</option>
                        <option value="en" {{ App::getLocale() == 'en' ? 'selected' : '' }}>EN</option>
                    </select>
                </form>

                <script>
                    function changeLocale() {
                        var selectedLocale = document.getElementById("locale").value;
                        window.location.href = '/' + selectedLocale;
                    }
                </script>
            @endif
        </nav>

    </div>
</header>
