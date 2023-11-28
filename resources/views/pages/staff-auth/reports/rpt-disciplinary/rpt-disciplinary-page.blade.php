@extends('layouts.staff.app')
@section('content')
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12" id="table">
                    <div class="card">
                        <div class="card-header d-flex flex-wrap align-items-center justify-content-between">
                            <p class="card-title mb-3 mb-md-0" style="color:#1f3c88; padding-left:0%; font-size: 22px">
                                <b>Disciplinary Reports</b>
                            </p>
                            <div class="d-flex flex-wrap align-items-center ml-auto">
                                <form class="form-inline mr-auto mr-md-0 mb-2 mb-md-0"
                                    style="display: flex; align-items: center;">
                                    {{-- <div style="display: flex; align-items: center; height: 38px;">
                                        <input class="form-control mr-sm-1 searchInput" type="search"
                                            placeholder="Search record here" aria-label="Search"
                                            style="height: 100%; width: 200px;">
                                    </div> --}}
                                    {{-- <div class="nav-item dropdown show btn btn-sm reset-filter-btn"
                                        style="display: flex; align-items:center; height: 38px;">
                                        <a class="nav-link align-items-center"
                                            style="color:#fff;height: 100%; display: flex; align-items: center;">Reset
                                            Table</a>
                                    </div> --}}
                                    <div class="nav-item btn btn-sm" id="selectToAdd" data-target="#student-selection-modal"
                                        data-toggle="modal"
                                        style="display: flex; align-items:center; height: 38px; margin-left: 4px;">
                                        <a href="#" class="nav-link align-items-center"
                                            style="color:#fff;height: 100%; display: flex; align-items: center;">Add</a>
                                    </div>
                                </form>
                            </div>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table id="example2" class="table table-bordered table-hover data-table text-center">
                                    <thead>
                                        <tr>
                                            <th class="vertical-text">Student</th>
                                            <th class="vertical-text">Formal Verbal Warning</th>
                                            <th class="vertical-text">Written Warning</th>
                                            <th class="vertical-text">Probationary</th>
                                            <th class="vertical-text"></th>
                                        </tr>
                                    </thead>
                                    <tbody class="table-body">
                                        @forelse ($studentsWithDisciplinaryRecords as $studentsWithRecord)
                                            <tr class="table-row">
                                                <td>
                                                    {{ $studentsWithRecord->student->first_name }}
                                                    {{ $studentsWithRecord->student->last_name }}
                                                </td>
                                                <td>
                                                    <input type="date" name="verbal_warning_date"
                                                        id="verbal_warning_date_{{ $studentsWithRecord->id }}"
                                                        value="{{ $studentsWithRecord->verbal_warning_date }}"
                                                        class="form-control text-center align-middle" readonly>
                                                    <input type="hidden"
                                                        value="{{ $studentsWithRecord->verbal_warning_description }}">
                                                </td>
                                                <td>
                                                    <input type="date" name="written_warning_date"
                                                        id="written_warning_date_{{ $studentsWithRecord->id }}"
                                                        value="{{ $studentsWithRecord->written_warning_date }}"
                                                        class="form-control text-center align-middle" readonly>
                                                    <input type="hidden"
                                                        value="{{ $studentsWithRecord->written_warning_description }}">
                                                </td>
                                                <td>
                                                    <input type="date" name="provisionary_date"
                                                        id="provisionary_date_{{ $studentsWithRecord->id }}"
                                                        value="{{ $studentsWithRecord->provisionary_date }}"
                                                        class="form-control text-center align-middle" readonly>
                                                    <input type="hidden"
                                                        value="{{ $studentsWithRecord->provisionary_description }}">
                                                </td>
                                                <td>
                                                    <a href="#" id="edit-dcpl-btn" class="btn btn-sm"
                                                        data-toggle="modal" data-target="#edit-student-dcpl-modal"
                                                        data-student-id="{{ $studentsWithRecord->id }}"
                                                        data-student-fname="{{ $studentsWithRecord->student->first_name }}"
                                                        data-student-lname="{{ $studentsWithRecord->student->last_name }}"
                                                        data-student-url="{{ route('rpt.dcpl.update', ['id' => '__student_id__']) }}"
                                                        data-verbal-warning-date="{{ $studentsWithRecord->verbal_warning_date }}"
                                                        data-verbal-warning-desc="{{ $studentsWithRecord->verbal_warning_description }}"
                                                        data-written-warning-date="{{ $studentsWithRecord->written_warning_date }}"
                                                        data-written-warning-desc="{{ $studentsWithRecord->written_warning_description }}"
                                                        data-provisionary-warning-date="{{ $studentsWithRecord->provisionary_date }}"
                                                        data-provisionary-warning-desc="{{ $studentsWithRecord->provisionary_description }}"
                                                        data-student-route="{{ route('rpt.dcpl.index') }}">
                                                        VIEW | EDIT
                                                    </a>
                                                </td>
                                            </tr>
                                        @empty
                                            <tr>
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
    @include('modals.staff.mdl-student-dcpl-rpt-edit')
    @include('modals.staff.mdl-student-dcpl-rpt-add')
    @include('modals.staff.mdl-student-selection')
@endsection
