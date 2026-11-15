<h1>Laporan Enrollment KursusKu</h1>

@if (session('success'))
    <div>{{ session('success') }}</div>
@endif

<a href="{{ route('enrollments.create') }}">Tambah Enrollment</a>

<table border="1" cellpadding="6">
    <thead>
        <tr>
            <th>Participant</th>
            <th>Course</th>
            <th>Start Date</th>
            <th>Status</th>
        </tr>
    </thead>
    <tbody>
        @forelse ($enrollments as $enrollment)
            <tr>
                <td>{{ $enrollment->participant->name }}</td>
                <td>{{ $enrollment->course->name }}</td>
                <td>{{ $enrollment->course->start_date?->format('d-m-Y') }}</td>
                <td>{{ $enrollment->status }}</td>
            </tr>
        @empty
            <tr><td colspan="4">Belum ada enrollment.</td></tr>
        @endforelse
    </tbody>
</table>