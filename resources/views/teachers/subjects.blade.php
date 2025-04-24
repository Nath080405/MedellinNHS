@extends('layouts.teacherApp')

@section('content')
<div style="background-color:rgb(242, 240, 241); min-height: 100vh;">
  <div class="col-md-9 col-lg-10 mx-auto p-4">
    
    <!-- Header Section -->
    <div class="d-flex justify-content-between align-items-center mb-5">
      <div class="me-auto">
        <p class="mb-1 text-muted" style="font-size: 0.9rem;">Overview</p>
        <h3 class="mb-0 fw-bold text-dark">My subjects</h3>
      </div>

      <!-- Search Bar -->
      <form action="/search" method="GET" class="d-flex align-items-center gap-2" style="height: 38px;">
        <input type="text" class="form-control" name="search" placeholder="Search..." style="height: 100%; width: 220px;">
        <button type="submit" class="btn btn-outline-dark">Search</button>
      </form>
    </div>
  </div>
</div>
@endsection