<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'iPhone Store')</title>

    <link rel="stylesheet" href="{{ asset('assets/css/app.css') }}">
    @stack('styles')
</head>

<body>

<header class="navbar">

    <div class="logo">
    <a href="{{ route('catalog') }}">
        <img src="https://upload.wikimedia.org/wikipedia/commons/f/fa/Apple_logo_black.svg"
             alt="Apple Logo">

        <span>iPhone Store</span>
    </a>
</div>

<button class="mobile-menu-btn" onclick="toggleMenu()">
    ☰
</button>

    <nav class="nav-links">

    <a href="{{ route('catalog') }}"
       class="{{ request()->routeIs('catalog') ? 'active' : '' }}">
        Katalog
    </a>

    <a href="{{ route('cart.index') }}"
       class="{{ request()->routeIs('cart.*') ? 'active' : '' }}">
        Keranjang

        @if(session('cart') && count(session('cart')) > 0)
            <span class="badge">
                {{ count(session('cart')) }}
            </span>
        @endif
    </a>

    <a href="{{ route('orders.index') }}"
       class="{{ request()->routeIs('orders.*') ? 'active' : '' }}">
        Pesanan
    </a>

    <a href="{{ route('profile.index') }}"
       class="{{ request()->routeIs('profile.*') ? 'active' : '' }}">
        Profil
    </a>

    <span class="user-name">
        Halo, {{ auth()->user()->name }}
    </span>

    <form action="{{ route('logout') }}" method="POST">
        @csrf

        <button type="submit" class="logout-btn">
            Logout
        </button>

    </form>

</nav>

</header>

<main>

    @yield('content')

</main>

<footer class="footer">

    <p>
        © {{ date('Y') }} iPhone Store. All Rights Reserved.
    </p>

</footer>

<script src="{{ asset('assets/js/app.js') }}"></script>

@stack('scripts')

<script>
    function toggleMenu() {
        document.getElementById('navLinks').classList.toggle('show');
    }
</script>

</body>
</html>