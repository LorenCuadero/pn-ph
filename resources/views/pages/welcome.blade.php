@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Integrated Online Management System</div>

                    <div class="card-body">
                        <form id="login-form" method="POST" action="{{ route('login') }}">
                            @csrf
                            <div class="form-group">
                                <label for="email">{{ __('Email Address') }}</label>
                                <input id="email" type="email"
                                    class="form-control @error('email') is-invalid @enderror" name="email"
                                    value="{{ old('email') }}" required autocomplete="email" autofocus>

                                @if (session('email-not-found'))
                                    <p><span class="text-danger error-display">{{ session('email-not-found') }}</span></p>
                                @endif
                            </div>
                            <div class="form-group">
                                <label for="password">{{ __('Password') }}</label>
                                <div class="input-group">
                                    <input id="password" type="password"
                                        class="form-control @error('password') is-invalid @enderror" name="password"
                                        required autocomplete="current-password">
                                    <div class="input-group-append">
                                        <button type="button" class="btn text-muted border" id="togglePassword"
                                            inputmode="none">
                                            <span class="far fa-eye"></span>
                                        </button>
                                    </div>

                                </div>
                                @if (session('incorrect-password'))
                                    <p><span class="text-danger error-display">{{ session('incorrect-password') }}</span>
                                    </p>
                                @endif
                            </div>
                            <button type="submit" class="btn btn-primary">
                                Login
                            </button>

                            <p class="mb-1">

                            </p>

                            <a href="{{ url('forgot-password') }}">Forgot Password?</a>
                        </form>
                        @include('assets.asst-loading-spinner')
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
