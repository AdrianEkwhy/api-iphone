@extends('layouts.admin')

@section('title', 'Dashboard Admin')

@section('content')
<section class="admin-container">
    <div class="admin-header">
        <h1>Dashboard Admin</h1>
        <p>Ringkasan data penjualan iPhone Store</p>
    </div>

    <div class="stats-grid">
        <div class="stats-card">
            <p>Total Produk</p>
            <h2>{{ $totalProducts }}</h2>
        </div>

        <div class="stats-card">
            <p>Total Pesanan</p>
            <h2>{{ $totalOrders }}</h2>
        </div>

        <div class="stats-card">
            <p>Total User</p>
            <h2>{{ $totalUsers }}</h2>
        </div>

        <div class="stats-card">
            <p>Total Revenue</p>
            <h2>Rp {{ number_format($totalRevenue, 0, ',', '.') }}</h2>
        </div>
    </div>
</section>
@endsection