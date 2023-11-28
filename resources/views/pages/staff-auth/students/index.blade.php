@extends('layouts.staff.app')
@section('content')
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12" id="table">
                    <div class="card">
                        @include('assets.asst-table-headers-with-add')
                        <div class="card-body">
                            <div class="table-responsive">
                                <table id="example2" class="table table-bordered table-hover data-table text-center">
                                    <thead>
                                        <tr>
                                            <th class="vertical-text">User Id</th>
                                            <th class="vertical-text">Name</th>
                                            <th class="vertical-text">Batch Year</th>
                                            <th class="vertical-text">Joined</th>
                                            <th class="vertical-text">Action</th>
                                        </tr>
                                    </thead>
                                    <tbody class="table-body">
                                        @forelse ($students as $student)
                                            <tr class="table-row">
                                                <td>{{ $student->id }}</td>
                                                <td>{{ $student->first_name . ' ' . $student->middle_name . ' ' . $student->last_name }}
                                                </td>
                                                <td>Batch {{ $student->batch_year }}</td>
                                                <td>{{ $student->joined }}</td>
                                                <td>
                                                    <a href="{{ route('students-info.getStudentInfo', ['id' => $student->id]) }}"
                                                        id="edt-btn-students" class="btn btn-sm"
                                                        data-student-id="{{ $student->id }}"
                                                        data-student-first-name="{{ $student->first_name }}"
                                                        data-student-middle-name="{{ $student->middle_name }}"
                                                        data-student-last-name="{{ $student->last_name }}"
                                                        data-student-email="{{ $student->email }}"
                                                        data-student-contact-number="{{ $student->phone }}"
                                                        data-student-birthdate="{{ $student->birthdate }}"
                                                        data-student-address="{{ $student->address }}"
                                                        data-student-guardian-name="{{ $student->parent_name }}"
                                                        data-student-guardian-contact="{{ $student->parent_contact }}"
                                                        data-student-batch-year="{{ $student->batch_year }}"
                                                        data-student-date-joined="{{ $student->date_joined }}"
                                                        data-student-url="{{ route('students-info.getStudentInfo', ['id' => $student->id]) }}">
                                                        EDIT
                                                    </a>
                                            </td>
                                        </tr>
                                    @empty
                                        <tr>
                                            <td colspan="11" class="text-center">No records found.</td>
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
@endsection
