<div class="modal fade" id="add-student-medical-share-modal" tabindex="-1" role="dialog"
    aria-labelledby="add-student-modal-label" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="add-student-modal-label">Add Record</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body" style="text-align: left">
                <form id="new-form-medical" method="POST"
                    action="{{ route('admin.storeMedicalShare', ['id' => $student->id]) }}">
                    @csrf
                    <input type="hidden" name="student_id" value="{{ $student->id }}">
                    <div class="form-group">
                        <label for="course_code">Medical Concern</label>
                        <input type="text" class="form-control" id="medical_concern" name="medical_concern">
                    </div>
                    <div class="form-group">
                        <label for="amount_due">Total Medical Expense</label>
                        <input type="number" name="amount_due" id="amount_due" class="form-control"
                            inputmode="numeric">
                    </div>
                    <div class="form-group">
                        <label for="amount_paid">15% Share</label>
                        <input type="text" class="form-control"
                            placeholder="15% share will automatically be calculated" readonly>
                    </div>
                    <div class="form-group">
                        <label for="amount_paid">Amount Paid</label>
                        <input type="number" name="amount_paid" id="amount_paid" class="form-control"
                            inputmode="numeric">
                    </div>
                    <div class="form-group">
                        <label for="date">Date</label>
                        <input type="date" name="date" class="form-control" id="date" rows="3"
                            placeholder="" required />
                    </div>
                    <div class="form-group" style="float: right;">
                        <button type="submit" class="btn btn-primary">Add</button>
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
