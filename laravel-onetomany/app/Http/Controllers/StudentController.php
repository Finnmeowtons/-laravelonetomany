<?php

namespace App\Http\Controllers;

use App\Models\Student;
use Illuminate\Http\Request;

class StudentController extends Controller
{

    public function index()
    {
        $students = Student::with('books')->get();
        return response()->json($students);
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'name' => 'required|max:255',
            'course' => 'required|max:255', 
        ]);

        $student = Student::create($validatedData);
        return response()->json($student, 201); // 201 Created status
    }

    public function storeSubject(Request $request)
{
    $student = Student::create($request->all());

    $subject = $student->subjects()->create([
        'code' => $request->input('subject.code'),
        'title' => $request->input('subject.title'),
        'student_id' => $request->input('id')
    ]);

    return response()->json([
        'student' => $student,
        'subject' => $subject
    ]);
}

    public function show(Student $student)
    {
        return response()->json($student->load('subjects'));
    }

    public function update(Request $request, Student $student)
    {
        $validatedData = $request->validate([
            'name' => 'required|max:255',
            'course' => 'required|max:255',
        ]);

        $student->update($validatedData);
        return response()->json($student);
    }

    public function destroy(Student $student)
    {
        $student->delete();

        return response()->json(null, 204); // 204 No Content status
    }
}
