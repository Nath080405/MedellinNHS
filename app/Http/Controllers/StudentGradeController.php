<?php

namespace App\Http\Controllers;


use App\Models\Student;
use App\Models\Grade;

class StudentGradeController extends Controller
{
    public function show($id)
    {
        $student = Student::with('section')->findOrFail($id);
        $grades = Grade::with('subject')->where('student_id', $id)->get();

        return view('grades', compact('student', 'grades'));
    }
}
