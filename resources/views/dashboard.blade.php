<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Dashboard | KursusKu</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600;700&display=swap" rel="stylesheet">
    <style>
        :root { --green: #34b27b; --green-hover: #46c78d; }
        body {
            font-family: 'Poppins', sans-serif; min-height: 100vh; color: #fff;
            background: linear-gradient(180deg, #05070d 0%, #08263d 50%, #1f7fb0 100%) fixed;
        }
        .navbar { background: transparent !important; }
        .navbar .btn-primary { background: var(--green); border-color: var(--green); }
        .navbar .btn-primary:hover { background: var(--green-hover); border-color: var(--green-hover); }
        .panel {
            background: rgba(255, 255, 255, .08);
            border: 1px solid rgba(52, 178, 123, .55); border-top: 4px solid var(--green);
            border-radius: 18px; padding: 28px;
            backdrop-filter: blur(8px); box-shadow: 0 14px 34px rgba(0, 0, 0, .45);
        }
        .badge-soft {
            display: inline-block; background: rgba(52, 178, 123, .25); color: #8ff0c0;
            font-size: .75rem; padding: 4px 10px; border-radius: 6px; margin-bottom: 12px;
        }
        .badge-role {
            display: inline-block; font-size: .75rem; font-weight: 600;
            padding: 3px 12px; border-radius: 999px; text-transform: capitalize;
            background: rgba(255, 255, 255, .15); color: #fff;
        }
        .badge-role.admin { background: var(--green); }
        .avatar {
            width: 84px; height: 84px; border-radius: 50%;
            background: var(--green); color: #fff; font-size: 2rem; font-weight: 700;
            display: flex; align-items: center; justify-content: center;
            box-shadow: 0 6px 18px rgba(52, 178, 123, .4);
        }
        .label-muted { color: rgba(255, 255, 255, .6); font-size: .8rem; margin-bottom: 0; }
        .btn-green {
            background: var(--green); color: #fff; border: 0; border-radius: 999px;
            padding: 9px 22px; font-weight: 600;
        }
        .btn-green:hover { background: var(--green-hover); color: #fff; }
        .btn-out { border: 2px solid #fff; color: #fff; border-radius: 999px; padding: 7px 22px; background: transparent; }
        .btn-out:hover { background: #fff; color: #08263d; }
    </style>
</head>
<body>

@include('partials.navbar')

@php($user = auth()->user())

<div class="container py-4" style="max-width: 760px;">
    <div class="panel">
        <span class="badge-soft">Profil Saya</span>
        <h2 class="fw-bold mb-4">Selamat datang, {{ $user->name }}!</h2>

        @if (session('status'))
            <div class="alert alert-success py-2">{{ session('status') }}</div>
        @endif

        <div class="d-flex align-items-center gap-4 flex-wrap mb-4">
            <div class="avatar">{{ strtoupper(substr($user->name, 0, 1)) }}</div>
            <div>
                <p class="label-muted">Nama</p>
                <p class="fs-5 fw-semibold mb-2">{{ $user->name }}</p>

                <p class="label-muted">Email</p>
                <p class="mb-2">{{ $user->email }}</p>

                <p class="label-muted">Role</p>
                <p class="mb-2">
                    <span class="badge-role {{ ($user->role ?? 'user') === 'admin' ? 'admin' : '' }}">
                        {{ $user->role ?? 'user' }}
                    </span>
                </p>

                <p class="label-muted">Bergabung sejak</p>
                <p class="mb-0">{{ $user->created_at->format('d M Y') }}</p>
            </div>
        </div>

        <div class="d-flex gap-2 flex-wrap">
            <a href="{{ route('courses.index') }}" class="btn btn-green">Lihat Kursus</a>
            <a href="{{ route('enrollments.create') }}" class="btn btn-out">Daftar Kursus</a>
            <form method="POST" action="{{ route('logout') }}" class="m-0">
                @csrf
                <button type="submit" class="btn btn-out">Logout</button>
            </form>
        </div>
    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>