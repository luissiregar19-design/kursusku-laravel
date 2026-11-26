<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Lupa Password | KursusKu</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600;700&display=swap" rel="stylesheet">
    <style>
        :root { --green: #34b27b; --green-hover: #46c78d; }
        body {
            font-family: 'Poppins', sans-serif; min-height: 100vh; color: #fff;
            background: linear-gradient(180deg, #05070d 0%, #08263d 50%, #1f7fb0 100%) fixed;
        }
        .navbar { background: transparent !important; }
        .login-card {
            max-width: 420px; margin: 40px auto; padding: 32px 28px; border-radius: 18px;
            background: rgba(255, 255, 255, .08);
            border: 1px solid rgba(52, 178, 123, .55); border-top: 4px solid var(--green);
            backdrop-filter: blur(8px); box-shadow: 0 14px 34px rgba(0, 0, 0, .45);
        }
        .badge-soft {
            display: inline-block; background: rgba(52, 178, 123, .25); color: #8ff0c0;
            font-size: .75rem; padding: 4px 10px; border-radius: 6px; margin-bottom: 12px;
        }
        .login-card h2 { font-weight: 700; }
        .login-card .sub { color: rgba(255, 255, 255, .75); }
        .form-label { color: rgba(255, 255, 255, .85); font-size: .9rem; }
        .form-control {
            background: rgba(255, 255, 255, .12); border: 1px solid rgba(255, 255, 255, .25); color: #fff;
        }
        .form-control:focus {
            background: rgba(255, 255, 255, .16); color: #fff; border-color: var(--green);
            box-shadow: 0 0 0 .2rem rgba(52, 178, 123, .3);
        }
        .btn-eye {
            background: rgba(255, 255, 255, .12); border: 1px solid rgba(255, 255, 255, .25);
            color: #fff; font-size: .85rem;
        }
        .btn-eye:hover { background: rgba(255, 255, 255, .22); color: #fff; }
        .btn-login {
            background: var(--green); color: #fff; border: 0; border-radius: 999px;
            padding: 10px; font-weight: 600; box-shadow: 0 6px 18px rgba(52, 178, 123, .4);
        }
        .btn-login:hover { background: var(--green-hover); color: #fff; }
        .login-card a { color: #8ff0c0; }
        .login-card a:hover { color: #fff; }
        .navbar .btn-primary { background: var(--green); border-color: var(--green); }
        .navbar .btn-primary:hover { background: var(--green-hover); border-color: var(--green-hover); }
    </style>
</head>
<body>

@include('partials.navbar')

<div class="login-card">
    <span class="badge-soft">Akun KursusKu</span>
    <h2 class="mb-1">Lupa Password</h2>
    <p class="sub mb-4">Masukkan email, kami kirim tautan untuk mengatur ulang password.</p>

    @if (session('status'))
        <div class="alert alert-success py-2 small">{{ session('status') }}</div>
    @endif
    @error('email')
        <div class="alert alert-danger py-2 small">{{ $message }}</div>
    @enderror

    <form method="POST" action="{{ route('password.email') }}">
        @csrf
        <div class="mb-4">
            <label class="form-label">Email</label>
            <input type="email" name="email" value="{{ old('email') }}" class="form-control" required autofocus>
        </div>
        <button type="submit" class="btn btn-login w-100">Kirim Tautan Reset</button>
    </form>

    <div class="mt-3 small">
        <a href="{{ route('login') }}">Kembali ke login</a>
    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/alpinejs@3.14.8/dist/cdn.min.js" defer></script>
</body>
</html>