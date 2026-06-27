@extends('layouts.admin')

@section('title', 'Manajemen User')

@section('content')
<section class="admin-container">
    <div class="admin-header">
        <h1>Manajemen User</h1>
        <p>Kelola semua pengguna iPhone Store</p>
    </div>

    <div class="table-section">
        <table class="data-table">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Nama</th>
                    <th>Email</th>
                    <th>Role</th>
                    <th>Terdaftar</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                @forelse($users as $user)
                    <tr>
                        <td>{{ $user->id }}</td>
                        <td>{{ $user->name }}</td>
                        <td>{{ $user->email }}</td>
                        <td>
                            <span class="role-badge {{ strtolower($user->role ?? 'user') }}">
                                {{ ucfirst($user->role ?? 'User') }}
                            </span>
                        </td>
                        <td>{{ $user->created_at->format('d/m/Y') }}</td>
                        <td>
                            <div class="action-buttons">
                                <button class="btn-edit">Edit</button>
                                <button class="btn-delete">Hapus</button>
                            </div>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="6" class="text-center">Belum ada user</td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>

    @if($users->hasPages())
        <div class="pagination-section">
            {{ $users->links() }}
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

    .role-badge {
        padding: 6px 12px;
        border-radius: 999px;
        font-size: 12px;
        font-weight: 600;
    }

    .role-badge.admin {
        background: #dbeafe;
        color: #1e40af;
    }

    .role-badge.user {
        background: #f0fdf4;
        color: #166534;
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

    .pagination-section {
        margin-top: 24px;
        display: flex;
        justify-content: center;
    }
</style>
@endsection
