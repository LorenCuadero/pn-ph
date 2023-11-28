@extends('layouts.admin.app')
@section('content')
    <section class="content">
        <div class="row">
            <span>
                @if (session('success'))
                    <p><span class="text-success success-display ml-2">[ {{ session('success') }} ]</span></p>
                @endif
                @if (session('error'))
                    <p><span class="text-danger error-display ml-2">[ {{ session('error') }} ]</span></p>
                @endif
            </span>
            <div class="col-12">
                <div class="card">
                    <div class="card-header d-flex flex-wrap align-items-center justify-content-between"
                        style="background-color: #ffffff">
                        <h1 class="card-title mb-3 mb-md-0" style="color:#1f3c88;">
                            <b>Parents Counterpart Record of:</b>
                            {{ $student->first_name . ' ' . $student->middle_name . ' ' . $student->last_name }}
                        </h1>
                        <br>
                        <div class="d-flex flex-wrap align-items-center ml-auto">
                            <form class="form-inline mr-auto mr-md-0 mb-2 mb-md-0">
                                <div class="nav-item btn btn-sm" id="addStudentCounterpartRecordBtn"
                                    style="display: flex; align-items:center; height: 38px; margin-left: 4px; background-color: #1f3c88; color:#fff;"
                                    data-target="add-student-grd-modal" data-toggle="modal">
                                    <a class="nav-link align-items-center" style="text-decoration: none; color:#fff">Add</a>
                                </div>
                                <div class="nav-item btn btn-sm back"
                                    style="display: flex; align-items:center; height: 38px; margin-left: 4px; background-color: #1f3c88; color:#fff;">
                                    <a href="{{ route('admin.counterpartRecords') }}" class="nav-link align-items-center"
                                        style="color:#fff;height: 100%; display: flex; align-items: center;">Back</a>
                                </div>
                            </form>
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <input type="hidden" value="{{ $student->id }}">
                            <table class="table table-bordered table-hover data-table text-center">
                                <thead>
                                    <tr>
                                        <th style="background-color: #fff; color:#1f3c88;" class="vertical-text">Month</th>
                                        <th style="background-color: #fff; color:#1f3c88;" class="vertical-text">Year</th>
                                        <th style="background-color: #fff; color:#1f3c88;" class="vertical-text">Amount Due
                                        </th>
                                        <th style="background-color: #fff; color:#1f3c88;" class="vertical-text">Amount Paid
                                        </th>
                                        <th style="background-color: #fff; color:#1f3c88;" class="vertical-text">Date</th>
                                        <th style="background-color: #fff; color:#1f3c88;" class="vertical-text"></th>
                                    </tr>
                                </thead>
                                @forelse ($student_counterpart_records as $counterpart)
                                    <tr class="table-row align-middle">
                                        <td>{{ $months[$counterpart->month] }}</td>
                                        <td>{{ $counterpart->year }}</td>
                                        <td>{{ $counterpart->amount_due }}</td>
                                        <td>{{ $counterpart->amount_paid }}</td>
                                        <td>{{ $counterpart->date }}</td>
                                        <td style="text-align: center;">
                                            <div style="display: flex; flex-direction: column; align-items: center;">
                                                <a href="#" id="edit" data-id="{{ $counterpart->id }}"
                                                    data-month="{{ $counterpart->month }}"
                                                    data-edit-url="{{ route('admin.updateCounterpart', ['id' => 'counterpart_id']) }}"
                                                    data-year="{{ $counterpart->year }}"
                                                    data-amount-due="{{ $counterpart->amount_due }}"
                                                    data-amount-paid="{{ $counterpart->amount_paid }}"
                                                    data-date="{{ $counterpart->date }}"
                                                    class="btn btn-sm edit-student-counterpart-button"
                                                    style="background-color: #1f3c88; color: #ffff; width:50%; border-radius: 20px; margin: 2px">
                                                    Edit
                                                </a>
                                                <a href="#" data-id="{{ $counterpart->id }}"
                                                    data-delete-url="{{ route('admin.deleteCounterpart', ['id' => 'counterpart_id']) }}"
                                                    class="btn btn-sm delete-counterpart"
                                                    style="background-color: #dd3e3e; color: #ffff; width:50%; border-radius: 20px; margin: 2px;">
                                                    Delete
                                                </a>
                                            </div>
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
                                    </tr>
                                @endforelse
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    @include('modals.admin.mdl-student-counterpart-add')
    @include('modals.admin.mdl-student-counterpart-edit')
    @include('modals.admin.mdl-delete-counterpart-confirmation')
@endsection
