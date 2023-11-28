<div class="modal fade" id="add-student-grd-modal" tabindex="-1" role="dialog" aria-labelledby="add-student-modal-label"
    aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="add-student-modal-label">Add Student Grade</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body" style="text-align: left">
                <form id="new-form" method="POST"
                    action="{{ route('rpt.acd.addStudentGradeReport', ['id' => $student->id]) }}">
                    @csrf
                    <input type="hidden" name="student_id" value="{{ $student->id }}">
                    <div class="form-group">
                        <label for="course_code">Course Code</label>
                        <input type="text" name="course_code" id="course_code" class="form-control" required>
                    </div>
                    <div class="form-group">
                        <label for="year_and_sem">Year and Semester</label>
                        <select name="salutation" id="salutation" class="form-control mr-1">
                            <option value="0">First Semester - 1st Year</option>
                            <option value="1">Second Semester - 1st Year</option>
                            <option value="2">First Semester - 2nd Year</option>
                            <option value="3">Second Semester - 2nd Year</option>
                            <option value="4">First Semester - 3rd Year</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="grade">Midterm Grade</label>
                        <input type="number" step="0.01" name="midterm_grade" id="midterm_grade"
                            class="form-control">
                    </div>
                    <div class="form-group">
                        <label for="grade">Final Grade</label>
                        <input type="number" step="0.01" name="final_grade" id="final_grade"
                            class="form-control">
                    </div>
                    <button type="submit" class="btn btn-primary">Add Grade</button>
                    <a href="#"
                        onclick="window.location.href = '{{ route('rpt.acd.getStudentGradeReport', ['id' => $student->id]) }}'; return false;"
                        style="text-decoration: none; color: #fff;">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Back</button>
                    </a>
                </form>
                @include('assets.asst-loading-spinner')
            </div>
        </div>
    </div>
</div>
