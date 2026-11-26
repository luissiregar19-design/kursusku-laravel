<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Login | KursusKu</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600;700&display=swap" rel="stylesheet">
    <style>
        :root {
            --green: #34b27b;
            --green-hover: #46c78d;
        }
        body {
            font-family: 'Poppins', sans-serif;
            min-height: 100vh;
            color: #fff;
            background: linear-gradient(180deg, #05070d 0%, #08263d 50%, #1f7fb0 100%) fixed;
        }
        .navbar { background: transparent !important; }

        .login-card {
            max-width: 420px;
            margin: 50px auto;
            padding: 32px 28px;
            border-radius: 18px;
            background: rgba(255, 255, 255, .08);
            border: 1px solid rgba(52, 178, 123, .55);
            border-top: 4px solid var(--green);
            backdrop-filter: blur(8px);
            box-shadow: 0 14px 34px rgba(0, 0, 0, .45);
        }
        .badge-soft {
            display: inline-block;
            background: rgba(52, 178, 123, .25);
            color: #8ff0c0;
            font-size: .75rem;
            padding: 4px 10px;
            border-radius: 6px;
            margin-bottom: 12px;
        }
        .login-card h2 { font-weight: 700; }
        .login-card .sub { color: rgba(255, 255, 255, .75); }

        .form-label { color: rgba(255, 255, 255, .85); font-size: .9rem; }
        .form-control {
            background: rgba(255, 255, 255, .12);
            border: 1px solid rgba(255, 255, 255, .25);
            color: #fff;
        }
        .form-control:focus {
            background: rgba(255, 255, 255, .16);
            color: #fff;
            border-color: var(--green);
            box-shadow: 0 0 0 .2rem rgba(52, 178, 123, .3);
        }
        .btn-eye {
            background: rgba(255, 255, 255, .12);
            border: 1px solid rgba(255, 255, 255, .25);
            color: #fff;
            font-size: .85rem;
        }
        .btn-eye:hover { background: rgba(255, 255, 255, .22); color: #fff; }

        .btn-login {
            background: var(--green);
            color: #fff;
            border: 0;
            border-radius: 999px;
            padding: 10px;
            font-weight: 600;
            box-shadow: 0 6px 18px rgba(52, 178, 123, .4);
        }
        .btn-login:hover { background: var(--green-hover); color: #fff; }

        .form-check-input:checked { background-color: var(--green); border-color: var(--green); }
        .login-card a { color: #8ff0c0; }
        .login-card a:hover { color: #fff; }

        /* tombol Login di navbar ikut hijau */
        .navbar .btn-primary { background: var(--green); border-color: var(--green); }
        .navbar .btn-primary:hover { background: var(--green-hover); border-color: var(--green-hover); }
    </style>
</head>
<body>

@include('partials.navbar')

<div class="login-card" x-data="{ show: false }">
    <span class="badge-soft">Akun KursusKu</span>
    <h2 class="mb-1">Login</h2>
    <p class="sub mb-4">Masuk untuk melanjutkan belajar</p>

    @if (session('status'))
        <div class="alert alert-success py-2">{{ session('status') }}</div>
    @endif

    @if ($errors->any())
        <div class="alert alert-danger py-2">{{ $errors->first() }}</div>
    @endif

    <form method="POST" action="{{ route('login') }}">
        @csrf

        <div class="mb-3">
            <label class="form-label">Email</label>
            <input type="email" name="email" value="{{ old('email') }}"
                   class="form-control" autocomplete="username" required autofocus>
            @error('email')
                <small class="text-danger">{{ $message }}</small>
            @enderror
        </div>

        <div class="mb-3">
            <label class="form-label">Password</label>
            <div class="input-group">
                <input :type="show ? 'text' : 'password'" name="password"
                       class="form-control" autocomplete="current-password" required>
                <button type="button" class="btn btn-eye" @click="show = !show"
                        :aria-label="show ? 'Sembunyikan password' : 'Tampilkan password'">
                    <span x-text="show ? 'Sembunyikan' : 'Tampilkan'">Tampilkan</span>
                </button>
            </div>
            @error('password')
                <small class="text-danger">{{ $message }}</small>
            @enderror
        </div>

        <div class="form-check mb-3">
            <input class="form-check-input" type="checkbox" name="remember" id="remember">
            <label class="form-check-label" for="remember">Ingat saya</label>
        </div>

        <button type="submit" class="btn btn-login w-100">Login</button>
    </form>

    <div class="mt-3 small">
        <a href="{{ route('password.request') }}">Lupa password?</a><br>
        Belum punya akun? <a href="{{ route('register') }}">Daftar</a>
    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
{{-- Hapus baris Alpine di bawah kalau proyekmu sudah memuat Alpine lewat Vite (Breeze) --}}
<script src="https://cdn.jsdelivr.net/npm/alpinejs@3.14.8/dist/cdn.min.js" defer></script>
</body>
</html>