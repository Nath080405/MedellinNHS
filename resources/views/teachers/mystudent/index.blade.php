@extends('teachers.dashboard')

@section('content')
<div class="container-fluid p-4">
    <!-- Header -->
    <div class="d-flex justify-content-between align-items-center mb-4">
        <div>
            <h2 class="mb-0">Student Management</h2>
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{ url('/dashboard') }}">Dashboard</a></li>
                    <li class="breadcrumb-item active">Students</li>
                </ol>
            </nav>
        </div>
        <button class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#addStudentModal">
            <i class="bi bi-plus-lg me-2"></i>Add New Student
        </button>
    </div>

    <!-- Filters -->
    <div class="card mb-4">
        <div class="card-body">
            <div class="row g-3">
                <div class="col-md-4">
                    <input type="text" class="form-control" placeholder="Search students...">
                </div>
                <div class="col-md-3">
                    <select class="form-select">
                        <option value="">All Grade Levels</option>
                        <option>Grade 7</option>
                        <option>Grade 8</option>
                        <option>Grade 9</option>
                        <option>Grade 10</option>
                    </select>
                </div>
                <div class="col-md-3">
                    <select class="form-select">
                        <option value="">All Sections</option>
                        <option>Section A</option>
                        <option>Section B</option>
                        <option>Section C</option>
                    </select>
                </div>
            </div>
        </div>
    </div>

    <!-- Students Grid -->
    <div class="row g-4">
        @forelse($students as $student)
        <div class="col-md-6 col-lg-4">
            <div class="card h-100 shadow-sm">
                <div class="card-body">
                    <div class="d-flex align-items-center mb-3">
                        <img src="https://via.placeholder.com/50" class="rounded-circle me-3" alt="Student Photo">
                        <div>
                            <h5 class="card-title mb-0">{{ $student['name'] }}</h5>
                            <small class="text-muted">ID: {{ $student['student_id'] }}</small>
                        </div>
                    </div>
                    <div class="student-info">
                        <p class="mb-1"><i class="bi bi-book me-2"></i>Grade {{ $student['grade'] }}</p>
                        <p class="mb-1"><i class="bi bi-people me-2"></i>Section {{ $student['section'] }}</p>
                        <p class="mb-1"><i class="bi bi-envelope me-2"></i>{{ $student['email'] }}</p>
                    </div>
                    <div class="mt-3 d-flex justify-content-end">
                        <a href="{{ route('teachers.students.grades', $student['id']) }}" class="btn btn-outline-primary btn-sm me-2">
                            View Grades
                        </a>
                        <button class="btn btn-outline-secondary btn-sm">
                            Edit
                        </button>
                    </div>
                </div>
            </div>
        </div>
        @empty
        <div class="col-12">
            <div class="alert alert-info text-center">
                <i class="bi bi-info-circle me-2"></i>
                No students found. Add your first student to get started!
            </div>
        </div>
        @endforelse
    </div>
</div>

<!-- Add Student Modal -->
<div class="modal fade" id="addStudentModal" tabindex="-1">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Add New Student</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
            </div>
            <div class="modal-body">
                <form>
                    <div class="mb-3">
                        <label class="form-label">Full Name</label>
                        <input type="text" class="form-control" required>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Student ID</label>
                        <input type="text" class="form-control" required>
                    </div>
                    <div class="row mb-3">
                        <div class="col">
                            <label class="form-label">Grade Level</label>
                            <select class="form-select" required>
                                <option value="">Select Grade</option>
                                <option>Grade 7</option>
                                <option>Grade 8</option>
                                <option>Grade 9</option>
                                <option>Grade 10</option>
                            </select>
                        </div>
                        <div class="col">
                            <label class="form-label">Section</label>
                            <select class="form-select" required>
                                <option value="">Select Section</option>
                                <option>Section A</option>
                                <option>Section B</option>
                                <option>Section C</option>
                            </select>
                        </div>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Email</label>
                        <input type="email" class="form-control" required>
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                <button type="button" class="btn btn-primary">Add Student</button>
            </div>
        </div>
    </div>
</div>

<style>
    .card {
        transition: transform 0.2s;
        border: none;
        border-radius: 10px;
    }
    .card:hover {
        transform: translateY(-5px);
    }
    .student-info i {
        color: #6c757d;
    }
</style>
@endsection