@extends('layouts.teacherApp')

@section('content')
<div style="background-color:rgb(242, 240, 241); min-height: 100vh;">
  <div class="col-md-9 col-lg-10 mx-auto p-4">
    
    <!-- Header Section -->
    <div class="d-flex justify-content-between align-items-center mb-5">
      <div class="me-auto">
        <p class="mb-1 text-muted" style="font-size: 0.9rem;">Overview</p>
        <h3 class="mb-0 fw-bold text-dark">Student grades</h3>
      </div>

      <!-- Search Bar -->
      <form action="/search" method="GET" class="d-flex align-items-center gap-2" style="height: 38px;">
        <input type="text" class="form-control" name="search" placeholder="Search..." style="height: 100%; width: 220px;">
        <button type="submit" class="btn btn-outline-dark">Search</button>
      </form>
    </div>

    <!-- Main Content Container -->
    <div class="container-fluid bg-white rounded shadow-sm py-4 px-3">
      
      <!-- Top Action Buttons -->
      <div class="d-flex justify-content-end mb-4">
        <a href="#" class="btn btn-outline-secondary me-2">Print</a>
        <a href="#" class="btn btn-outline-secondary">Export</a>
      </div>

      <!-- Filter Controls -->
      <div class="d-flex flex-wrap gap-3 mb-4">
        
        <!-- Grade Level Dropdown -->
  <div class="btn-group flex-fill">
  <button class="btn btn-secondary w-100" type="button">
    Grade Level
  </button>
  <button type="button" class="btn btn-secondary dropdown-toggle dropdown-toggle-split" data-bs-toggle="dropdown" aria-expanded="false">
    <span class="visually-hidden">Toggle Dropdown</span>
  </button>
  <ul class="dropdown-menu">
    @foreach($gradeLevels as $grade)
      <li><a class="dropdown-item" href="#">{{ $grade }}</a></li>
    @endforeach
  </ul>
</div>



        <!-- Section Dropdown -->
        <div class="btn-group flex-fill">
  <button class="btn btn-secondary w-100" type="button">
    Section
  </button>
  <button type="button" class="btn btn-secondary dropdown-toggle dropdown-toggle-split" data-bs-toggle="dropdown" aria-expanded="false">
    <span class="visually-hidden">Toggle Dropdown</span>
  </button>
  <ul class="dropdown-menu">
    <li><a class="dropdown-item" href="#">Section A</a></li>
    <li><a class="dropdown-item" href="#">Section B</a></li>
    <li><a class="dropdown-item" href="#">Section C</a></li>
    <li><a class="dropdown-item" href="#">Section D</a></li>
  </ul>
</div>

        <!-- Subject Dropdown -->
        <div class="btn-group flex-fill">
  <button class="btn btn-secondary w-100" type="button">
    Subjects
  </button>
  <button type="button" class="btn btn-secondary dropdown-toggle dropdown-toggle-split" data-bs-toggle="dropdown" aria-expanded="false">
    <span class="visually-hidden">Toggle Dropdown</span>
  </button>
  <ul class="dropdown-menu">
    <li><a class="dropdown-item" href="#">Filipino</a></li>
    <li><a class="dropdown-item" href="#">English</a></li>
    <li><a class="dropdown-item" href="#">Math</a></li>
    <li><a class="dropdown-item" href="#">Science</a></li>
  </ul>
</div>

        <!-- Quarter Dropdown -->
        <div class="btn-group flex-fill">
  <button class="btn btn-secondary w-100" type="button">
    Quarter
  </button>
  <button type="button" class="btn btn-secondary dropdown-toggle dropdown-toggle-split" data-bs-toggle="dropdown" aria-expanded="false">
    <span class="visually-hidden">Toggle Dropdown</span>
  </button>
  <ul class="dropdown-menu">
    <li><a class="dropdown-item" href="#">1st Quarter</a></li>
    <li><a class="dropdown-item" href="#">2nd Quarter</a></li>
    <li><a class="dropdown-item" href="#">3rd Quarter</a></li>
    <li><a class="dropdown-item" href="#">4th Quarter</a></li>
  </ul>
</div>

      <!-- Bottom Action Buttons -->
      <div class="d-flex justify-content-end">
        <a href="#" class="btn btn-light me-2">Save Drafts</a>
        <a href="#" class="btn btn-dark">Post Grades</a>
      </div>

    </div>
  </div>
</div>
@endsection
