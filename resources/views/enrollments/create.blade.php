<h1>Tambah Enrollment</h1>

<form method="POST" action="{{ route('enrollments.store') }}">
    @csrf

    <label for="participant_id">Participant</label>
    <select name="participant_id" id="participant_id" required>
        <option value="">-- Pilih Participant --</option>
        @foreach ($participants as $participant)
            <option value="{{ $participant->id }}"
                @selected(old('participant_id') == $participant->id)>
                {{ $participant->name }} - {{ $participant->email }}
            </option>
        @endforeach
    </select>
    @error('participant_id') <div>{{ $message }}</div> @enderror

    <label for="course_id">Course</label>
    <select name="course_id" id="course_id" required>
        <option value="">-- Pilih Course --</option>
        @foreach ($courses as $course)
            <option value="{{ $course->id }}"
                @selected(old('course_id') == $course->id)>
                {{ $course->code }} - {{ $course->name }}
            </option>
        @endforeach
    </select>
    @error('course_id') <div>{{ $message }}</div> @enderror

    <button type="submit">Simpan Enrollment</button>
</form>