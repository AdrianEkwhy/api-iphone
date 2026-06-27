<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register - iPhone Store</title>
    <link rel="stylesheet" href="{{ asset('assets/css/auth.css') }}">
</head>
<body>

<div class="auth-container">
    <div class="auth-card">
        <h1>Register</h1>
        <p>Buat akun iPhone Store</p>

        @if($errors->any())
            <div class="alert error">
                {{ $errors->first() }}
            </div>
        @endif

        <form method="POST" action="{{ route('register.process') }}">
            @csrf

            <label>Nama</label>
            <input type="text" name="name" value="{{ old('name') }}" required>

            <label>Email</label>
            <input type="email" name="email" value="{{ old('email') }}" required>

            <label>Password</label>
            <input type="password" name="password" required>

            <label>Konfirmasi Password</label>
            <input type="password" name="password_confirmation" required>

            <button type="submit">Daftar</button>
        </form>

        <div class="auth-footer">
            Sudah punya akun?
            <a href="{{ route('login') }}">Login</a>
        </div>
    </div>
</div>

</body>
</html>