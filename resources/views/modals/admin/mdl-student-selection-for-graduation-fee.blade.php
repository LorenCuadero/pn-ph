<div class="modal fade" id="student-selection-graduation-fee-modal" tabindex="-1" role="dialog"
    aria-labelledby="student-selection-modal-label" aria-hidden="true">
    <div class="modal-dialog custom-modal-width" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="student-selection-modal-label">Select Student</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <a href="{{ route('rpt.dcpl.index') }}"><span aria-hidden="true">&times;</span> </a>
            </div>
            <div class="modal-body">
                <div class="container-fluid">
                    <div class="row" d-flex>
                        <div class="col-12" id="table">
                            <div class="card">
                                {{-- @include('assets.asst-table-headers-no-order-by') --}}
                                <div class="card-body">
                                    <div class="table-responsive">
                                        <form>
                                            <table id="selection" class="table table-bordered table-hover data-table text-center">
                                                <thead>
                                                    <tr>
                                                        <th class="vertical-text">User Id</th>
                                                        <th class="vertical-text">Name</th>
                                                        <th class="vertical-text">Batch Year</th>
                                                        <th class="vertical-text"></th>
                                                    </tr>
                                                </thead>
                                                <tbody class="table-body1">
                                                    @forelse ($studentsWithoutGraduationFees as $student)
                                                        <tr class="table-row1">
                                                            <td>{{ $student->id }}</td>
                                                            <td>{{ $student->first_name . ' ' . $student->middle_name . ' ' . $student->last_name }}
                                                            </td>
                                                            <td>Batch {{ $student->batch_year }}</td>
                                                            <td> <a id="selectToAddDisciplinary"
                                                                    href="{{ route('admin.studentGraduationFeeRecords', ['id' => $student->id]) }}"
                                                                    data-student-id="{{ $student->id }}"
                                                                    data-student-fname="{{ $student->first_name }}"
                                                                    data-student-lname="{{ $student->last_name }}"
                                                                    class="select-student-link-counterpart">Add</a>
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
                                        </form>
                                        @include('assets.asst-loading-spinner')
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
