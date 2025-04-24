<!-- resources/views/dashboard.blade.php -->
@extends('layouts.teacherApp')

@section('content')
    
 <!-- Full Width Background Wrapper -->
<div style="background-color:rgb(242, 240, 241); min-height: 100vh;">
  <!-- Main Content (Still respects grid, but background stretches full width) -->
  <div class="col-md-9 col-lg-10 mx-auto p-4"> 
    <!-- Don’t change this line -->

    <!-- Dashboard Header -->
    <div class="d-flex align-items-center mb-5">
      <div>
        <p class="mb-1 text-black-50" style="font-size: 0.9rem;">Overview</p>
        <h3 class="mb-0 fw-bold text-black">Dashboard</h3>
      </div>
    </div>

    <!-- Welcome Message -->
    <div class="content p-4 rounded bg-light shadow-sm h-80 d-flex align-items-center">
      <img src="{{ asset('images\mae-removebg-preview.png') }}" alt="Teacher" class="img-fluid me-4" style="max-width: 180px;">
      <div>
      @if (Auth::check())
        <h2 class="text-primary">Welcome back, {{ Auth::user()->name }}.</h2>
      @else
        <h2 class="text-primary">Welcome, Guest.</h2>
      @endif
        <p class="text-muted">You can find important metrics, notifications, and actions here. Start exploring!</p>
      </div>
    </div>
  </div>
</div>

</div>

@endsection
