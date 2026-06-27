@extends('layouts.app')

@section('title', $iphone->nama)

@push('styles')
<link rel="stylesheet" href="{{ asset('assets/css/product.css') }}">
@endpush

@section('content')

<section class="product-detail">

    <div class="product-image-box">
        <img src="https://fdn2.gsmarena.com/vv/pics/apple/apple-iphone-15-pro-1.jpg" alt="{{ $iphone->nama }}">
    </div>

    <div class="product-info">
        <p class="breadcrumb">Katalog / Detail Produk</p>

        <h1>{{ $iphone->nama }}</h1>
        <p class="storage">{{ $iphone->storage }}</p>

        <h2>Rp {{ number_format($iphone->harga, 0, ',', '.') }}</h2>

        <p class="stock">
            Stok tersedia: <strong>{{ $iphone->stok }}</strong>
        </p>

        <p class="description">
            {{ $iphone->nama }} hadir dengan desain premium, performa cepat,
            kualitas kamera terbaik, dan pengalaman penggunaan yang nyaman
            untuk kebutuhan harian maupun profesional.
        </p>

        <div class="product-actions">
            <form method="POST" action="{{ route('cart.add', $iphone->id) }}">
                @csrf
                <button type="submit" class="btn-dark">
                    Tambah ke Keranjang
                </button>
            </form>

            <form method="POST" action="{{ route('cart.add', $iphone->id) }}">
                @csrf
                <button type="submit" class="btn-blue">
                    Beli Sekarang
                </button>
            </form>
        </div>

        <div class="product-note">
            <p>✓ Produk original</p>
            <p>✓ Garansi resmi</p>
            <p>✓ Pengiriman cepat</p>
        </div>
    </div>

</section>

@endsection