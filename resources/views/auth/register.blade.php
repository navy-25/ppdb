@extends('layouts.loginRegister')
@section('content')
    <div class="page-wrapper full-page">
        <div class="page-content d-flex align-items-center justify-content-center">
            <div class="row w-100 mx-0 auth-page">
                <div class="col-md-8 col-xl-8 mx-auto">
                    <div class="card">
                        <div class="row">
                            <div class="col-md-4 pr-md-0">
                                <div class="auth-left-wrapper" style="border-radius: 0.75rem;"></div>
                            </div>
                            <div class="col-md-8 pl-md-0">
                                <div class="auth-form-wrapper px-4 py-5">
                                    <a href="#" class="noble-ui-logo d-block mb-2">e-Voting <span>Register</span></a>
                                    <h5 class="text-muted font-weight-normal mb-4">Create a free account</h5>
                                    <form  method="POST" action="{{ route('register') }}">
                                        @csrf
                                        <div class="form-group">
                                            <label for="name">Username</label>
                                            <input type="text" class="form-control" id="name" name="name" placeholder="yourname" required autocomplete="name">
                                        </div>
                                        <div class="form-group">
                                            <label for="email">Email address</label>
                                            <input type="email" class="form-control" id="email" name="email" placeholder="youremail@gmail.com" required autocomplete="email">
                                        </div>
                                        <div class="row">
                                            <div class="col-12 col-lg-6 col-md-6">
                                                <div class="form-group">
                                                    <label for="Password">Password</label>
                                                    <input type="password" class="form-control" id="Password" name="password" autocomplete="new-password" placeholder="min.8 character" required>
                                                </div>
                                            </div>
                                            <div class="col-12 col-lg-6 col-md-6">
                                                <div class="form-group">
                                                    <label for="password-confirm">Password Confirm</label>
                                                    <input id="password-confirm" type="password" class="form-control" name="password_confirmation" placeholder="min.8 character"  autocomplete="new-password" required>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="mt-4">
                                            <button type="submit" class="btn btn-primary mr-2 mb-2 mb-md-0 text-white">
                                                <i data-feather="log-in" stroke-width="3" width="14" height="14" class="mr-2"></i>Sign Up
                                            </button>
                                        </div>
                                        <span class="d-block mt-3 text-muted">
                                            Already user?
                                            <a href="{{ route('login') }}" class="font-weight-bold text-decoration-none text-primary">
                                                Sign in
                                            </a>
                                        </span>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
