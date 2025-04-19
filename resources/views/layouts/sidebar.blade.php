<!-- resources/views/layouts/sidebar.blade.php -->

<div class="d-flex flex-column bg-white border-end vh-100" style="width: 250px;">
    <!-- Logo -->
    <div class="text-center p-3 border-bottom">
        <img src="{{ asset('MedellinLogo.png') }}" alt="Logo" class="img-fluid" style="height: 60px;">
    </div>

    <!-- Navigation -->
    <ul class="nav flex-column mt-2">
        <!-- Dashboard -->
        <li class="nav-item">
            <a class="nav-link d-flex align-items-center" href="#">
                <i class="bi bi-people-fill me-2"></i> Dashboard
            </a>
        </li>

        <!-- Users -->
        <li class="nav-item">
            <a class="nav-link d-flex justify-content-between align-items-center" data-bs-toggle="collapse"
                href="#usersSubmenu" role="button">
                <span><i class="bi bi-people-fill me-2"></i> Users</span>
                <i class="bi bi-chevron-down"></i>
            </a>
            <div class="collapse ps-4" id="usersSubmenu">
                <a href="{{ route('students.index') }}" class="nav-link">Students</a>
                <a href="#" class="nav-link">Teachers</a>
            </div>
        </li>

        <!-- Subjects -->
        <li class="nav-item">
            <a class="nav-link d-flex justify-content-between align-items-center" data-bs-toggle="collapse"
                href="#subjectsSubmenu" role="button">
                <span><i class="bi bi-people-fill me-2"></i> Subjects</span>
                <i class="bi bi-chevron-down"></i>
            </a>
            <div class="collapse ps-4" id="subjectsSubmenu">
                <a href="#" class="nav-link">Subject 1</a>
                <a href="#" class="nav-link">Subject 2</a>
            </div>
        </li>
    </ul>

    <!-- Bottom Icons -->
    <div class="mt-auto p-3 border-top d-flex justify-content-around">
        <i class="bi bi-bell"></i>
        <img src="{{ asset('images/user.png') }}" class="rounded-circle" style="height: 32px;" alt="User">
        <i class="bi bi-search"></i>
    </div>
</div>