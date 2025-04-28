@extends('layouts.teacherApp')

@section('content')
<!-- Centered Container for the Card -->
<div class="d-flex justify-content-center align-items-center" style="min-height: 100vh; background-color: #f2f0f1;">

      <!-- Card: Add New Event -->
      <div class="card shadow-lg rounded border-0" style="width: 100%; max-width: 400px; max-height: 500px;">
        <div class="card-header bg-primary text-white">
            <h4 class="mb-0">Create New Event</h4>
        </div>

        <div class="card-body p-4" style="height: auto; overflow: auto;">

            <!-- Back Button -->
            <div class="mb-4">
                <a href="{{ route('teachers.events') }}" class="btn btn-outline-secondary btn-sm">
                    <i class="bi bi-arrow-left"></i> Back
                </a>
            </div>

            <!-- Form -->
            <form method="POST" action="{{ route('teachers.events.addEvents') }}">
                @csrf

                <div class="row mb-3">
                    <div class="col-12">
                        <label for="event_title" class="form-label">Event Title</label>
                        <input 
                            type="text" 
                            id="event_title" 
                            name="event_title" 
                            class="form-control" 
                            required
                        >
                    </div>
                </div>

                <div class="row mb-3">
                    <div class="col-12">
                        <label for="event_description" class="form-label">Event Description</label>
                        <textarea 
                            id="event_description" 
                            name="event_description" 
                            class="form-control" 
                            rows="4" 
                            required
                        ></textarea>
                    </div>
                </div>

                <div class="row mb-3">
                    <div class="col-12">
                        <label for="event_date" class="form-label">Event Date</label>
                        <input 
                            type="date" 
                            id="event_date" 
                            name="event_date" 
                            class="form-control" 
                            required
                        >
                    </div>
                </div>

                <div class="row mb-3">
                    <div class="col-12">
                        <label for="event_time" class="form-label">Event Time</label>
                        <input 
                            type="time" 
                            id="event_time" 
                            name="event_time" 
                            class="form-control" 
                            required
                        >
                    </div>
                </div>

                <div class="row mb-4">
                    <div class="col-12">
                        <label for="event_location" class="form-label">Event Location</label>
                        <input 
                            type="text" 
                            id="event_location" 
                            name="event_location" 
                            class="form-control" 
                            required
                        >
                    </div>
                </div>

                <!-- Button Section -->
                <div class="d-flex gap-3 mt-4">
                    <!-- Cancel Button -->
                    <button type="reset" class="btn btn-danger ">
                        Cancel
                    </button>

                    <!-- Submit Button -->
                    <button type="submit" class="btn btn-primary ">
                        Create Event
                    </button>
                </div>
            </form>

        </div>

</div>
@endsection