<div class="modal fade" id="changePassModal" tabindex="-1" role="dialog" aria-labelledby="student-selection-modal-label"
    aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="logoutModalLabel">Confirm Change Password</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form method="POST" action="{{ route('validate_from_current_pass') }}" enctype="multipart/form-data">
                @csrf
                <div class="modal-body text-left">
                    <p>Are you sure you want to change password?</p>
                    <p>Plese enter current password:</p>
                    <div class="input-group">
                        <input id="current_password" type="password"
                            class="form-control @error('password') is-invalid @enderror" name="current_password"
                            required autocomplete="current-password">
                        <div class="input-group-append">
                            <button type="button" class="btn text-muted border" id="togglePasswordOnConfirm" inputmode="none">
                                <span class="far fa-eye"></span>
                            </button>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <div class="form-group">
                        <input type="hidden" id="email_recover" name="email" value="{{ \Auth::user()->email }}">
                        <button type="submit" class="btn btn-primary">Submit</button>
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                    </div>
                </div>
            </form>
        </div>
        @include('assets.asst-loading-spinner')
    </div>
</div>
