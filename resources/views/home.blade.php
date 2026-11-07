@extends('layouts.app')

@section('title', 'Beranda - KursusKu')
<body class="@yield('body_class')">

@section('hero')
<section class="hero-bg py-5">
    <div class="container py-lg-4">
        <div class="row align-items-center g-4">
            <div class="col-lg-7">
                <span class="badge text-bg-success mb-3">Kursus teknologi untuk mahasiswa</span>
                <h1 class="display-5 fw-bold">Belajar lebih terarah bersama {{ $siteName }}</h1>
                <p class="lead hero-sub">
                    Pilih kursus, cek ketersediaan kursi, lalu isi formulir pendaftaran.
                </p>
                <a href="{{ route('enrollments.create') }}" class="btn btn-success">Daftar Kursus</a>
            </div>
            <div class="col-lg-5">
                <img src="{{ asset('images/hero-kursusku.jpg') }}"
                     alt="Ilustrasi kelas KursusKu" class="img-fluid rounded-4">
            </div>
        </div>
    </div>
</section>
@endsection

@section('content')
<h2 class="h4 mb-3">Kursus Pilihan</h2>
<div class="row g-3">
    @foreach ($featured as $course)
        <div class="col-md-4">
            <div class="card course-card h-100 shadow-sm">
                <div class="card-body">
                    <small class="text-secondary">{{ $course['code'] }}</small>
                    <h3 class="h5">{{ $course['name'] }}</h3>
                    <p class="mb-0">{{ $course['description'] }}</p>
                </div>
            </div>
        </div>
    @endforeach
</div>
@endsection