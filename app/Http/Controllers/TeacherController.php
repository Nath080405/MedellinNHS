<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Student; // <-- add this!

class TeacherController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $students = Student::all(); // ✅ Get all students
        return view('teachers.index', compact('students')); // ✅ Pass to view
    }
    

    public function showGradeDropdown()
    {
        $gradeLevels = ['Grade 7', 'Grade 8', 'Grade 9', 'Grade 10', 'Grade 11', 'Grade 12'];
        return view('your-view-name', compact('gradeLevels'));
    }
}
