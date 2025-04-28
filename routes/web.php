<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\StudentController;
use App\Http\Controllers\Auth\LoginController;

// Authentication Routes
Route::get('login', [LoginController::class, 'showLoginForm'])->name('login');
Route::post('login', [LoginController::class, 'login']);
Route::post('logout', [LoginController::class, 'logout'])->name('logout');

// Protected Routes
Route::middleware(['auth'])->group(function () {
    // Admin Routes
    Route::middleware(['role:admin'])->prefix('admin')->group(function () {
        Route::get('/dashboard', function () {
            return view('admin.dashboard');
        })->name('admin.dashboard');
    });

    // Teacher Routes
    Route::middleware(['role:teacher'])->prefix('teacher')->group(function () {
        Route::get('/dashboard', function () {
            return view('teachers.index');
        })->name('teacher.dashboard');
    });

    // // Student Routes
    // Route::middleware(['role:student'])->prefix('student')->group(function () {
    //     Route::get('/dashboard', function () {
    //         return view('student.dashboard');
    //     })->name('student.dashboard');
    // });

    // // Common Dashboard
    // Route::get('/dashboard', function () {
    //     return view('dashboard');
    // })->name('dashboard');
});

// Student Management Routes (Admin only)
Route::middleware(['auth', 'role:admin'])->group(function () {
    Route::get('/students', [StudentController::class, 'index'])->name('students.index');
    Route::get('/students/create', [StudentController::class, 'create'])->name('students.create');
    Route::post('/students', [StudentController::class, 'store'])->name('students.store');
    Route::get('/students/{id}/edit', [StudentController::class, 'edit'])->name('students.edit');
    Route::put('/students/{id}', [StudentController::class, 'update'])->name('students.update');
    Route::delete('/students/{id}', [StudentController::class, 'destroy'])->name('students.destroy');
});

//Teachers

Route::get('teachers/index', function () {
    return view('teachers.index');
})->name('teachers.index');

use Illuminate\Support\Facades\Auth;

Route::get('teachers/grades', function () {
    $teacher = Auth::user();
    return view('teachers.grades', compact('teacher'));
})->name('teachers.grades');


Route::get('teachers/subjects', function () {
    return view('teachers.subjects');
})->name('teachers.subjects');


Route::get('teachers/students', function () {
    return view('teachers.students');
})->name('teachers.students');

Route::get('teachers/events', function () {
    return view('teachers.events');
})->name('teachers.events');

Route::get('teachers/events/addEvents', function () {
    return view('teachers.events.addEvents');
})->name('teachers.events.addEvents');

Route::get('teachers/students/addStudents', function () {
    return view('teachers.students.addStudents');  // Make sure the view path is correct.
})->name('teachers.students.addStudents');



use App\Http\Controllers\SubjectController;  // Make sure this line exists at the top

Route::get('teachers/subjects/create', [SubjectController::class, 'create'])->name('teachers.subjects.create');
Route::post('teachers/subjects', [SubjectController::class, 'store'])->name('teachers.subjects.store');


// Show the form to add a new student
Route::get('/students/add', [StudentController::class, 'create'])->name('students.addStudents');

// Handle the form submission to store the student
Route::post('/students/store', [StudentController::class, 'store'])->name('students.store');

// Route::get('teachers/addSubjects', function () {
//     return view('teachers.addSubjects');
// })->name('teachers.events');

use App\Http\Controllers\EventsController;

Route::post('/events', [EventsController::class, 'store'])->name('events.store');
Route::get('/events/create', [EventsController::class, 'create'])->name('events.create');
Route::delete('/events/deleteAll', [EventsController::class, 'deleteAll'])->name('events.deleteAll');
Route::get('/events', [EventsController::class, 'index'])->name('events.index');
//teacher addSubjects

Route::resource('subjects', SubjectController::class);

//teachers addStudents
Route::get('/students/create', [StudentController::class, 'create'])->name('students.create');
Route::post('/students', [StudentController::class, 'store'])->name('students.store');
Route::get('/students/{id}/edit', [StudentController::class, 'edit'])->name('students.edit');
Route::delete('/students/{id}', [StudentController::class, 'destroy'])->name('students.destroy');
Route::get('/students/{id}/approve', [StudentController::class, 'approve'])->name('students.approve');
Route::get('/search', [StudentController::class, 'search'])->name('students.search');




use App\Http\Controllers\StudentGradeController;
Route::get('/teachers/student-grades/{id}', [StudentGradeController::class, 'show'])->name('teachers.student-grades.show');


//grades
Route::get('/grades/add', [AddGradesController::class, 'index'])->name('grades.add');

use App\Http\Controllers\FormController;
use App\Http\Controllers\SearchController;


// <<<<<<< HEAD
// Route::get('/search', [SearchController::class, 'index'])->name('search');


// Route::get('/students', [StudentController::class, 'index'])->name('students.index');
// Route::get('/students/{id}/edit', [StudentController::class, 'edit'])->name('students.edit');
// Route::put('/students/{id}', [StudentController::class, 'update'])->name('students.update');
// Route::delete('/students/{id}', [StudentController::class, 'destroy'])->name('students.destroy');


// //connect
// Route::get('/dashboard', function () {
//     return view('dashboard');
// });

// Route::get('/profile', function () {
//     return view('students'); // change if needed
// });

// Route::get('/settings', function () {
//     return view('settings');
// });

// Route::get('/grades', function () {
//     return view('grades');
// });

// Route::get('/events', function () {
//     return view('events');
// });
// =======
// >>>>>>> 5939e353d9ffb26af7aec6392e6da68f412e0b48

use App\Models\Student;
use App\Models\Grade;


use App\Http\Controllers\EventController;

Route::get('/students/event', [EventController::class, 'index']);


use App\Http\Controllers\GradebookController;

// Student Routes
Route::middleware(['auth', 'role:student'])->prefix('students')->group(function () {
    Route::get('/gradebook', [GradebookController::class, 'index'])->name('students.gradebook');
    Route::get('/event', [EventController::class, 'index'])->name('students.event');
    Route::get('/my-events', [EventController::class, 'myEvents'])->name('students.my-events');
    Route::get('/subjects', [GradebookController::class, 'subjects'])->name('students.subjects');
});


