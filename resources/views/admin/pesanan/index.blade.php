@extends('layouts.admin')

@section('title', 'Manajemen Pesanan')

@section('content')
<section class="admin-container">
    <div class="admin-header">
        <h1>Manajemen Pesanan</h1>
        <p>Kelola semua pesanan pelanggan</p>
    </div>

    <div class="table-section">
        <table class="data-table">
            <thead>
                <tr>
                    <th>ID Order</th>
                    <th>Nama Pelanggan</th>
                    <th>Produk Dipesan</th>
                    <th>Total Harga</th>
                    <th>Status</th>
                    <th>Tanggal</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                @forelse($orders as $order)
                    <tr>
                        <td>#{{ str_pad($order->id, 5, '0', STR_PAD_LEFT) }}</td>
                        <td>{{ $order->user->name }}</td>
                        <td>
                            <div class="products-list">
                                @foreach($order->items as $item)
                                    <div class="product-item">
                                        <span class="product-name">{{ $item->nama_produk }}</span>
                                        <span class="product-storage">({{ $item->storage }})</span>
                                        <span class="product-qty">x{{ $item->qty }}</span>
                                    </div>
                                @endforeach
                            </div>
                        </td>
                        <td>Rp {{ number_format($order->total, 0, ',', '.') }}</td>
                        <td>
                            <span class="status-badge {{ strtolower($order->status) }}">
                                {{ ucfirst($order->status) }}
                            </span>
                        </td>
                        <td>{{ $order->created_at->format('d/m/Y') }}</td>
                        <td>
                            <div class="action-buttons">
                                <button class="btn-view">Lihat</button>
                                <button class="btn-delete">Hapus</button>
                            </div>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="7" class="text-center">Belum ada pesanan</td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>

    @if($orders->hasPages())
        <div class="pagination-section">
            {{ $orders->links() }}
        </div>
    @endif
</section>

<style>
    .table-section {
        background: white;
        border-radius: 12px;
        overflow: hidden;
        box-shadow: 0 2px 12px rgba(0,0,0,0.06);
    }

    .data-table {
        width: 100%;
        border-collapse: collapse;
    }

    .data-table thead {
        background: #f5f5f7;
        border-bottom: 1px solid #e5e5e7;
    }

    .data-table th {
        padding: 16px;
        text-align: left;
        font-weight: 600;
        color: #1d1d1f;
        font-size: 14px;
    }

    .data-table td {
        padding: 14px 16px;
        border-bottom: 1px solid #e5e5e7;
        color: #1d1d1f;
    }

    .data-table tbody tr:hover {
        background: #f9f9f9;
    }

    .status-badge {
        padding: 6px 12px;
        border-radius: 999px;
        font-size: 12px;
        font-weight: 600;
    }

    .status-badge.pending {
        background: #fef3c7;
        color: #92400e;
    }

    .status-badge.completed {
        background: #ecf4e8;
        color: #2d6a1a;
    }

    .status-badge.cancelled {
        background: #fef2f2;
        color: #9d2d2d;
    }

    .action-buttons {
        display: flex;
        gap: 8px;
    }

    .btn-view, .btn-delete {
        padding: 6px 12px;
        border: none;
        border-radius: 6px;
        cursor: pointer;
        font-size: 12px;
        font-weight: 500;
        transition: all 0.3s ease;
    }

    .btn-view {
        background: #0071e3;
        color: white;
    }

    .btn-view:hover {
        background: #0066cc;
    }

    .btn-delete {
        background: #f5f5f7;
        color: #1d1d1f;
    }

    .btn-delete:hover {
        background: #e8e8ed;
        color: #d81b1b;
    }

    .products-list {
        display: flex;
        flex-direction: column;
        gap: 8px;
    }

    .product-item {
        font-size: 13px;
        line-height: 1.4;
        background: #f9f9f9;
        padding: 8px 12px;
        border-radius: 6px;
    }

    .product-name {
        font-weight: 500;
        color: #1d1d1f;
    }

    .product-storage {
        color: #6e6e73;
        font-size: 12px;
    }

    .product-qty {
        font-weight: 600;
        color: #0071e3;
        margin-left: 4px;
    }

    .text-center {
        text-align: center;
        color: #6e6e73;
    }

    .pagination-section {
        margin-top: 24px;
        display: flex;
        justify-content: center;
    }
</style>
@endsection
