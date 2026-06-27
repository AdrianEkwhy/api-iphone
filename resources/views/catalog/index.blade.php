@extends('layouts.app')

@section('title', 'Katalog iPhone')

@push('styles')
<link rel="stylesheet" href="{{ asset('assets/css/catalog.css') }}">
@endpush

@section('content')

<section class="catalog-hero">
    <p>New Collection</p>
    <h1>Katalog iPhone</h1>
    <span>Temukan iPhone favoritmu dengan harga terbaik.</span>
</section>

<section class="catalog-container">
    <div class="section-title">
        <h2>Produk Terbaru</h2>
        <p>Pilih iPhone sesuai kebutuhanmu</p>
    </div>

    <div class="product-grid">
        @forelse($iphones as $iphone)
            <div class="product-card">
                <img src="{{ $iphone->image_url ?? 'https://fdn2.gsmarena.com/vv/pics/apple/apple-iphone-15-pro-1.jpg' }}" alt="{{ $iphone->nama }}">

                <h3>{{ $iphone->nama }}</h3>
                <p class="storage">{{ $iphone->storage }}</p>
                <p class="price">Rp {{ number_format($iphone->harga, 0, ',', '.') }}</p>
                <p class="stock">Stok: {{ $iphone->stok }}</p>

                <a href="{{ route('product.detail', $iphone->id) }}" class="btn-detail">
                    Lihat Detail
                </a>
            </div>
        @empty
            <p class="empty">Belum ada produk tersedia.</p>
        @endforelse
    </div>
</section>

@endsection