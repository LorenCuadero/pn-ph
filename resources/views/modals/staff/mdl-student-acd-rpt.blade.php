<div class="modal fade" id="student-acd-rpt-modal" tabindex="-1" role="dialog"
    aria-labelledby="student-acd-rpt-modal-label" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="add-student-modal-label">Edit Student Grade</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                @if(isset($academic))
                <form id="new-form-edit" method="POST" action="{{ route('rpt.acd.updateStudentGradeReport', ['id' => $student->id]) }}">
                    @csrf
                    @method('PUT')                 
                    <div class="form-group" style="text-align: left">
                        <label for="course_code">Course Code</label>
                        <input type="text" class="form-control" id="course_code" name="course_code" required value="{{ $academic->course_code }}"/>
                    </div>
                  
                    <div class="form-group" style="text-align: left">
                        <label for="first_semester_1st_year">First Semester - 1st Year</label>
                        <input type="number" class="form-control" id="first_sem_1st_year" name="first_sem_1st_year" value="{{ $academic->first_sem_1st_year}}" min="0" max="4" step="0.01"/>
                    </div>
                  
                    <div class="form-group" style="text-align: left">
                        <label for="second_semester_1st_year">Second Semester - 1st Year</label>
                        <input type="number" class="form-control" id="second_sem_1st_year" name="second_sem_1st_year" value="{{ $academic->second_sem_1st_year}}"  min="0" max="4" step="0.01"  />
                    </div>
                  
                    <div class="form-group" style="text-align: left">
                        <label for="first_semester_2nd_year">First Semester - 2nd Year</label>
                        <input type="number" class="form-control" id="first_sem_2nd_year" name="first_sem_2nd_year" value="{{ $academic->first_sem_2nd_year}}" min="0" max="4" step="0.01"  />
                    </div>
                  
                    <div class="form-group" style="text-align: left">
                        <label for="second_semester_2nd_year">Second Semester - 2nd Year</label>
                        <input type="number" class="form-control" id="second_sem_2nd_year" name="second_sem_2nd_year" value="{{ $academic->second_sem_2nd_year}}"  min="0" max="4" step="0.01"  />
                    </div>
                  
                    <div class="form-group" style="text-align: left">
                        <label for="gpa">GPA</label>
                        <input type="number" class="form-control" id="gpa" name="gpa" value="{{ $academic->gpa }}" min="0" max="4" step="0.01" readonly />
                    </div>
                  
                    <div class="form-group" style="text-align: left; float:right;">
                        <button type="submit" class="btn btn-primary mr-2">Save Changes</button>
                        <a href="#" onclick="window.location.href = '{{ route('rpt.acd.getStudentGradeReport', ['id' => $student->id]) }}'; return false;" style="text-decoration: none; color: #fff;">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Back</button>
                        </a>
                    </div>
                </form>
                @include('assets.asst-loading-spinner')
                @else
                <p>No academic record found for this student.</p>
                @endif
            </div>
        </div>
    </div>
</div>
