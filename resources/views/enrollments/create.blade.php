@extends('layouts.app')

@section('title', 'Tambah Enrollment')

@section('content')
<h2>Tambah Enrollment</h2>

<div class="card narrow">
    <form method="POST" action="{{ route('enrollments.store') }}">
        @csrf

        <div class="form-group">
            <label for="participant_id" class="form-label">Participant</label>
            <select name="participant_id" id="participant_id" class="form-select" required>
                <option value="">-- Pilih Participant --</option>
                @foreach ($participants as $participant)
                    <option value="{{ $participant->id }}"
                        @selected(old('participant_id') == $participant->id)>
                        {{ $participant->name }} - {{ $participant->email }}
                    </option>
                @endforeach
            </select>
            @error('participant_id') <div class="error">{{ $message }}</div> @enderror
        </div>

        <div class="form-group">
            <label for="course_id" class="form-label">Course</label>
            <select name="course_id" id="course_id" class="form-select" required>
                <option value="">-- Pilih Course --</option>
                @foreach ($courses as $course)
                    <option value="{{ $course->id }}"
                        @selected(old('course_id') == $course->id)>
                        {{ $course->code }} - {{ $course->name }}
                    </option>
                @endforeach
            </select>
            @error('course_id') <div class="error">{{ $message }}</div> @enderror
        </div>

        <div class="form-actions">
            <button type="submit" class="btn btn-primary">Simpan Enrollment</button>
            <a href="{{ url('/enrollments') }}" class="btn btn-outline-secondary">Batal</a>
        </div>
    </form>
</div>
@endsection