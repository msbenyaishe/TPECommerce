<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="Premium electronics store - High-quality electronic products for modern lifestyles">
    
    <title>@yield('title', 'MSONE') - Premium Electronics</title>

    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
</head>
<body class="page-layout">

    @include('partials.menu')

    <main class="page-content">
        <div class="container">

            {{-- Success message (Atelier 9) --}}
            @if(session('success'))
                <div class="alert alert-success">
                    {{ session('success') }}
                </div>
            @endif

            @yield('content')
        </div>
    </main>

    @include('partials.footer')

    <script>
        // Navbar scroll effect
        window.addEventListener('scroll', function() {
            const navbar = document.querySelector('.navbar');
            if (navbar && window.scrollY > 10) {
                navbar.classList.add('scrolled');
            } else if (navbar) {
                navbar.classList.remove('scrolled');
            }
        });
    </script>
</body>
</html>
