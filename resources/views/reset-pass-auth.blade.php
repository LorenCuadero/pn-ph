@extends('layouts.app')
@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Integrated Online Management System</div>
                    <div class="card-body">
                        <form method="POST" action="{{ route('confirm-changes') }}" enctype="multipart/form-data">
                            @csrf
                            <div class="form-group">
                                <label for="">Reset password</label>
                                <input type="hidden" id="email_recover" name="email" value="{{ $user_email }}">
                                <div class="input-group mb-3">
                                    <input type="password" class="form-control" placeholder="Password" name="password"
                                        required>
                                    <div class="input-group-append">
                                        <div class="input-group-text">
                                            <span class="fas fa-lock"></span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="input-group mb-3">
                                <input type="password" class="form-control" placeholder="Confirm Password" name="cpassword"
                                    required>
                                <div class="input-group-append">
                                    <div class="input-group-text">
                                        <span class="fas fa-lock"></span>
                                    </div>
                                </div>
                            </div>
                            <div class="form-check mb-3">
                                <input type="checkbox" class="form-check-input" id="keep_logged_in" name="keep_logged_in" value="1">
                                <label class="form-check-label" for="keep_logged_in">Keep me logged in</label>
                            </div>
                            <button type="submit" class="btn btn-primary">Submit</button>
                            <a href="{{ route('login') }}" class="btn btn-secondary">Cancel</a>
                        </form>
                        @include('assets.asst-loading-spinner')
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
