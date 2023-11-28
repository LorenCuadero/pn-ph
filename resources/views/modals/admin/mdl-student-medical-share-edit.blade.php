<div class="modal fade" id="edit-student-medical-share-modal" tabindex="-1" role="dialog"
    aria-labelledby="edit-student-modal-label" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="edit-student-modal-label">Edit Record</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body" style="text-align: left">
                <form id="edit-form-medical" method="POST"
                   action="{{ route('admin.updateMedicalShare', ['id' => $student->id]) }}">
                    @csrf
                    @method('PUT')
                    <input type="hidden" name="student_id" value="{{ $student->id }}">
                    <input type="hidden" name="medical_id" id="medical_id">
                    <div class="form-group">
                        <label for="course_code">Medical Concern</label>
                        <input type="text" class="form-control" id="medical_concern_ms_edit" name="medical_concern">
                    </div>
                    <div class="form-group">
                        <label for="amount_due">Total Medical Expense</label>
                        <input type="number" name="amount_due" id="amount_due_ms_edit" class="form-control" step="any">
                    </div>
                    <div class="form-group">
                        <label for="amount_paid">15% Share</label>
                        <input type="text" class="form-control" id="percent_share" readonly>
                    </div>
                    <div class="form-group">
                        <label for="amount_paid">Amount Paid</label>
                        <input type="number" name="amount_paid" id="amount_paid_ms_edit" class="form-control" step="any">
                    </div>
                    <div class="form-group">
                        <label for="date">Date</label>
                        <input type="date" name="date" class="form-control" id="date_paid_ms_edit" rows="3"
                            placeholder="" required />
                    </div>
                    <div class="form-group" style="float: right;">
                        <button type="submit" class="btn btn-primary">Save changes</button>
                        <a href="#" style="text-decoration: none; color: #fff;">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Back</button>
                        </a>
                </form>
                @include('assets.asst-loading-spinner')
            </div>
        </div>
    </div>
</div>
