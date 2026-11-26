<nav class="navbar navbar-expand-lg bg-dark navbar-dark">
    <div class="container">
        <a class="navbar-brand fw-bold" href="{{ route('home') }}">KursusKu</a>

        <button class="navbar-toggler" type="button"
                data-bs-toggle="collapse" data-bs-target="#mainNavbar"
                aria-controls="mainNavbar" aria-expanded="false" aria-label="Buka menu">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="mainNavbar">
            <ul class="navbar-nav ms-auto align-items-lg-center">
                <li class="nav-item">
                    <a class="nav-link {{ request()->routeIs('home') ? 'active' : '' }}"
                       href="{{ route('home') }}">Beranda</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link {{ request()->routeIs('courses.*') ? 'active' : '' }}"
                       href="{{ route('courses.index') }}">Kursus</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link {{ request()->routeIs('enrollments.*') ? 'active' : '' }}"
                       href="{{ route('enrollments.create') }}">Pendaftaran</a>
                </li>

                @auth
                    <li class="nav-item ms-lg-3">
                        <a class="nav-link {{ request()->routeIs('dashboard') ? 'active' : '' }}"
                           href="{{ route('dashboard') }}">
                            {{ auth()->user()->name }}
                            @if ((auth()->user()->role ?? 'user') === 'admin')
                                <span class="badge bg-success ms-1">Admin</span>
                            @endif
                        </a>
                    </li>
                    <li class="nav-item ms-lg-2">
                        <form method="POST" action="{{ route('logout') }}" class="m-0">
                            @csrf
                            <button type="submit" class="btn btn-outline-light btn-sm rounded-pill px-3">Logout</button>
                        </form>
                    </li>
                @else
                    <li class="nav-item ms-lg-3">
                        <a class="btn btn-primary btn-sm rounded-pill px-3"
                           href="{{ route('login') }}">Login</a>
                    </li>
                    <li class="nav-item ms-lg-2 mt-2 mt-lg-0">
                        <a class="btn btn-outline-light btn-sm rounded-pill px-3"
                           href="{{ route('register') }}">Daftar</a>
                    </li>
                @endauth
            </ul>
        </div>
    </div>
</nav>