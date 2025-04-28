<!doctype html>
<html lang="en">
<head>
    <!-- head content (same as your pages) -->
    <title>@yield('title')</title>

    <!-- Bootstrap and other CSS links -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.5/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600&display=swap" rel="stylesheet">

    <style>
        /* Put your common styles here (fixed sidebar, etc) */
    </style>
</head>
<body>

<div class="container-fluid">
    <div class="row">
        <!-- Sidebar -->
        <div class="col-md-3 col-lg-2 p-3 bg-white border-end vh-100 d-flex flex-column shadow-sm fixed-sidebar">
            <div class="d-flex justify-content-center align-items-center mb-4" style="height: 80px;">
                <img src="{{ asset('images/logo (2).png') }}" alt="Logo" class="img-fluid" style="max-width: 60px;">
            </div>

            <div class="d-flex flex-column mb-4">
    <ul class="nav flex-column">
        <li class="nav-item">
            <a class="nav-link {{ Request::is('students/gradebook') ? 'active bg-light fw-bold shadow-sm rounded' : 'text-dark' }}" href="{{ url('/students/gradebook') }}">
                <i class="bi bi-book me-2"></i>Grades
            </a>
        </li>
        <li class="nav-item">
            <a class="nav-link {{ Request::is('students/event') ? 'active bg-light fw-bold shadow-sm rounded' : 'text-dark' }}" href="{{ url('/students/event') }}">
                <i class="bi bi-calendar me-2"></i>Events
            </a>
        </li>
    </ul>
</div>


            <div class="mt-auto border-top pt-3 px-2">
                <div class="d-flex justify-content-between align-items-center">
                    <i class="bi bi-bell fs-5"></i>
                    <img src="{{ asset('images/logo (2).png') }}" alt="Profile" class="rounded-circle" width="40" height="40" style="object-fit: cover;">
                    <i class="bi bi-search fs-5"></i>
                </div>
            </div>
        </div>

        <!-- Main Content -->
        <div class="col-md-9 col-lg-10 p-4 main-content" style="background-color: #7FD8BE;">
            @yield('content')
        </div>
    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.5/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
