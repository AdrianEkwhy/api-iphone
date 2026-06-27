@extends('layouts.admin')

@section('title', 'Manajemen Produk')

@section('content')
<section class="admin-container">
    <div class="admin-header">
        <h1>Manajemen Produk</h1>
        <p>Kelola semua produk iPhone Store Anda</p>
    </div>

    <div class="table-section">
        <table class="data-table">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Nama Produk</th>
                    <th>Storage</th>
                    <th>Harga</th>
                    <th>Stok</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                @forelse($iphones as $iphone)
                    <tr>
                        <td>{{ $iphone->id }}</td>
                        <td>{{ $iphone->nama }}</td>
                        <td>{{ $iphone->storage }}</td>
                        <td>Rp {{ number_format($iphone->harga, 0, ',', '.') }}</td>
                        <td>
                            <span class="stock-badge {{ $iphone->stok > 5 ? 'in-stock' : 'low-stock' }}">
                                {{ $iphone->stok }}
                            </span>
                        </td>
                        <td>
                            <div class="action-buttons">
                                <button class="btn-edit">Edit</button>
                                <button class="btn-delete">Hapus</button>
                            </div>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="6" class="text-center">Belum ada produk</td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>
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

    .stock-badge {
        padding: 4px 12px;
        border-radius: 999px;
        font-size: 13px;
        font-weight: 600;
    }

    .stock-badge.in-stock {
        background: #ecf4e8;
        color: #2d6a1a;
    }

    .stock-badge.low-stock {
        background: #fef2f2;
        color: #9d2d2d;
    }

    .action-buttons {
        display: flex;
        gap: 8px;
    }

    .btn-edit, .btn-delete {
        padding: 6px 12px;
        border: none;
        border-radius: 6px;
        cursor: pointer;
        font-size: 12px;
        font-weight: 500;
        transition: all 0.3s ease;
    }

    .btn-edit {
        background: #0071e3;
        color: white;
    }

    .btn-edit:hover {
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

    .text-center {
        text-align: center;
        color: #6e6e73;
    }
</style>
@endsection
