@extends('layouts.app')

@section('title', 'Detail Pesanan')

@push('styles')
<link rel="stylesheet" href="{{ asset('assets/css/orders.css') }}">
@endpush

@section('content')
<section class="orders-container">
    <h1>Detail Pesanan</h1>

    <div class="orders-card">
        <div class="order-detail-header">
            <p><strong>Kode Pesanan:</strong> #ORD{{ str_pad($order->id, 4, '0', STR_PAD_LEFT) }}</p>
            <p><strong>Tanggal:</strong> {{ $order->created_at->format('d M Y') }}</p>
            <p><strong>Status:</strong> {{ ucfirst($order->status) }}</p>
            <p><strong>Pembayaran:</strong> {{ $order->metode_pembayaran }}</p>
            <p><strong>Alamat:</strong> {{ $order->alamat }}</p>
        </div>

        <table>
            <thead>
                <tr>
                    <th>Produk</th>
                    <th>Storage</th>
                    <th>Harga</th>
                    <th>Qty</th>
                    <th>Subtotal</th>
                </tr>
            </thead>

            <tbody>
                @foreach($order->items as $item)
                    <tr>
                        <td>{{ $item->nama_produk }}</td>
                        <td>{{ $item->storage }}</td>
                        <td>Rp {{ number_format($item->harga, 0, ',', '.') }}</td>
                        <td>{{ $item->qty }}</td>
                        <td>Rp {{ number_format($item->subtotal, 0, ',', '.') }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>

        <div class="order-total">
            Total: Rp {{ number_format($order->total, 0, ',', '.') }}
        </div>
    </div>
</section>
@endsection