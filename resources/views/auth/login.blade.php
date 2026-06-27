<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login - iPhone Store</title>
    <link rel="stylesheet" href="{{ asset('assets/css/auth.css') }}">
</head>
<body>

<div class="auth-container">
    <div class="auth-card">
        <h1>Login</h1>
        <p>Masuk ke iPhone Store</p>

        @if(session('success'))
            <div class="alert success">{{ session('success') }}</div>
        @endif

        @if($errors->any())
            <div class="alert error">
                {{ $errors->first() }}
            </div>
        @endif

        <form method="POST" action="{{ route('login.process') }}">
            @csrf

            <label>Email</label>
            <input type="email" name="email" value="{{ old('email') }}" required>

            <label>Password</label>
            <input type="password" name="password" required>

            <button type="submit">Login</button>
        </form>

        <div class="auth-footer">
            Belum punya akun?
            <a href="{{ route('register') }}">Daftar</a>
        </div>
    </div>
</div>

</body>
</html>