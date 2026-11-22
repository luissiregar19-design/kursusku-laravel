<!doctype html>
<html lang="id">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>@yield('title', 'KursusKu')</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])

    <style>
        /* Pagination Previous / Next sebagai tombol, senada tema */
        nav[role="navigation"] {
            margin-top: 16px;
        }
        nav[role="navigation"] > div:first-child {
            display: flex;
            justify-content: space-between;
            gap: 12px;
        }
        nav[role="navigation"] > div:first-child a,
        nav[role="navigation"] > div:first-child span {
            display: inline-block;
            padding: 9px 20px;
            border-radius: 999px;
            font-size: 14px;
            font-weight: 500;
            text-decoration: none;
            border: 1px solid #2dd4bf;
            background: transparent;
            color: #2dd4bf;
            transition: background .2s, color .2s;
        }
        nav[role="navigation"] > div:first-child a:hover {
            background: #2dd4bf;
            color: #0b2540;
        }
        nav[role="navigation"] > div:first-child span {
            opacity: .35;
            cursor: not-allowed;
        }
        nav[role="navigation"] p {
            color: rgba(255,255,255,.8);
            font-size: 13px;
            margin: 10px 0 0;
        }
    </style>
</head>
<body class="@yield('body_class')">
    @include('partials.navbar')

    @yield('hero')

    <main class="container py-4">
        @if (session('success'))
            <div class="alert alert-success">{{ session('success') }}</div>
        @endif

        @yield('content')
    </main>

    <script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>
    @stack('scripts')
</body>
</html>