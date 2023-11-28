<div class="modal fade" id="add-student-dcpl-modal" tabindex="-1" role="dialog" aria-labelledby="add-student-modal-label"
    aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="student-warning-modal-label">Warning for <input name="first_name" value="" class="Input first_name" readonly/>  <input name="last_name" value="" class="Input last_name" readonly/></h5>
                <button type="button" class="close">
                    <span aria-hidden="true" id="closeButton"><a href="#" data-toggle="modal" data-target="#student-selection-modal">&times;</a></span>
                </button>
            </div>
            <div class="modal-body" style="text-align: left">
                <form id="new-form-dcpl" method="POST" action="{{ route('rpt.dcpl.store') }}">
                    @csrf
                    <input type="hidden" name="student_id" class="student_id" value="">
                    <div class="form-group">
                        <div class="row d-flex justify-content-between">
                            <div class="col-md-3">
                                <label for="verbal-warning">Formal Verbal Warning:</label>
                                <br>
                                <input type="date" id="verbal_warning_date" name="verbal_warning_date">
                            </div>
                            <div class="col-md-8">
                                <label for="written-warning">Description:</label>
                                <textarea class="form-control" id="verbal_warning_description" name="verbal_warning_description"></textarea>
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="row d-flex justify-content-between">
                            <div class="col-md-3">
                                <label for="written-warning">Written Warning:</label>
                                <br>
                                <input type="date" id="written_warning_date" name="written_warning_date">
                            </div>
                            <div class="col-md-8">
                                <label for="written-warning">Description:</label>
                                <textarea class="form-control" id="written_warning_description" name="written_warning_description"></textarea>
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="row d-flex justify-content-between">
                            <div class="col-md-3">
                                <label for="provisionary-warning">Provisionary Warning:</label>
                                <br>
                                <input type="date" id="provisionary_date" name="provisionary_date">
                            </div>
                            <div class="col-md-8">
                                <label for="written-warning">Description:</label>
                                <textarea class="form-control" id="provisionary_description" name="provisionary_description"></textarea>
                            </div>
                        </div>
                    </div>
                    <div class="form-group" style="text-align: center; margin-top: 10px; float:right;">
                        <button id="saveRecordsAddStudent" type="submit" class="btn btn-success">Save Records</button>
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                    </div>
                </form>
                @include('assets.asst-loading-spinner')
            </div>
        </div>
    </div>
</div>
