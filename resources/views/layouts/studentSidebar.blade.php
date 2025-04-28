<!-- resources/views/layouts/studentSidebar.blade.php -->

<div class="d-flex flex-column bg-white border-end vh-100 fixed-sidebar" style="width: 250px;">
    <!-- Logo -->
    <div class="text-center p-3 border-bottom">
        <img src="{{ asset('MedellinLogo.png') }}" alt="Logo" class="img-fluid" style="height: 60px;">
    </div>

    <!-- Navigation -->
    <ul class="nav flex-column mt-2">
        <!-- Gradebook -->
        <li class="nav-item">
            <a class="nav-link d-flex align-items-center {{ Request::is('students/gradebook') ? 'active bg-light fw-bold shadow-sm rounded' : 'text-dark' }}" 
               href="{{ route('students.gradebook') }}">
                <i class="bi bi-book me-2"></i> Gradebook
            </a>
        </li>

        <!-- Events -->
        <li class="nav-item">
            <a class="nav-link d-flex align-items-center {{ Request::is('students/event') ? 'active bg-light fw-bold shadow-sm rounded' : 'text-dark' }}" 
               href="{{ route('students.event') }}">
                <i class="bi bi-calendar me-2"></i> Events
            </a>
        </li>
    </ul>

    <!-- Bottom Icons -->
    <div class="mt-auto p-3 border-top d-flex justify-content-around align-items-center">
        <!-- Notification Icon with Badge (Non-clickable) -->
        <div class="position-relative">
            <i class="bi bi-bell fs-5" style="pointer-events: none;"></i>
            @if(isset($unreadEvents) && $unreadEvents > 0)
            <span class="position-absolute top-0 start-100 translate-middle badge rounded-pill bg-danger">
                {{ $unreadEvents }}
                <span class="visually-hidden">unread notifications</span>
            </span>
            @endif
        </div>

        <div class="dropdown">
            <img src="{{ asset('images/user.png') }}" class="rounded-circle" style="height: 32px; cursor: pointer;" 
                 alt="User" data-bs-toggle="dropdown" aria-expanded="false">
            <ul class="dropdown-menu dropdown-menu-end">
                <li>
                    <a class="dropdown-item" href="#">
                        <i class="bi bi-person me-2"></i>View Profile
                    </a>
                </li>
                <li><hr class="dropdown-divider"></li>
                <li>
                    <x-logout-button class="dropdown-item text-danger" />
                </li>
            </ul>
        </div>

        <!-- Logout Icon -->
        <a href="{{ route('login') }}" class="text-dark">
            <i class="bi bi-box-arrow-right fs-5"></i>
        </a>
    </div>
</div>

<style>
.fixed-sidebar {
    position: fixed;
    top: 0;
    left: 0;
    height: 100vh;
    z-index: 1030;
    overflow-y: auto;
    background-color: #ffffff;
    box-shadow: 2px 0 5px rgba(0, 0, 0, 0.1);
}

.nav-link {
    color: #000;
    padding: 0.75rem 1rem;
    transition: all 0.3s ease;
}

.nav-link:hover {
    background-color: #f8f9fa;
    color: #000;
}

.nav-link.active {
    background-color: #f1f1f1;
    font-weight: bold;
    color: #000;
    box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
}

.dropdown-menu {
    min-width: 200px;
    box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
}

.dropdown-item {
    padding: 0.5rem 1rem;
    transition: all 0.3s ease;
}

.dropdown-item:hover {
    background-color: #f8f9fa;
}

.dropdown-item i {
    font-size: 1.1rem;
}

/* Add padding to main content to account for fixed sidebar */
.main-content {
    margin-left: 250px;
    padding: 20px;
    width: calc(100% - 250px);
}

/* Ensure consistent icon colors */
.bi {
    color: #000 !important;
}

/* Ensure consistent border colors */
.border-end {
    border-color: #dee2e6 !important;
}

.border-top {
    border-color: #dee2e6 !important;
}

/* Notification Badge Styles */
.badge {
    font-size: 0.75rem;
    padding: 0.25em 0.6em;
    border: 2px solid #fff;
    box-shadow: 0 0 0 1px #dc3545;
}

.position-relative {
    cursor: default;
}
</style>