@extends('layouts.admin.app')
@section('content')
    <section class="content">
        <div class="container-fluid">
            <div class="dashboard">
                <h2 class="text-left text-dash" style="color: #1f3c88;">Dashboard</h2>
                <p class="text-left text-dash" style="color: #1f3c88;">As of <span id="currentMonthYear"></span></p>
                <div class="row">
                    <div class="col-lg-9">
                        <div class="row text-dash">
                            <div class="col-12 col-sm-10 col-md-4">
                                <div class="info-box">
                                    <span class="info-box-icon elevation-1"><img
                                            src="https://cdn-icons-png.flaticon.com/512/2694/2694245.png" alt=""
                                            style="width: 50px"></span>
                                    <div class="info-box-content">
                                        <span class="info-box-text">Counterpart</span>
                                        <span class="info-box-number">
                                            {{ $counterpartTotal }}
                                        </span>
                                    </div>
                                </div>
                            </div>
                            <div class="col-12 col-sm-10 col-md-4">
                                <div class="info-box mb-3">
                                    <span class="info-box-icon elevation-1"><img
                                            src="https://cdn4.iconfinder.com/data/icons/usa-dollar-1/512/xxx039-512.png"
                                            alt="" style="width: 50px"></span>
                                    <div class="info-box-content">
                                        <span class="info-box-text">Medical Share</span>
                                        <span class="info-box-number">{{ $medicalShareTotal }}</span>
                                    </div>
                                </div>
                            </div>
                            <div class="clearfix hidden-md-up"></div>
                            <div class="col-12 col-sm-10 col-md-4">
                                <div class="info-box mb-3">
                                    <span class="info-box-icon elevation-1"><img
                                            src="https://cdn-icons-png.flaticon.com/512/1571/1571079.png" alt=""
                                            style="width:50px"></span>
                                    <div class="info-box-content">
                                        <span class="info-box-text">Total Received</span>
                                        <span class="info-box-number">{{ $receivedTotal }}</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row text-dash">
                            <div class="col-12 col-sm-10 col-md-4">
                                <div class="info-box">
                                    <span class="info-box-icon elevation-1"><img
                                            src="https://assets-global.website-files.com/63a08ec60612e3d0564bb798/64d52b0065178c3d78519aa1_healthcare-underpayments.png"
                                            alt="" style="width: 50px"></span>
                                    <div class="info-box-content">
                                        <span class="info-box-text">Personal Cash Advance</span>
                                        <span class="info-box-number">
                                            {{ $personalCashAdvanceTotal }}
                                        </span>
                                    </div>
                                </div>
                            </div>
                            <div class="col-12 col-sm-10 col-md-4">
                                <div class="info-box mb-3">
                                    <span class="info-box-icon elevation-1"><img
                                            src="https://static.vecteezy.com/system/resources/previews/004/666/584/non_2x/student-loan-color-icon-credit-to-pay-for-university-education-tuition-fee-college-scolarship-graduation-hat-coin-stack-budget-investment-academic-achievement-isolated-illustration-vector.jpg"
                                            alt="" style="width: 50px"></span>
                                    <div class="info-box-content">
                                        <span class="info-box-text">Graduation Fees</span>
                                        <span class="info-box-number">{{ $graduationFeeTotal }}</span>
                                    </div>
                                </div>
                            </div>
                            <div class="clearfix hidden-md-up"></div>
                            <div class="col-12 col-sm-10 col-md-4">
                                <div class="info-box mb-3">
                                    <span class="info-box-icon elevation-1"><img
                                            src="https://assets-global.website-files.com/63a08ec60612e3d0564bb798/64d52b0065178c3d78519aa1_healthcare-underpayments.png"
                                            alt="" style="width: 50px"></span>
                                    <div class="info-box-content">
                                        <span class="info-box-text">Total Receivable</span>
                                        <span class="info-box-number">{{ $receivableTotal }}</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="card text-dash">
                            <div class="card-header border-0" style="background-color: #ffff;">
                                <div class="d-flex justify-content-between">
                                    <h3 class="card-title">Monthly Acquisition</h3>
                                    <form id="monthly-form" action="{{ route('admin.perYearViewMonthlyAcquisition') }}"
                                        method="POST">
                                        @csrf
                                        <div class="form-group">
                                            <div class="row d-flex justify-content-between align-items-center">
                                                <div class="col-md-4">
                                                </div>
                                                <div class="col-md-5 mr-2 pr-5">
                                                    <input type="hidden" id="year_analytics">
                                                    <input type="hidden" name="year" id="hiddenYearInput">
                                                    <select id="yearDropdownAnalytics" class="form-control p-2 mr-5"
                                                        style="width: 100px;"></select>
                                                </div>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>
                            <div class="card-body" style="padding-top: 1%">
                                <div class="chart">
                                    <input type="hidden" id="percentage"
                                        data-medical-january="{{ $medicalSharePaidCountJanuary }}"
                                        data-medical-february="{{ $medicalSharePaidCountFebruary }}"
                                        data-medical-march="{{ $medicalSharePaidCountMarch }}"
                                        data-medical-april="{{ $medicalSharePaidCountApril }}"
                                        data-medical-may="{{ $medicalSharePaidCountMay }}"
                                        data-medical-june="{{ $medicalSharePaidCountJune }}"
                                        data-medical-july="{{ $medicalSharePaidCountJuly }}"
                                        data-medical-august="{{ $medicalSharePaidCountAugust }}"
                                        data-medical-september="{{ $medicalSharePaidCountSeptember }}"
                                        data-medical-october="{{ $medicalSharePaidCountOctober }}"
                                        data-medical-november="{{ $medicalSharePaidCountNovember }}"
                                        data-medical-december="{{ $medicalSharePaidCountDecember }}"
                                        data-counterpart-january="{{ $counterpartPaidCountJanuary }}"
                                        data-counterpart-february="{{ $counterpartPaidCountFebruary }}"
                                        data-counterpart-march="{{ $counterpartPaidCountMarch }}"
                                        data-counterpart-april="{{ $counterpartPaidCountApril }}"
                                        data-counterpart-may="{{ $counterpartPaidCountMay }}"
                                        data-counterpart-june="{{ $counterpartPaidCountJune }}"
                                        data-counterpart-july="{{ $counterpartPaidCountJuly }}"
                                        data-counterpart-august="{{ $counterpartPaidCountAugust }}"
                                        data-counterpart-september="{{ $counterpartPaidCountSeptember }}"
                                        data-counterpart-october="{{ $counterpartPaidCountOctober }}"
                                        data-counterpart-november="{{ $counterpartPaidCountNovember }}"
                                        data-counterpart-december="{{ $counterpartPaidCountDecember }}"
                                        data-personal-ca-january="{{ $personalCashAdvancePaidCountJanuary }}"
                                        data-personal-ca-february="{{ $personalCashAdvancePaidCountFebruary }}"
                                        data-personal-ca-march="{{ $personalCashAdvancePaidCountMarch }}"
                                        data-personal-ca-april="{{ $personalCashAdvancePaidCountApril }}"
                                        data-personal-ca-may="{{ $personalCashAdvancePaidCountMay }}"
                                        data-personal-ca-june="{{ $personalCashAdvancePaidCountJune }}"
                                        data-personal-ca-july="{{ $personalCashAdvancePaidCountJuly }}"
                                        data-personal-ca-august="{{ $personalCashAdvancePaidCountAugust }}"
                                        data-personal-ca-september="{{ $personalCashAdvancePaidCountSeptember }}"
                                        data-personal-ca-october="{{ $personalCashAdvancePaidCountOctober }}"
                                        data-personal-ca-november="{{ $personalCashAdvancePaidCountNovember }}"
                                        data-personal-ca-december="{{ $personalCashAdvancePaidCountDecember }}"
                                        data-graduation-fee-january="{{ $graduationFeePaidCountJanuary }}"
                                        data-graduation-fee-february="{{ $graduationFeePaidCountFebruary }}"
                                        data-graduation-fee-march="{{ $graduationFeePaidCountMarch }}"
                                        data-graduation-fee-april="{{ $graduationFeePaidCountApril }}"
                                        data-graduation-fee-may="{{ $graduationFeePaidCountMay }}"
                                        data-graduation-fee-june="{{ $graduationFeePaidCountJune }}"
                                        data-graduation-fee-july="{{ $graduationFeePaidCountJuly }}"
                                        data-graduation-fee-august="{{ $graduationFeePaidCountAugust }}"
                                        data-graduation-fee-september="{{ $graduationFeePaidCountSeptember }}"
                                        data-graduation-fee-october="{{ $graduationFeePaidCountOctober }}"
                                        data-graduation-fee-november="{{ $graduationFeePaidCountNovember }}"
                                        data-graduation-fee-december="{{ $graduationFeePaidCountDecember }}">
                                    <canvas id="barChart"
                                        style="min-height: 250px; height: 250px; max-height: 250px; max-width: 100%; display: block; width: 514px;"
                                        width="606" height="294" class="chartjs-render-monitor"></canvas>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-3 align-items-center align-middle text-left" style="padding-left: 5vh">
                        <div class="col-md-14">
                            <div class="table-responsive">
                                <h4 style="color: #1f3c88;" class="h4-text">Summary Reports</h4>
                                {{-- <p>Percentage of accumulated amount</p> --}}
                                <table class="table table-bordered table-hover align-middle">
                                    <tbody id="table-body">

                                        <tr style="border: none">
                                            <td style="border: none padding: 0%;"><b style="color: #1f3c88;">STATUS</b>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td style="border: none; padding: 0vh">Total No of Students (All Batches)
                                            </td>
                                        </tr>
                                        <tr>
                                            <td style="border: none; padding: 0vh"><b>{{ $totalNumberOfStudents }}</b>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td style="border: none; padding: 0vh">Total No of Students with Fully Paid
                                                Counterpart
                                            </td>
                                        </tr>
                                        <tr>
                                            <td style="border: none; padding: 0vh">
                                                <b>{{ $counterpartPaidStudentsCount }}</b>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td style="border: none; padding: 0vh">Total No of Students with Unpaid
                                                Counterpart
                                            </td>
                                        </tr>
                                        <tr>
                                            <td style="border: none; padding: 0vh">
                                                <b>{{ $counterpartUnpaidStudentsCount }}</b>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td style="border: none; padding: 0vh">Total No of Students with Not Fully Paid
                                                Counterpart
                                            </td>
                                        </tr>
                                        <tr>
                                            <td style="border: none; padding: 0vh">
                                                <b>{{ $counterpartNotFullyPaidStudentsCount }}</b>
                                            </td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                            <button type="submit" class="btn view-all"
                                style="background-color: #1f3c88; color: #ffff;">View
                                All</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    @include('assets.asst-loading-spinner')
    @include('modals.admin.mdl-view-all-dashboard')
@endsection
