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
                @endif
                
                @if(auth()->user()->role === 'user')
                <a href="/">Home</a>
                <a href="/electronics">Electronics</a>
                <a href="/contact">Contact</a>
                @endif

                {{-- LOGOUT --}}
                <form action="{{ route('logout') }}" method="POST" style="display:inline;">
                    @csrf
                    <button type="submit" class="msone-nav-logout">
                        Logout
                    </button>
                </form>

            {{-- GUEST USERS --}}
            @else
                <a href="/">Home</a>
                <a href="/electronics">Electronics</a>
                <a href="{{ route('login') }}">Login</a>
                <a href="{{ route('register') }}">Register</a>
            @endauth
        </nav>

    </div>
</header>
