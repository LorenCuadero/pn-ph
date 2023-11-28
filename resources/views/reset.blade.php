@extends('layouts.app')
@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Integrated Online Management System</div>
                    <div class="card-body">
                        <form method="POST" action="{{ route('submit-reset') }}" enctype="multipart/form-data">
                            @csrf
                            <div class="form-group">
                                <label for="">Reset password</label>
                                <input type="hidden" id="email_recover" name="email" value="{{ $user_email }}">
                                <div class="input-group mb-3">
                                    <div class="input-group">
                                        <input id="password_onreset" type="password"
                                            class="form-control @error('password') is-invalid @enderror" name="password"
                                            required autocomplete="current-password">
                                        <div class="input-group-append">
                                            <button type="button" class="btn text-muted border" id="togglePasswordOnReset"
                                                inputmode="none">
                                                <span class="far fa-eye"></span>
                                            </button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="input-group mb-3">
                                <div class="input-group">
                                    <input id="cpassword" type="password"
                                        class="form-control @error('password') is-invalid @enderror" name="cpassword"
                                        required autocomplete="current-password">
                                    <div class="input-group-append">
                                        <button type="button" class="btn text-muted border" id="toggleCPassword"
                                            inputmode="none">
                                            <span class="far fa-eye"></span>
                                        </button>
                                    </div>
                                </div>
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
