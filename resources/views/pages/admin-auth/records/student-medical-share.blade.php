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
                        style="color:#1f3c88; background-color:#fff">
                        <h1 class="card-title mb-3 mb-md-0">
                            <b>Personal Record of:</b>
                            {{ $student->first_name . ' ' . $student->middle_name . ' ' . $student->last_name }}
                        </h1>
                        <br>
                        <div class="d-flex flex-wrap align-items-center ml-auto">
                            <form class="form-inline mr-auto mr-md-0 mb-2 mb-md-0">
                                <div class="nav-item btn btn-sm" id="addStudentMedicalShareRecordBtn"
                                    style="display: flex; align-items:center; background-color:#1f3c88; margin-right:2px;"
                                    data-target="add-student-grd-modal" data-toggle="modal">
                                    <a class="nav-link align-items-center"
                                        style="color:#ffffff;height: 100%; display: flex;">Add</a>
                                </div>
                                <div class="nav-item btn btn-sm" id="back" style="display: flex; align-items:center;">
                                    <a href="{{ route('admin.medicalShare') }}" class="nav-link align-items-center"
                                        style="color:#fff;">Back</a>
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
                                        <th style="background-color: #fff; color:#1f3c88;" class="vertical-text">Medical
                                            Concern</th>
                                        <th style="background-color: #fff; color:#1f3c88;" class="vertical-text">Total
                                            Medical Expense</th>
                                        <th style="background-color: #fff; color:#1f3c88;" class="vertical-text">15% Medical
                                            Share</th>
                                        <th style="background-color: #fff; color:#1f3c88;" class="vertical-text">Amount Paid
                                        </th>
                                        <th style="background-color: #fff; color:#1f3c88;" class="vertical-text">Date</th>
                                        <th style="background-color: #fff; color:#1f3c88;" class="vertical-text"></th>
                                    </tr>
                                </thead>
                                <tbody class="table-body">
                                    @forelse ($medical_share_records as $medical_share_record)
                                        <tr class="table-row">
                                            <td>{{ $medical_share_record->medical_concern }}</td>
                                            <td>{{ $medical_share_record->total_cost }}</td>
                                            <td>@php echo $medical_share_record->total_cost * 0.15; @endphp</td>
                                            <td>{{ $medical_share_record->amount_paid }}</td>
                                            <td>{{ $medical_share_record->date }}</td>
                                            <td>
                                                <a href="#" data-toggle="modal"
                                                    data-target="#edit-student-medical-share-modal"
                                                    data-medical-share-id="{{ $medical_share_record->id }}"
                                                    data-medical-concern="{{ $medical_share_record->medical_concern }}"
                                                    data-total-cost="{{ $medical_share_record->total_cost }}"
                                                    data-amount-paid="{{ $medical_share_record->amount_paid }}"
                                                    data-med-share-percent="{{ $medical_share_record->total_cost * 0.15 }}"
                                                    data-date="{{ $medical_share_record->date }}" class="btn btn-sm editStudentMedicalShareRecordBtn"
                                                    style="background-color: #1f3c88; color: #ffff; width:50%; border-radius: 20px; margin: 2px">
                                                    Edit
                                                </a>
                                                <a href="#" data-id="{{ $medical_share_record->id }}"
                                                    data-delete-url="{{ route('admin.deleteMedicalShare', ['id' => 'medical_share_id']) }}"
                                                    class="btn btn-sm delete-medical-share"
                                                    style="background-color: #dd3e3e; color: #ffff; width:50%; border-radius: 20px; margin: 2px;">
                                                    Delete
                                                </a>
                                                @include('modals.admin.mdl-student-medical-share-edit')
                                            </td>
                                        </tr>
                                        @include('modals.admin.mdl-delete-medical-share-confirmation')

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
        @include('modals.admin.mdl-student-medical-share-add')
    </section>
@endsection
