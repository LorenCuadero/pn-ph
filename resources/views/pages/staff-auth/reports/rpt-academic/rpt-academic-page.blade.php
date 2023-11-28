@extends('layouts.staff.app')
@section('content')
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12" id="table">
                    <div class="card">
                        @include('assets.asst-table-headers')
                        <div class="card-body">
                            <div class="table-responsive">
                                <table id="example2" class="table table-bordered table-hover data-table text-center">
                                    <thead>
                                        <tr>
                                            <th class="vertical-text">User Id</th>
                                            <th class="vertical-text">Name</th>
                                            <th class="vertical-text">Batch Year</th>
                                            <th class="vertical-text">GWA</th>
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
                                                <td>{{ $student->totalGPA }}</td>
                                                <td>
                                                    <a href="{{ route('rpt.acd.getStudentGradeReport', ['id' => $student->id ]) }}" id="grade-button" class="btn btn-sm">
                                                        GRADE
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
    </section>
    {{-- <cmpt-student-acd-rpt></cmpt-student-acd-rpt> --}}
@endsection
