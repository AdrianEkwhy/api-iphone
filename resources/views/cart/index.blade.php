@extends('layouts.app')

@section('title', 'Keranjang')

@push('styles')
<link rel="stylesheet" href="{{ asset('assets/css/cart.css') }}">
@endpush

@section('content')

@php
    $total = collect($cart)->sum(fn($item) => $item['harga'] * $item['qty']);
@endphp

<section class="cart-container">

    <h1>Keranjang Belanja</h1>

    <table class="cart-table">
        <thead>
            <tr>
                <th>Produk</th>
                <th>Storage</th>
                <th>Harga</th>
                <th>Qty</th>
                <th>Subtotal</th>
                <th>Aksi</th>
            </tr>
        </thead>

        <tbody>
            @forelse($cart as $item)
                <tr>
                    <td>{{ $item['nama'] }}</td>
                    <td>{{ $item['storage'] }}</td>
                    <td>Rp {{ number_format($item['harga'], 0, ',', '.') }}</td>
                    <td>{{ $item['qty'] }}</td>
                    <td>Rp {{ number_format($item['harga'] * $item['qty'], 0, ',', '.') }}</td>
                    <td>
                        <form method="POST" action="{{ route('cart.remove', $item['id']) }}">
                            @csrf
                            <button type="submit" class="btn-delete">Hapus</button>
                        </form>
                    </td>
                </tr>
            @empty
                <tr>
                    <td colspan="6">Keranjang masih kosong.</td>
                </tr>
            @endforelse
        </tbody>
    </table>

    <div class="cart-summary">
        <h2>Total</h2>

        <h1>Rp {{ number_format($total, 0, ',', '.') }}</h1>

        @if($total > 0)
            <a href="{{ route('checkout.index') }}" class="btn-blue">
                Checkout
            </a>
        @else
            <a href="{{ route('catalog') }}" class="btn-blue">
                Belanja Dulu
            </a>
        @endif
    </div>

</section>

@endsection