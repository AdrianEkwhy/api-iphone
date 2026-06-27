<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>@yield('title', 'Admin Dashboard')</title>
    <link rel="stylesheet" href="{{ asset('assets/css/admin.css') }}">
</head>
<body>

<header class="admin-navbar">
    <div class="navbar-left">
        <a href="{{ route('admin.dashboard') }}" class="admin-logo">
            <img src="data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' viewBox='0 0 24 24' fill='%23fff'%3E%3Cpath d='M18.71 19.5c-.83 1.24-1.71 2.45-3.05 2.47-1.34.02-1.77-.645-3.31-.645-1.554 0-2.01.645-3.31.645-1.34-.02-2.29-1.25-3.12-2.47-1.86-2.75-2.54-6.46-1.07-8.36 1.23-1.74 3.02-2.36 4.19-2.36 1.211 0 2.217.66 2.99.66.78 0 2.05-.85 3.45-.795 1.263.01 2.445.487 3.268 1.247-.138.08-.963.603-1.738 1.77-.905 1.4-.835 2.75-.695 3.02-.02.02-.08.04-.135.04-.09 0-.17-.045-.22-.11-.52-.82-.48-2.41.26-3.77.52-1.06 1.365-1.795 2.605-1.82 1.24-.025 2.305.645 2.905 1.645.6 1 .545 2.41.345 3.051-.2.66-1.045 2.915-2.88 2.915-.33 0-.66-.025-.99-.08z'/%3E%3Cpath d='M12 0C5.383 0 0 5.383 0 12s5.383 12 12 12 12-5.383 12-12S18.617 0 12 0zm0 1.5c5.799 0 10.5 4.701 10.5 10.5S17.799 22.5 12 22.5 1.5 17.799 1.5 12 6.201 1.5 12 1.5z'/%3E%3C/svg%3E" alt="Apple Logo">
            Admin Dashboard
        </a>
    </div>

    <div class="navbar-right">
        <span class="admin-user">{{ auth()->user()->name }}</span>
        <form method="POST" action="{{ route('logout') }}" class="logout-form">
            @csrf
            <button type="submit" class="logout-btn">Logout</button>
        </form>
    </div>
</header>

<div class="admin-layout">
    <aside class="admin-sidebar">
        <h2>Menu</h2>

        <a href="{{ route('admin.dashboard') }}" class="sidebar-item {{ request()->routeIs('admin.dashboard') ? 'active' : '' }}">
            📊 Dashboard
        </a>
        <a href="{{ route('admin.produk.index') }}" class="sidebar-item {{ request()->routeIs('admin.produk.*') ? 'active' : '' }}">
            📱 Produk
        </a>
        <a href="{{ route('admin.pesanan.index') }}" class="sidebar-item {{ request()->routeIs('admin.pesanan.*') ? 'active' : '' }}">
            📦 Pesanan
        </a>
        <a href="{{ route('admin.user.index') }}" class="sidebar-item {{ request()->routeIs('admin.user.*') ? 'active' : '' }}">
            👥 User
        </a>
    </aside>

    <main class="admin-main">
        @yield('content')
    </main>
</div>

</body>
</html>