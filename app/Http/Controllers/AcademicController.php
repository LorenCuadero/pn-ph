<?php

namespace App\Http\Controllers;

use App\Models\Academic;
use Illuminate\Http\Request;

class AcademicController extends Controller {
    /**
    * Display a listing of the resource.
    */

    public function index() {
        $academics = Academic::all();
        return view( 'academics.index', compact( 'academics' ) );
    }

    public function getStudentAcademicReport( $id ) {
        $student = Student::find( $id );
        $academics = Academic::all();

        if ( !$student ) {
            return back()->with( 'error', 'Student not found!' );
        }

        if ( $academics->isEmpty() ) {
            return back()->with( 'error', 'Student not found!' );
        }

        return view( 'pages.staff-auth.students.student-info-page', compact( 'student', 'academics' ) );
    }

    /**
    * Show the form for creating a new resource.
    */

    public function create() {
        $students = Student::all();
        return view( 'academics.create', compact( 'students' ) );
    }

    /**
    * Store a newly created resource in storage.
    */

    public function addStudentAcademicReport( Request $request, $id ) {
        $validatedData = $request->validate( [
            'course_code' => 'required|string',
            'first_sem_1st_year' => 'required|numeric|between:0,4',
            'second_sem_1st_year' => 'required|numeric|between:0,4',
            'first_sem_2nd_year' => 'required|numeric|between:0,4',
            'second_sem_2nd_year' => 'required|numeric|between:0,4',
            'gpa' => 'required|numeric|between:0,4',
            'student_id' => 'required|exists:students,id',
        ] );

        Academic::create( $validatedData );

        return redirect()->back()->with( 'success', 'Academic record added successfully!' );
    }

    public function createAcademic( $studentId ) {
        $student = Student::find( $studentId );

        return view( 'academics.create', compact( 'student' ) );
    }

    /**
    * Display the specified resource.
    */

    public function showAcademics( $studentId ) {
        $student = Student::find( $studentId );
        $academics = $student->academics;

        return view( 'academics.index', compact( 'academics' ) );
    }

    public function show( Academic $academic ) {
        return view( 'academics.show', compact( 'academic' ) );
    }

    /**
    * Show the form for editing the specified resource.
    */

    public function edit( Academic $academic ) {
        $students = Student::all();
        return view( 'academics.edit', compact( 'academic', 'students' ) );
    }
    /**
    * Update the specified resource in storage.
    */

    public function updateAcademic( Request $request, $id ) {
        $validatedData = $request->validate( [
            'course_code' => 'required|string',
            'first_semester_1st_year' => 'nullable|numeric',
            'second_semester_1st_year' => 'nullable|numeric',
            'first_semester_2nd_year' => 'nullable|numeric',
            'second_semester_2nd_year' => 'nullable|numeric',
            'gpa' => 'nullable|numeric',
            'student_id' => 'required|exists:students,id'
        ] );

        $academic = Academic::find( $id );
        $academic->update( $validatedData );

        return redirect()->back()->with( 'success', 'Academic record updated successfully!' );
    }

    /**
    * Remove the specified resource from storage.
    */

    public function destroyAcademic( $id ) {
        $academic = Academic::find( $id );
        $academic->delete();

        return redirect()->back()->with( 'success', 'Academic record deleted successfully!' );
    }
}
