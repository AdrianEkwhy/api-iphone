@extends('layouts.app')

@section('title', 'Profil Saya')

@push('styles')
<link rel="stylesheet" href="{{ asset('assets/css/profile.css') }}">
@endpush

@section('content')

<section class="profile-container">

    <div class="profile-header">
        <h1>Profil Saya</h1>
        <p>Kelola informasi akun dan keamanan password kamu.</p>
    </div>

    @if(session('success'))
        <div class="alert success">{{ session('success') }}</div>
    @endif

    @if($errors->any())
        <div class="alert error">{{ $errors->first() }}</div>
    @endif

    <div class="profile-grid">

        <div class="profile-card user-card">
            <div class="avatar">
                {{ strtoupper(substr(auth()->user()->name, 0, 1)) }}
            </div>

            <h2>{{ auth()->user()->name }}</h2>
            <p>{{ auth()->user()->email }}</p>
            <span>{{ ucfirst(auth()->user()->role) }}</span>
        </div>

        <div class="profile-card">
            <h2>Edit Profil</h2>

            <form method="POST" action="{{ route('profile.update') }}">
                @csrf

                <label>Nama</label>
                <input type="text" name="name" value="{{ old('name', auth()->user()->name) }}" required>

                <label>Email</label>
                <input type="email" name="email" value="{{ old('email', auth()->user()->email) }}" required>

                <button type="submit">Simpan Perubahan</button>
            </form>
        </div>

        <div class="profile-card">
            <h2>Ganti Password</h2>

            <form method="POST" action="{{ route('profile.password') }}">
                @csrf

                <label>Password Lama</label>
                <input type="password" name="current_password" required>

                <label>Password Baru</label>
                <input type="password" name="password" required>

                <label>Konfirmasi Password Baru</label>
                <input type="password" name="password_confirmation" required>

                <button type="submit">Ubah Password</button>
            </form>
        </div>

    </div>

</section>

@endsection