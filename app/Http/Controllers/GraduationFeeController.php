<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Mail\SendGraduationFeeTransInfo;
use App\Models\GraduationFee;
use App\Models\Student;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class GraduationFeeController extends Controller
{
    public function graduationFees()
    {
        $students = Student::all();

        $batchYears = [];

        foreach ($students as $student) {
            if (!in_array($student->batch_year, $batchYears)) {
                $batchYears[] = $student->batch_year;
            }
        }

        $studentIdsWithGraduationFees = GraduationFee::distinct()->pluck('student_id');
        $student_gf_records = Student::whereIn('id', $studentIdsWithGraduationFees)->get();
        $studentsWithoutGraduationFees = Student::whereNotIn('id', $studentIdsWithGraduationFees)->get();

        $gradutionFeesRecords = GraduationFee::select('student_id', \DB::raw('SUM(amount_due) as total_due'), \DB::raw('SUM(amount_paid) as total_paid'))
            ->groupBy('student_id')
            ->get();

        $totalAmounts = [];
        foreach ($gradutionFeesRecords as $record) {
            $totalAmounts[$record->student_id] = [
                'amount_due' => $record->total_due,
                'amount_paid' => $record->total_paid,
            ];
        }

        return view('pages.admin-auth.records.graduation-fee', [
            'students' => $students,
            'batchYears' => $batchYears,
            'student_gf_records' => $student_gf_records,
            'totalAmounts' => $totalAmounts,
            'gradutionFeesRecords' => $gradutionFeesRecords,
            'studentsWithoutGraduationFees' => $studentsWithoutGraduationFees,
        ]);
    }

    public function studentGraduationFeeRecords($id)
    {
        $student = Student::find($id);

        if (!$student) {
            return back()->with('error', 'Student not found!');
        }

        $graduation_fee_records = GraduationFee::where('student_id', $student->id)->get();

        return view('pages.admin-auth.records.student-graduation-fee', compact('student', 'graduation_fee_records'));
    }

    public function storeGraduationFee(Request $request, $id)
    {
        $validatedData = $request->validate([
            'amount_due' => ['required', 'numeric'],
            'amount_paid' => ['required', 'numeric'],
            'date' => ['required', 'date'],
        ]);

        $student = Student::find($id);
        $student_email = $student->email;
        $student_name = $student->first_name . ' ' . $student->last_name;

        $graduation_fee = new GraduationFee();
        $graduation_fee->amount_due = $validatedData['amount_due'];
        $graduation_fee->amount_paid = $validatedData['amount_paid'];
        $graduation_fee->date = $validatedData['date'];
        $graduation_fee->student_id = $id;

        $graduation_fee->save();

        Mail::to($student_email)->send(new SendGraduationFeeTransInfo($student_name, $graduation_fee->amount_due, $graduation_fee->amount_paid, $graduation_fee->date));

        return back()->with('success', 'Graduation fee record added and email sent successfully!', compact('graduation_fee'));
    }

    public function updateGraduationFee(Request $request, $id)
    {
        $validatedData = $request->validate([
            'amount_due' => ['required', 'numeric'],
            'amount_paid' => ['required', 'numeric'],
            'date' => ['required', 'date'],
        ]);

        $graduationFee = GraduationFee::find($id);
        $studentId = $graduationFee->student_id;
        $studentEmail = $graduationFee->student->email;
        $studentName = $graduationFee->student->first_name . " " . $graduationFee->student->last_name;

        $graduationFee->amount_due = $validatedData['amount_due'];
        $graduationFee->amount_paid = $validatedData['amount_paid'];
        $graduationFee->date = $validatedData['date'];
        $graduationFee->student_id = $studentId;

        $graduationFee->save();

        // Send email notification to the student
        Mail::to($studentEmail)->send(new SendGraduationFeeTransInfo($studentName, $graduationFee->amount_due, $graduationFee->amount_paid, $graduationFee->date));

        // Return success message only if no duplicate was found
        return back()->with('success', 'Graduation fee record updated and email sent successfully!', compact('graduationFee'));
    }
}
