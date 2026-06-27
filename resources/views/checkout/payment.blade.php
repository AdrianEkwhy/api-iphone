@extends('layouts.app')

@section('title', 'Pembayaran')

@push('styles')
<link rel="stylesheet" href="{{ asset('assets/css/checkout.css') }}">
@endpush

@section('content')

<section class="checkout-container">

    <div class="checkout-left">
        <h2>Instruksi Pembayaran</h2>

        <p>Pesanan kamu berhasil dibuat.</p>
        <p>Kode Pesanan: <strong>#ORD{{ str_pad($order->id, 4, '0', STR_PAD_LEFT) }}</strong></p>
        <p>Metode Pembayaran: <strong>{{ $order->metode_pembayaran }}</strong></p>

        <div class="payment-box">
            @if($order->metode_pembayaran == 'Transfer Bank')
                <h3>Transfer Bank</h3>
                <p>Bank BCA</p>
                <p>No. Rekening: <strong>1234567890</strong></p>
                <p>Atas Nama: <strong>iPhone Store</strong></p>
            @elseif($order->metode_pembayaran == 'QRIS')
                <h3>QRIS</h3>
                <p>Silakan scan QRIS untuk melakukan pembayaran.</p>
                <div class="qris-box">QRIS</div>
            @elseif($order->metode_pembayaran == 'COD')
                <h3>COD</h3>
                <p>Pembayaran dilakukan saat barang diterima.</p>
            @else
                <h3>{{ $order->metode_pembayaran }}</h3>
                <p>Silakan lakukan pembayaran melalui aplikasi {{ $order->metode_pembayaran }}.</p>
            @endif
        </div>

        <a href="{{ route('orders.index') }}" class="btn-blue">
            Lihat Pesanan Saya
        </a>
    </div>

    <div class="checkout-right">
        <h2>Ringkasan Pesanan</h2>

        @foreach($order->items as $item)
            <div class="summary-item">
                <div>
                    <strong>{{ $item->nama_produk }}</strong><br>
                    <small>{{ $item->storage }} × {{ $item->qty }}</small>
                </div>

                <span>
                    Rp {{ number_format($item->subtotal, 0, ',', '.') }}
                </span>
            </div>
        @endforeach

        <hr>

        <div class="summary-item total">
            <span>Total</span>
            <strong>Rp {{ number_format($order->total, 0, ',', '.') }}</strong>
        </div>
    </div>

</section>

@endsection