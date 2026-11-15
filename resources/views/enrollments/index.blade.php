@extends('layouts.app')

@section('title', 'Laporan Enrollment')

@section('content')
<div class="page-header">
    <div>
        <h2>Laporan Enrollment KursusKu</h2>
        <p class="text-muted">Daftar peserta yang sudah terdaftar di tiap kursus.</p>
    </div>
    <a href="{{ route('enrollments.create') }}" class="btn btn-primary">+ Tambah Enrollment</a>
</div>

<div class="grid" style="margin-bottom: 24px;">
    <div class="card" style="padding: 20px;">
        <small>Total enrollment</small>
        <h3 style="margin: 4px 0 0; font-size: 28px;">{{ $enrollments->count() }}</h3>
    </div>
    <div class="card" style="padding: 20px;">
        <small>Peserta terdaftar</small>
        <h3 style="margin: 4px 0 0; font-size: 28px;">{{ $enrollments->pluck('participant_id')->unique()->count() }}</h3>
    </div>
    <div class="card" style="padding: 20px;">
        <small>Kursus terisi</small>
        <h3 style="margin: 4px 0 0; font-size: 28px;">{{ $enrollments->pluck('course_id')->unique()->count() }}</h3>
    </div>
</div>

<div class="table-wrap">
    <table class="table table-hover">
        <thead>
            <tr>
                <th>No</th>
                <th>Participant</th>
                <th>Course</th>
                <th>Start Date</th>
                <th>Status</th>
            </tr>
        </thead>
        <tbody>
            @forelse ($enrollments as $enrollment)
                <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td>{{ $enrollment->participant->name }}</td>
                    <td>{{ $enrollment->course->name }}</td>
                    <td>{{ $enrollment->course->start_date?->format('d-m-Y') }}</td>
                    <td>
                        <span class="badge {{ $enrollment->status === 'registered' ? 'bg-success' : 'bg-secondary' }}">
                            {{ $enrollment->status }}
                        </span>
                    </td>
                </tr>
            @empty
                <tr>
                    <td colspan="5" class="text-center text-muted" style="padding: 32px;">
                        Belum ada enrollment. Klik "Tambah Enrollment" untuk memulai.
                    </td>
                </tr>
            @endforelse
        </tbody>
    </table>
</div>
@endsection