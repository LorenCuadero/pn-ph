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
                                <b>Closing of Accounts</b>
                            </p>
                            <div class="d-flex flex-wrap align-items-center ml-auto">
                                <form class="form-inline mr-auto mr-md-0 mb-2 mb-md-0"
                                    style="display: flex; align-items: center;">
                                    <div class="nav-item btn btn-sm p-0" id="selectToAddStudentCounterpart"
                                        style="display: flex; align-items:center;">
                                        <button type="button" class="btn btn-default printButtonOnCOA"><i
                                                class="fas fa-print"></i> Print</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table id="exampleOnCOA" class="table table-bordered table-hover data-table text-center">
                                    <thead>
                                        <tr>
                                            <th style="background-color: #ffff; color: #1f3c88">Name</th>
                                            <th style="background-color: #ffff; color: #1f3c88">Batch Year</th>
                                            <th style="background-color: #ffff; color: #1f3c88">Counterpart Amount Due</th>
                                            <th style="background-color: #ffff; color: #1f3c88">Medical Share Amount Due
                                            </th>
                                            <th style="background-color: #ffff; color: #1f3c88">Personal Cash Advance Amount
                                                Due</th>
                                            <th style="background-color: #ffff; color: #1f3c88">Graduation Fee Amount Due
                                            </th>
                                            <th style="background-color: #ffff; color: #1f3c88">Total Balances
                                            </th>
                                            <th style="background-color: #ffff; color: #1f3c88">Status</th>
                                        </tr>
                                    </thead>
                                    <tbody class="table-body" style="font-size: 14px;">
                                        @forelse ($studentData as $data)
                                            <tr>
                                                <td>{{ $data['name'] }}</td>
                                                <td>{{ $data['batch_year'] }}</td>
                                                <td>{{ $data['counterpart_due_and_paid'] }}</td>
                                                <td>{{ $data['medical_share_due_and_paid'] }}</td>
                                                <td>{{ $data['personal_cash_advance_due_and_paid'] }}</td>
                                                <td>{{ $data['graduation_fee_due_and_paid'] }}</td>
                                                <td>{{ $data['total_balances'] }}</td>
                                                <td>
                                                    @if ($data['status'] == 'Closed')
                                                        <span class="badge badge-success">Close</span>
                                                    @endif
                                                    @if ($data['status'] == 'Return')
                                                        <span class="badge badge-success">Close</span>
                                                        <p class="mb-0 text-muted text-default">return amount exceeded</p>
                                                    @endif
                                                    @if ($data['status'] == 'Open')
                                                        <span class="badge badge-warning">Open</span>
                                                    @endif
                                                </td>
                                            </tr>
                                        @empty
                                            <tr>
                                                <td></td>
                                                <td></td>
                                                <td></td>
                                                <td></td>
                                                <td></td>
                                                <td></td>
                                                <td></td>
                                            </tr>
                                        @endforelse
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    {{-- @include('modals.admin.mdl-student-counterpart-view')
    @include('modals.admin.mdl-student-selection') --}}
@endsection
