<?php

namespace App\Http\Controllers;

use App\Models\Student;
use App\Models\Counterpart;
use App\Models\MedicalShare;
use App\Models\PersonalCashAdvance;
use App\Models\GraduationFee;

class ClosingOfAccountController extends Controller
{
    public function index()
    {
        $students = Student::all();
        $batchYears = [];
        $studentData = [];

        foreach ($students as $student) {
            if (!in_array($student->batch_year, $batchYears)) {
                $batchYears[] = $student->batch_year;
            }

            $studentHasCounterpart = Counterpart::where('student_id', $student->id)->exists();
            $studentHasMedicalShare = MedicalShare::where('student_id', $student->id)->exists();
            $studentHasPersonalCashAdvance = PersonalCashAdvance::where('student_id', $student->id)->exists();
            $studentHasGraduationFee = GraduationFee::where('student_id', $student->id)->exists();

            // Check if the student has records in any of the categories
            if ($studentHasCounterpart || $studentHasMedicalShare || $studentHasPersonalCashAdvance || $studentHasGraduationFee) {
                // Calculate the total balance
                $studentTotalCounterpartAmountDueAndPaid = $this->getTotalAmountDueAndPaid($student, Counterpart::class);
                $studentTotalMedicalShareAmountDueAndPaid = $this->getTotalAmountDueAndPaid($student, MedicalShare::class);
                $studentTotalPersonalCashAdvanceAmountDueAndPaid = $this->getTotalAmountDueAndPaid($student, PersonalCashAdvance::class);
                $studentTotalGraduationFeeAmountDueAndPaid = $this->getTotalAmountDueAndPaid($student, GraduationFee::class);

                $totalBalances = $studentTotalCounterpartAmountDueAndPaid + $studentTotalMedicalShareAmountDueAndPaid + $studentTotalPersonalCashAdvanceAmountDueAndPaid + $studentTotalGraduationFeeAmountDueAndPaid;

                // Determine the status based on the total balance
                $status = ($totalBalances == 0) ? 'Closed' : 'Open';

                if ($totalBalances < 0 ) {
                    $status = 'Return';
                }

                $studentData[] = [
                    'name' => $student->first_name . ' ' . $student->middle_name . ' ' . $student->last_name,
                    'batch_year' => $student->batch_year,
                    'counterpart_due_and_paid' => $studentTotalCounterpartAmountDueAndPaid,
                    'medical_share_due_and_paid' => $studentTotalMedicalShareAmountDueAndPaid,
                    'personal_cash_advance_due_and_paid' => $studentTotalPersonalCashAdvanceAmountDueAndPaid,
                    'graduation_fee_due_and_paid' => $studentTotalGraduationFeeAmountDueAndPaid,
                    'total_balances' => $totalBalances,
                    'status' => $status,
                ];
            }
        }

        return view(
            'pages.admin-auth.coa.index',
            compact(
                'students',
                'batchYears',
                'studentData',
            )
        );
    }

    private function getTotalAmountDueAndPaid($student, $modelClass)
    {
        if ($modelClass == MedicalShare::class) {
            $amountDue = $modelClass::where('student_id', $student->id)->sum(\DB::raw('total_cost * 0.15'));
        } else {
            $amountDue = $modelClass::where('student_id', $student->id)->sum('amount_due');
        }

        $amountPaid = $modelClass::where('student_id', $student->id)->sum('amount_paid');

        return $amountDue - $amountPaid;
    }
}
