<?php

namespace App\Http\Controllers;

use App\Models\Subject;
use App\Models\GradeLevel;
use Illuminate\Http\Request;

class SubjectController extends Controller
{
    /**
     * Display a listing of the subjects.
     */
    public function index()
    {
        $subjects = Subject::with('gradeLevel')->get(); // Eager load grade level to avoid N+1 problem
        return view('teachers.index', compact('subjects'));
    }

    /**
     * Show the form for creating a new subject.
     */
    public function create()
    {
        $gradeLevels = GradeLevel::all(); // Fetch all grade levels from the database
        return view('teachers.subjects.create', compact('gradeLevels')); // Pass grade levels to view
    }

    /**
     * Store a newly created subject in the database.
     */
    public function store(Request $request)
    {
        // Validate the request data
        $request->validate([
            'name' => 'required|string|max:255',
            'code' => 'required|string|max:10|unique:subjects',
            'description' => 'nullable|string|max:500',
            'grade_level_id' => 'required|exists:grade_levels,id', // Ensure grade level exists
        ]);

        // Create the new subject
        Subject::create([
            'name' => $request->name,
            'code' => $request->code,
            'description' => $request->description,
            'grade_level_id' => $request->grade_level_id,
        ]);

        // Redirect back to the subjects page with a success message
        return redirect()->route('teachers.subjects')->with('success', 'Subject added successfully!');
    }
}
