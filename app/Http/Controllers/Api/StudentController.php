<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Student;
use Illuminate\Http\Request;

class StudentController extends Controller
{
    public function index()
    {
        $students = Student::all();
        return response()->json(compact('students'));
    }

    public function getStudent($id)
    {
        $student = Student::find($id);
        return response()->json(compact('student'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'batch_year' => 'required',
            'joined' => 'required',
            'status' => 'required',
            'gpa' => 'nullable|numeric',
        ]);

        $student = new Student([
            'name' => $request->get('name'),
            'batch_year' => $request->get('batch_year'),
            'joined' => $request->get('joined'),
            'status' => $request->get('status'),
            'gpa' => $request->get('gpa'),
        ]);

        $student->save();

        return response()->json(['message' => 'Student added!']);
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'required',
            'batch_year' => 'required',
            'joined' => 'required',
            'status' => 'required',
            'gpa' => 'nullable|numeric',
        ]);

        $student = Student::find($id);
        $student->name = $request->get('name');
        $student->batch_year = $request->get('batch_year');
        $student->joined = $request->get('joined');
        $student->status = $request->get('status');
        $student->gpa = $request->get('gpa');
        $student->save();

        return response()->json(['message' => 'Student updated!']);
    }

    public function destroy($id)
    {
        $student = Student::find($id);
        $student->delete();

        return response()->json(['message' => 'Student deleted!']);
    }
}
