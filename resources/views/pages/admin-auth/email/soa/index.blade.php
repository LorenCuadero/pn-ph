@extends('layouts.admin.app')
@section('content')
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12" id="table">
                    <div class="card">
                        <div class="card-header d-flex flex-wrap align-items-center justify-content-between"
                            style="background-color:#ffffff">
                            <div class="row">
                                <div class="col-md-12">
                                    <p class="card-title mb-3 mb-md-0"
                                        style="color:#1f3c88; padding-left:0%; font-size: 22px"><b>Email Genarator: Statement of Account</b>
                                    </p>
                                </div>
                            </div>
                        </div>
                        <div class="card-body">
                            <div class="row">
                                <div class="col-md-12 text-left">
                                    <div class="flex-wrap align-items-center ml-auto">
                                        <div class="row">
                                            <div class="col-md-12 text-left align-middle" style="padding-left: 2%">
                                                <div class="d-flex align-items-center justify-content">
                                                    <div class="d-flex align-items-center mr-0">
                                                        <p style="margin: 2px 2px 0px"><b style="color:#1f3c88;">To: </b>
                                                        </p> <span> </span>
                                                    </div>
                                                    <div class="nav-item dropdown show btn btn-sm batch-year-dropdown selections"
                                                        style="display: flex; align-items: center; background-color: #ffff; border: 1px solid #ced4da;">
                                                        <a class="nav-link dropdown-toggle align-items-center"
                                                            data-toggle="dropdown" href="#" role="button"
                                                            aria-haspopup="true" aria-expanded="true"
                                                            style="color:#495057;height: 100%; display: flex; align-items: center; padding-left: 2%;">
                                                            {{ $selectedBatchYear ?? 'Year' }}
                                                        </a>
                                                        <div class="dropdown-menu mt-0" style="left: 0px; right: inherit;">
                                                            @foreach ($students->pluck('batch_year')->unique() as $year)
                                                                <a class="dropdown-item" href="#"
                                                                    data-widget="iframe-close">{{ $year }}</a>
                                                            @endforeach
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="d-flex align-items-center justify-content">
                                                    <div class="align-middle">
                                                        <p style="margin: 2px 2px 0px"><b
                                                                style="color:#1f3c88;">Subject:</b> Statement of Account for
                                                            Parents' Counterpart Balances as of:</p>
                                                    </div>
                                                    <span> </span>
                                                    <select id="monthDropdown" class="form-control selections"
                                                        style="width: 150px;">
                                                        <option value="1">January</option>
                                                        <option value="2">February</option>
                                                        <option value="3">March</option>
                                                        <option value="4">April</option>
                                                        <option value="5">May</option>
                                                        <option value="6">June</option>
                                                        <option value="7">July</option>
                                                        <option value="8">August</option>
                                                        <option value="9">September</option>
                                                        <option value="10">October</option>
                                                        <option value="11">November</option>
                                                        <option value="12">December</option>
                                                    </select>
                                                    <select class="form-control selections yearDropdown"
                                                        style="width: 150px;"></select>
                                                </div>
                                                <p><b style="color:#1f3c88;">Message Preview:</b></p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-12 justify-content">
                                    <div class="container">
                                        <form id="email-form" enctype="multipart/form-data" method="POST"
                                            action="{{ route('admin.sendEmail') }}">
                                            @csrf
                                            <input type="hidden" id="selectedBatchYear" name="selectedBatchYear">
                                            <input type="hidden" id="year" name="year">
                                            <input type="hidden" id="month" name="month">
                                            <textarea class="form-control" rows="10" readonly>Hi (Name),

I hope this email finds you well.

We would like to take this opportunity to remind you of your outstanding Parents' Counterpart Balances as of (Month, Year). We understand that your families may be facing financial difficulties, but we would like to remind you that your Scholarship Contract states that your parents/guardians agreed to support your counterpart with P500 per month.

Here's your account statement, please settle your balances regularly so that it won't be burdensome for you to pay prior to graduation.

                                Parents Counterpart as of (Month, Year): 0.00 PHP
                                Remaining Debt from Medical Fees: 0.00 PHP
                                Other Payable: 0.00 PHP
                                Total Payable: 0.00 PHP

To see all your records, click this link:  (ioms-pn-student-parent-portal-link)

Thank you so much!
                                            </textarea>
                                            <br>
                                            <button class="btn" type="submit" id="sendButton">Send</button>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    @include('assets.asst-loading-spinner')
@endsection
