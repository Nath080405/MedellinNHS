<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

class StudentController extends Controller
{
    public function index()
    {
        // Assuming 'role' column in 'users' table defines if user is a student
        $students = User::where('role', 'student')->paginate(4);

        return view('students.index', compact('students'));
    }

    public function create()
    {
        return view('students.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|string|min:6|confirmed',
            'grade' => 'required|string',
            'section' => 'required|string',
            'phone' => 'nullable|string|max:20',
            'address' => 'nullable|string',
            'birthdate' => 'nullable|date',
            'gender' => 'nullable|string',
            'guardian_name' => 'nullable|string|max:255',
            'guardian_phone' => 'nullable|string|max:20',
            'guardian_email' => 'nullable|email',
        ]);

        $user = new \App\Models\User();
        $user->name = $validated['name'];
        $user->email = $validated['email'];
        $user->password = bcrypt($validated['password']);
        $user->role = 'student';
        $user->save();

        // Create student record
        $student = new \App\Models\Student();
        $student->user_id = $user->id;
        $student->grade = $validated['grade'];
        $student->section = $validated['section'];
        $student->student_id = 'STU-' . str_pad($user->id, 5, '0', STR_PAD_LEFT);
        $student->phone = $validated['phone'] ?? null;
        $student->address = $validated['address'] ?? null;
        $student->birthdate = $validated['birthdate'] ?? null;
        $student->gender = $validated['gender'] ?? null;
        $student->guardian_name = $validated['guardian_name'] ?? null;
        $student->guardian_phone = $validated['guardian_phone'] ?? null;
        $student->guardian_email = $validated['guardian_email'] ?? null;
        $student->save();

        return redirect()->route('students.index')->with('success', 'Student added successfully!');
    }

    public function destroy($id)
    {
        $student = User::findOrFail($id);
        $student->delete();

        return redirect()->route('students.index')->with('success', 'Student deleted successfully.');
    }

    public function edit($id)
    {
        $student = User::findOrFail($id);
        return view('students.edit', compact('student'));
    }

    public function update(Request $request, $id)
    {
        $student = User::findOrFail($id);

        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:users,email,' . $id,
            'role' => 'required|string',
        ]);

        $student->update($validated);

        return redirect()->route('students.index')->with('success', 'Student updated successfully!');
    }

    public function show($id)
    {
        $student = User::findOrFail($id);
        return view('students.show', compact('student'));
    }
}

