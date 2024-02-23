<?php

namespace App\Http\Controllers;

use App\Models\Subject;
use Illuminate\Http\Request;

class SubjectsController extends Controller
{

    public function index()
    {
        $subject = Subject::get();
        return response()->json($subject);
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'code' => 'required|max:255',
            'title' => 'required|max:255', 
            'student_id' => "required|exists:students,id"
        ]);

        $student = Subject::create($validatedData);
        return response()->json($student, 201); // 201 Created status
    }


    public function update(Request $request, Subject $subject)
    {
        $validatedData = $request->validate([
            'code' => 'required|max:255',
            'title' => 'required|max:255',
            'student_id' => "required|exists:students,id"
        ]);

        $subject->update($validatedData);
        return response()->json($subject);
    }


    public function destroy(Subject $subject)
    {
        $subject->delete();

        return response()->json(null, 204); // 204 No Content status
    }
}
