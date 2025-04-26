<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

class StudentController extends Controller
{
    public function index()
    {
        // Assuming 'role' column in 'users' table defines if user is a student
        $students = User::where('role', 'student')->with('student')->paginate(4);

        return view('admin.students.index', compact('students'));
    }

    public function create()
    {
        return view('admin.students.create');
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

        // Create user record
        $user = new \App\Models\User();
        $user->name = $validated['name'];
        $user->email = $validated['email'];
        $user->password = bcrypt($validated['password']);
        $user->role = 'student';
        $user->save();

        // Generate student ID and set as username
        $studentId = 'STU' . str_pad($user->id, 5, '0', STR_PAD_LEFT);
        $user->update(['username' => $studentId]);

        // Create student record
        $student = new \App\Models\Student();
        $student->user_id = $user->id;
        $student->grade = $validated['grade'];
        $student->section = $validated['section'];
        $student->student_id = $studentId;
        $student->phone = $validated['phone'] ?? null;
        $student->address = $validated['address'] ?? null;
        $student->birthdate = $validated['birthdate'] ?? null;
        $student->gender = $validated['gender'] ?? null;
        $student->guardian_name = $validated['guardian_name'] ?? null;
        $student->guardian_phone = $validated['guardian_phone'] ?? null;
        $student->guardian_email = $validated['guardian_email'] ?? null;
        $student->status = 'active';
        $student->save();

        return redirect()->route('students.index')->with('success', 'Student added successfully! Student ID: ' . $studentId);
    }

    public function destroy($id)
    {
        try {
            $user = User::findOrFail($id);

            // Delete the associated student record first
            if ($user->student) {
                $user->student->delete();
            }

            // Then delete the user record
            $user->delete();

            return redirect()->route('students.index')
                ->with('success', 'Student deleted successfully');
        } catch (\Exception $e) {
            return redirect()->route('students.index')
                ->with('error', 'Failed to delete student. Please try again.');
        }
    }

    public function edit($id)
    {
        $student = User::with('student')->findOrFail($id);
        return view('admin.students.edit', compact('student'));
    }

    public function update(Request $request, $id)
    {
        $user = User::with('student')->findOrFail($id);

        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:users,email,' . $id,
            'role' => 'required|string',
            'grade' => 'nullable|string',
            'section' => 'nullable|string',
            'phone' => 'nullable|string|max:20',
            'address' => 'nullable|string',
            'birthdate' => 'nullable|date',
            'gender' => 'nullable|string',
            'guardian_name' => 'nullable|string|max:255',
            'guardian_phone' => 'nullable|string|max:20',
            'guardian_email' => 'nullable|email',
            'status' => 'nullable|string',
        ]);

        // Update user record
        $user->name = $validated['name'];
        $user->email = $validated['email'];
        $user->role = $validated['role'];
        $user->save();

        // Update student record if it exists
        if ($user->student) {
            $student = $user->student;
            $student->grade = $validated['grade'] ?? $student->grade;
            $student->section = $validated['section'] ?? $student->section;
            $student->phone = $validated['phone'] ?? $student->phone;
            $student->address = $validated['address'] ?? $student->address;
            $student->birthdate = $validated['birthdate'] ?? $student->birthdate;
            $student->gender = $validated['gender'] ?? $student->gender;
            $student->guardian_name = $validated['guardian_name'] ?? $student->guardian_name;
            $student->guardian_phone = $validated['guardian_phone'] ?? $student->guardian_phone;
            $student->guardian_email = $validated['guardian_email'] ?? $student->guardian_email;
            $student->status = $validated['status'] ?? $student->status;
            $student->save();
        } else {
            // Create student record if it doesn't exist
            $student = new \App\Models\Student();
            $student->user_id = $user->id;
            $student->grade = $validated['grade'] ?? null;
            $student->section = $validated['section'] ?? null;
            $student->student_id = 'STU' . str_pad($user->id, 5, '0', STR_PAD_LEFT);
            $student->phone = $validated['phone'] ?? null;
            $student->address = $validated['address'] ?? null;
            $student->birthdate = $validated['birthdate'] ?? null;
            $student->gender = $validated['gender'] ?? null;
            $student->guardian_name = $validated['guardian_name'] ?? null;
            $student->guardian_phone = $validated['guardian_phone'] ?? null;
            $student->guardian_email = $validated['guardian_email'] ?? null;
            $student->status = $validated['status'] ?? 'active';
            $student->save();
        }

        return redirect()->route('students.index')->with('success', 'Student updated successfully!');
    }

    public function show($id)
    {
        $student = User::with('student')->findOrFail($id);
        return view('admin.students.show', compact('student'));
    }
}

