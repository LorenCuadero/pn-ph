<?php

namespace App\Http\Controllers;

use App\Models\Disciplinary;
use Illuminate\Http\Request;
use App\Models\Student;

class DisciplinaryController extends Controller
{
    public function index()
    {
        $studentsWithDisciplinaryRecords = Student::has('disciplinary')->get();
        return view('pages.staff-auth.reports.rpt-disciplinary.rpt-disciplinary-page', compact('studentsWithDisciplinaryRecords'));
    }

    // public function showDisciplinaryRecordsForStudent($id) {
    //     $students = Student::find($id);
    //     return view('modals.staff.mdl-student-dcpl-rpt-add', compact('students'));
    // }


    public function create()
    {
        $students = Student::all();
        return view('disciplinary.create', compact('students'));
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'verbal_warning_description' => 'nullable|string',
            'verbal_warning_date' => 'nullable|date',
            'written_warning_description' => 'nullable|string',
            'written_warning_date' => 'nullable|date',
            'provisionary_description' => 'nullable|string',
            'provisionary_date' => 'nullable|date',
            'student_id' => 'required|exists:students,id',
        ]);

        $disciplinary = new Disciplinary($data);

// Associate the disciplinary record with the student
        $student = Student::find($data['student_id']);
        $student->disciplinary()->save($disciplinary);

        return redirect()->route('rpt.dcpl.index')->with('success', 'Disciplinary record created.');
    }


    public function show(Disciplinary $disciplinary)
    {
        return view('disciplinary.show', compact('disciplinary'));
    }

    public function edit(Disciplinary $disciplinary)
    {
        $students = Student::all();
        return view('disciplinary.edit', compact('disciplinary', 'students'));
    }

    public function update(Request $request, $id)
    {
        // Find the existing disciplinary record by its ID
        $existingRecord = Disciplinary::findOrFail($id);

        $data = $request->validate([
            'verbal_warning_description' => 'nullable|string',
            'verbal_warning_date' => 'nullable|date',
            'written_warning_description' => 'nullable|string',
            'written_warning_date' => 'nullable|date',
            'provisionary_description' => 'nullable|string',
            'provisionary_date' => 'nullable|date',
            'student_id' => 'required|exists:students,id',
        ]);

        // Apply the validated data to the existing record
        $existingRecord->fill($data);

        $existingRecord->save();

        return redirect()->route('rpt.dcpl.index')->with('success', 'Disciplinary record updated.');
    }

    public function destroy(Disciplinary $disciplinary)
    {
        $disciplinary->delete();
        return redirect()->route('disciplinary.index')->with('success', 'Disciplinary record deleted.');
    }
}
