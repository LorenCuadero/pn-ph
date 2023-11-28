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
                        style="background-color: #fff;">
                        <h1 class="card-title mb-3 mb-md-0" style="color:#1f3c88;">
                            <b>Graduation Fee Record of:</b>
                            {{ $student->first_name . ' ' . $student->middle_name . ' ' . $student->last_name }}
                        </h1>
                        <br>
                        <div class="d-flex flex-wrap align-items-center ml-auto">
                            <form class="form-inline mr-auto mr-md-0 mb-2 mb-md-0">
                                <div class="nav-item btn btn-sm mr-1" id="addStudentGraduationFeeRecordRecordBtn"
                                    style="display: flex; align-items:center; background-color:#1f3c88; margin-right:2px;"
                                    data-target="add-student-grd-modal" data-toggle="modal">
                                    <a class="nav-link align-items-center"
                                        style="color:#ffffff;height: 100%; display: flex;">Add</a>
                                </div>
                                <div class="nav-item btn btn-sm" id="back" style="display: flex; align-items:center;">
                                    <a href="{{ route('admin.graduationFees') }}" class="nav-link align-items-center"
                                        style="color:#fff;">Back</a>
                                </div>
                            </form>
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <input type="hidden" value="{{ $student->id }}">
                            <table class="table table-bordered table-hover data-table text-center">
                                <thead style="background-color: #fff; color:#1f3c88;">
                                    <tr>
                                        <th class="vertical-text" style="background-color: #fff; color:#1f3c88;">Amount Due
                                        </th>
                                        <th class="vertical-text" style="background-color: #fff; color:#1f3c88;">Amount Paid
                                        </th>
                                        <th class="vertical-text" style="background-color: #fff; color:#1f3c88;">Date</th>
                                        <th class="vertical-text" style="background-color: #fff; color:#1f3c88;"></th>
                                    </tr>
                                </thead>
                                <tbody class="table-body">
                                    @forelse ($graduation_fee_records as $graduation_fee_record)
                                        <tr class="table-row">
                                            <td>{{ $graduation_fee_record->amount_due }}</td>
                                            <td>{{ $graduation_fee_record->amount_paid }}</td>
                                            <td>{{ $graduation_fee_record->date }}</td>
                                            <td>
                                                <a href="#" id="edit-gf" data-id="{{ $graduation_fee_record->id }}"
                                                    data-edit-url="{{ route('admin.updateGraduationFee', ['id' => 'graduation_fee_id']) }}"
                                                    data-purpose="{{ $graduation_fee_record->purpose }}"
                                                    data-amount-due="{{ $graduation_fee_record->amount_due }}"
                                                    data-amount-paid="{{ $graduation_fee_record->amount_paid }}"
                                                    data-date="{{ $graduation_fee_record->date }}"
                                                    class="btn btn-sm edit-student-graduation-fee-button"
                                                    style="background-color: #1f3c88; color: #ffff; width:50%; border-radius: 20px; margin: 2px">
                                                    Edit
                                                </a>
                                            </td>
                                        </tr>
                                    @empty
                                        <tr>
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
    @include('modals.admin.mdl-student-gf-add')
    @include('modals.admin.mdl-student-graduation-fee-edit')
@endsection
