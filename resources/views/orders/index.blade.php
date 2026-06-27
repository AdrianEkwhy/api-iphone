@extends('layouts.app')

@section('title', 'Riwayat Pesanan')

@push('styles')
<link rel="stylesheet" href="{{ asset('assets/css/orders.css') }}">
@endpush

@section('content')
<section class="orders-container">
    <h1>Riwayat Pesanan</h1>

    <div class="orders-card">
        <table>
            <thead>
                <tr>
                    <th>Kode</th>
                    <th>Tanggal</th>
                    <th>Total</th>
                    <th>Status</th>
                    <th>Pembayaran</th>
                </tr>
            </thead>

            <tbody>
                @forelse($orders as $order)
                    <tr>
                        <td>#ORD{{ str_pad($order->id, 4, '0', STR_PAD_LEFT) }}</td>
                        <td>{{ $order->created_at->format('d M Y') }}</td>
                        <td>Rp {{ number_format($order->total, 0, ',', '.') }}</td>
                        <td><span class="status pending">{{ ucfirst($order->status) }}</span></td>
                        <td>{{ $order->metode_pembayaran }}</td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="5">Belum ada pesanan.</td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>
</section>
@endsection