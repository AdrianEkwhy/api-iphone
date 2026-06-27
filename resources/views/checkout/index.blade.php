@extends('layouts.app')

@section('title', 'Checkout')

@push('styles')
<link rel="stylesheet" href="{{ asset('assets/css/checkout.css') }}">
@endpush

@section('content')

<section class="checkout-container">

    <div class="checkout-left">
        <h2>Informasi Pembeli</h2>

        <form id="checkoutForm" method="POST" action="{{ route('checkout.store') }}">
            @csrf

            <label>Nama Lengkap</label>
            <input
                type="text"
                name="nama"
                placeholder="Masukkan nama lengkap"
                value="{{ old('nama', auth()->user()->name) }}"
                required
            >

            <label>Email</label>
            <input
                type="email"
                name="email"
                placeholder="Masukkan email"
                value="{{ old('email', auth()->user()->email) }}"
                required
            >

            <label>Nomor HP</label>
            <input
                type="text"
                name="no_hp"
                placeholder="08xxxxxxxxxx"
                value="{{ old('no_hp') }}"
                required
            >

            <label>Alamat Lengkap</label>
            <textarea
                name="alamat"
                placeholder="Masukkan alamat lengkap"
                required
            >{{ old('alamat') }}</textarea>

            <label>Metode Pembayaran</label>
            <select name="metode_pembayaran" required>
                <option value="Transfer Bank">Transfer Bank</option>
                <option value="QRIS">QRIS</option>
                <option value="COD">COD</option>
                <option value="OVO">OVO</option>
                <option value="DANA">DANA</option>
                <option value="GoPay">GoPay</option>
            </select>
        </form>
    </div>

    <div class="checkout-right">
        <h2>Ringkasan Pesanan</h2>

        @forelse($cart as $item)
            <div class="summary-item">
                <div>
                    <strong>{{ $item['nama'] }}</strong><br>
                    <small>{{ $item['storage'] }} × {{ $item['qty'] }}</small>
                </div>

                <span>
                    Rp {{ number_format($item['harga'] * $item['qty'], 0, ',', '.') }}
                </span>
            </div>
        @empty
            <p>Keranjang masih kosong.</p>
        @endforelse

        <hr>

        <div class="summary-item total">
            <span>Total</span>
            <strong>Rp {{ number_format($total, 0, ',', '.') }}</strong>
        </div>

        @if($total > 0)
            <button type="submit" form="checkoutForm" class="btn-blue">
                Bayar Sekarang
            </button>
        @else
            <a href="{{ route('catalog') }}" class="btn-blue">
                Belanja Dulu
            </a>
        @endif
    </div>

</section>


@endsection

