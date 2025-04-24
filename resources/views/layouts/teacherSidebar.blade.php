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
            <a class="nav-link d-flex align-items-center" href="{{ route('teachers.index') }}">
                <i class="bi bi-people-fill me-2"></i> Dashboard
            </a>
        </li>

        <!-- Users -->
        <li class="nav-item">
            <a class="nav-link d-flex justify-content-between align-items-center" data-bs-toggle="collapse"
                href="#usersSubmenu" role="button">
                <span><i class="bi bi-people-fill me-2"></i>Student</span>
                <i class="bi bi-chevron-down"></i>
            </a>
            <div class="collapse ps-4" id="usersSubmenu">
            <a href="{{ route('teachers.grades') }}" class="nav-link">grades of student</a>
            <a href="{{ route('teachers.subjects') }}" class="nav-link">My subjects</a>
            </div>
        </li>

        <!-- Events -->
        <li class="nav-item">
    <a class="nav-link d-flex align-items-center" href="{{ route('teachers.events') }}">
        <i class="bi bi-people-fill me-2"></i> My Events
    </a>
        </li>

    </ul>

    <!-- Bottom Icons -->
    <div class="mt-auto p-3 border-top d-flex justify-content-around">
        <i class="bi bi-bell"></i>
        <div class="dropdown">
                <img src="{{ asset('images\mae.jpg') }}" alt="Profile" class="rounded-circle shadow-sm" width="40" height="40" style="object-fit: cover;" role="button" data-bs-toggle="dropdown">
                <ul class="dropdown-menu dropdown-menu-end">
                  <li><a class="dropdown-item" href="#">View Profile</a></li>
                  <li><a class="dropdown-item" href="#">Settings</a></li>
                  <li><hr class="dropdown-divider"></li>
                  <li>
                    <form method="POST" action="{{ route('logout') }}">
                      @csrf
                      <button class="dropdown-item" type="submit">Logout</button>
                    </form>
                  </li>
                </ul>
              </div>
        <i class="bi bi-search"></i>
    </div>
</div>