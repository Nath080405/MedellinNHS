@extends('layouts.teacherApp')

@section('content')
<div class="py-4" style="background-color: #f2f0f1; min-height: 100vh;">
    <div class="container">
        <div class="col-md-10 mx-auto p-4">

            <!-- Header Section -->
            <div class="d-flex justify-content-between align-items-center mb-5">
                <div>
                    <p class="mb-1 text-muted small">Overview</p>
                    <h3 class="fw-bold text-dark m-0">My Class</h3>
                </div>

                <!-- Search Form -->
                <form action="/search" method="GET" class="d-flex align-items-center gap-2" style="height: 38px;">
                    <input 
                        type="text" 
                        name="search" 
                        class="form-control" 
                        placeholder="Search..." 
                        style="height: 100%; width: 220px;"
                    >
                    <button type="submit" class="btn btn-outline-dark">Search</button>
                </form>
            </div>

            <!-- Big White Clean Div Containing All Content From Student List to Table -->
            <div class="bg-white p-4 rounded shadow-sm">

                <!-- New Section: Title + Add Student Button -->
                <div class="d-flex justify-content-between align-items-center mb-3">
                    <h5 class="fw-normal text-secondary m-0">Student List</h5>
                    <a href="{{ route('teachers.students.addStudents') }}" class="btn btn-primary rounded-pill ">
                        <i class="bi bi-plus-lg"></i> Add Student
                    </a>
                </div>

                <!-- Table Section -->
                <div class="table-responsive">
                    <table class="table table-bordered table-hover">
                        <thead class="table-secondary">
                            <tr>
                                <th>Firstname</th>
                                <th>Lastname</th>
                                <th>Email</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>John</td>
                                <td>Doe</td>
                                <td>john@example.com</td>
                            </tr>
                            <tr>
                                <td>Mary</td>
                                <td>Moe</td>
                                <td>mary@example.com</td>
                            </tr>
                            <tr>
                                <td>July</td>
                                <td>Dooley</td>
                                <td>july@example.com</td>
                            </tr>
                        </tbody>
                    </table>
                </div>

            </div> <!-- End of big white clean div -->

        </div>
    </div>
</div>
@endsection
