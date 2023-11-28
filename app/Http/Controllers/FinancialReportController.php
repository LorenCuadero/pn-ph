<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Counterpart;
use App\Models\GraduationFee;
use App\Models\MedicalShare;
use App\Models\PersonalCashAdvance;
use Illuminate\Http\Request;
use Carbon\Carbon;
use Illuminate\Support\Facades\Log;


//
class FinancialReportController extends Controller
{
    public function index()
    {
        $counterpartTotal = Counterpart::sum('amount_paid');
        $medicalShareTotal = MedicalShare::sum('amount_paid');
        $graduationFeeTotal = GraduationFee::sum('amount_paid');
        $personalCashAdvanceTotal = PersonalCashAdvance::sum('amount_paid');

        $dates = [
            Counterpart::min('date'),
            MedicalShare::min('date'),
            GraduationFee::min('date'),
            PersonalCashAdvance::min('date'),
        ];

        // Remove null and invalid dates
        $validDates = array_filter($dates, function ($date) {
            return $date !== null && strtotime($date) !== false;
        });

        // Find the earliest date
        $earliestDate = $validDates ? min($validDates) : null;

        // Set the start date to the earliest date or null
        $startFromDate = $earliestDate ? Carbon::parse($earliestDate)->format('F d, Y') : null;

        // Set the end date to the current date
        $endToDate = Carbon::now()->format('F d, Y');

        $total = $counterpartTotal + $medicalShareTotal + $graduationFeeTotal + $personalCashAdvanceTotal;

        // Log the start date
        Log::info("Start From Date: $startFromDate");

        return view(
            'pages.admin-auth.financial-reports.index',
            compact(
                'counterpartTotal',
                'medicalShareTotal',
                'graduationFeeTotal',
                'personalCashAdvanceTotal',
                'total',
                'startFromDate',
                'endToDate'
            )
        );
    }

    public function viewFinancialReportByDateFromAndTo(Request $request)
    {
        $dateFrom = $request->input('dateFrom');
        $dateTo = $request->input('dateTo');

        $counterpartTotal = Counterpart::whereBetween('date', [$dateFrom, $dateTo])->sum('amount_paid');
        $medicalShareTotal = MedicalShare::whereBetween('date', [$dateFrom, $dateTo])->sum('amount_paid');
        $graduationFeeTotal = GraduationFee::whereBetween('date', [$dateFrom, $dateTo])->sum('amount_paid');
        $personalCashAdvanceTotal = PersonalCashAdvance::whereBetween('date', [$dateFrom, $dateTo])->sum('amount_paid');

        $total = $counterpartTotal + $medicalShareTotal + $graduationFeeTotal + $personalCashAdvanceTotal;

        $dateFrom = date('F d, Y', strtotime($dateFrom));
        $dateTo = date('F d, Y', strtotime($dateTo));

        return view(
            'pages.admin-auth.financial-reports.index',
            compact(
                'counterpartTotal',
                'medicalShareTotal',
                'graduationFeeTotal',
                'personalCashAdvanceTotal',
                'total',
                'dateFrom',
                'dateTo'
            )
        );
    }
}
