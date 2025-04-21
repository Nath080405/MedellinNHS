@extends('layouts.app')

@section('content')
<div class="container">
    <h2>Edit Student</h2>

    <form method="POST" action="{{ route('students.update', $student->id) }}">
        @csrf
        @method('PUT')

        <div class="mb-3">
            <label>Name</label>
            <input type="text" name="name" class="form-control" required value="{{ old('name', $student->name) }}">
        </div>

        <div class="mb-3">
            <label>Email</label>
            <input type="email" name="email" class="form-control" required value="{{ old('email', $student->email) }}">
        </div>

        <div class="mb-3">
            <label>Role</label>
            <select name="role" class="form-select" required>
                <option value="student" {{ old('role', $student->role) == 'student' ? 'selected' : '' }}>Student</option>
                <option value="other_role" {{ old('role', $student->role) == 'other_role' ? 'selected' : '' }}>Other Role</option>
            </select>
        </div>

        <button type="submit" class="btn btn-primary">Update Student</button>
    </form>
</div>
@endsection
