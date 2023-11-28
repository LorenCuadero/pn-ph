@extends('layouts.admin.app')
@section('content')
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12" id="table">
                    <div class="card">
                        <div class="card-header d-flex flex-wrap align-items-center justify-content-between"
                            style="background-color: #ffff; color: #1f3c88">
                            <p class="card-title mb-3 mb-md-0" style="color:#1f3c88; padding-left:0%; font-size: 22px">
                                <b>Reports</b>
                            </p>
                            <div class="d-flex flex-wrap align-items-center ml-auto">
                                <form class="form-inline mr-auto mr-md-0 mb-2 mb-md-0"
                                    style="display: flex; align-items: center;" id="date-form"
                                    action="{{ route('admin.viewFinancialReportByDateFromAndTo') }}" method="POST">
                                    @csrf
                                    <div class="nav-item btn btn-sm p-0" style="display: flex; align-items:center;">
                                        <input type="date" class="form-control rounded p-2 filters" id="date-from"
                                            name="dateFrom">
                                    </div>
                                    <div class="nav-item btn btn-sm p-0 m-2" style="display: flex; align-items:center;">
                                        <p class="mb-0 text-to filters">to</p>
                                    </div>
                                    <div class="nav-item btn btn-sm p-0" style="display: flex; align-items:center;">
                                        <input type="date" id="date-to" class="form-control rounded p-2 filters"
                                            name="dateTo">
                                    </div>
                                    <button type="submit" id="filter-submit"
                                        class="btn btn-primary ml-2 filters">Filter</button>
                                    <a href="{{ route('admin.financialReports') }}"
                                        class="btn btn-primary ml-2 reset-filter filters">Reset
                                        Filter</a>
                                </form>
                            </div>
                        </div>
                        <div class="card-body">
                            <div class="card-body" id="printableArea">
                                <div class="table-responsive">
                                    <div class="m-2 mb-4">
                                        <h5>Financial Statement</h5>
                                        @if (isset($dateFrom) && isset($dateTo))
                                            <span id="dates-from-text-when-set">{{ $dateFrom }}</span> - <span
                                                id="dates-to-text-when-set">{{ $dateTo }}</span>
                                        @endif
                                        @if (isset($startFromDate) && isset($endToDate))
                                            <span id="dates-started">{{ $startFromDate }}</span> - <span
                                                id="date-current">{{ $endToDate }}</span>
                                        @endif
                                    </div>
                                    <div class="table-responsive">
                                        <div class="custom-table-container">
                                            <table id="example2"
                                                class="table table-bordered table-hover text-center rounded"
                                                style="width: 60%;">
                                                <thead>
                                                    <tr>
                                                        <th class="text-left"
                                                            style="background-color: #ffff; color: #1f3c88; width: 50%;">
                                                            Income
                                                        </th>
                                                        <th style="background-color: #ffff; color: #1f3c88; width: 50%;">
                                                            Total
                                                        </th>
                                                    </tr>
                                                </thead>
                                                <tbody class="table-body">
                                                    <tr>
                                                        <td style="width: 50%;">Parent's Counterpart</td>
                                                        <td id="counterTotal" style="width: 50%;">₱
                                                            {{ number_format($counterpartTotal, 2) }}</td>
                                                    </tr>
                                                    <tr>
                                                        <td style="width: 50%;">Medical Share</td>
                                                        <td id="medicalTotal" style="width: 50%;">₱
                                                            {{ number_format($medicalShareTotal, 2) }}</td>
                                                    </tr>
                                                    <tr>
                                                        <td style="width: 50%;">Graduation Fees</td>
                                                        <td id="graduationTotal" style="width: 50%;">₱
                                                            {{ number_format($graduationFeeTotal, 2) }}
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td style="width: 50%;">Personal Cash Advance</td>
                                                        <td id="personalCashTotal" style="width: 50%;">₱
                                                            {{ number_format($personalCashAdvanceTotal, 2) }}</td>
                                                    </tr>
                                                </tbody>
                                                <tfoot>
                                                    <tr>
                                                        <th class="text-left"
                                                            style="background-color: #ffff; color: #1f3c88; width: 50%;">
                                                            Total
                                                            Income</th>
                                                        <th style="background-color: #ffff; color: #1f3c88; width: 50%;"
                                                            id="totalFinance">₱
                                                            {{ number_format($total, 2) }}</th>
                                                    </tr>
                                                </tfoot>
                                            </table>
                                        </div>
                                        <span class="buttons">
                                            <button type="button" class="btn btn-default printButtonOnFinancial"><i
                                                    class="fas fa-print"></i> Print</button></span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
