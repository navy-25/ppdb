@extends('layouts.loginRegister')
@section('content')
    <div class="page-wrapper full-page">
        <div class="page-content d-flex align-items-center justify-content-center">
            @guest
                @if (Route::has('login'))
                    <div class="row w-100 mx-0 auth-page">
                        <div class="col-md-8 col-xl-6 mx-auto">
                            <div class="card">
                                <div class="row">
                                    <div class="col-md-4 pr-md-0">
                                        <div class="auth-left-wrapper" style="border-radius: 0.75rem;"></div>
                                    </div>
                                    <div class="col-md-8 pl-md-0">
                                        <div class="auth-form-wrapper px-4 py-5">
                                            <a href="#" class="noble-ui-logo d-block mb-2">e-Voting <span>Login</span></a>
                                            <h5 class="text-muted font-weight-normal mb-4">Welcome back! Log in to your account</h5>
                                            <form class="forms-sample" method="POST" action="{{ route('login') }}">
                                                @csrf
                                                <div class="form-group">
                                                    <label for="email">Email address</label>
                                                    <input type="email" class="form-control" id="email" name="email" placeholder="Email" required>
                                                </div>
                                                <div class="form-group">
                                                    <label for="Password">Password</label>
                                                    <input type="password" class="form-control" id="Password" name="password" autocomplete="current-password" placeholder="Password" required>
                                                </div>
                                                <div class="mt-4">
                                                    <button type="submit" class="btn btn-primary mr-2 mb-2 mb-md-0 text-white">
                                                        <i data-feather="log-in" stroke-width="3" width="14" height="14" class="mr-2"></i>Login
                                                    </button>
                                                </div>
                                                {{-- <span class="d-block mt-3 text-muted">
                                                    Not a user?
                                                    <a href="{{ route('register') }}" class="font-weight-bold text-decoration-none text-primary">
                                                        Sign up
                                                    </a>
                                                </span> --}}
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                @endif
            @else
                <div class="row w-100 mx-0 auth-page">
                    <div class="col-md-8 col-xl-6 mx-auto">
                        <div class="card">
                            <div class="row">
                                <div class="col-md-4 pr-md-0">
                                    <div class="auth-left-wrapper" style="border-radius: 0.75rem;"></div>
                                </div>
                                <div class="col-md-8 pl-md-0">
                                    <div class="auth-form-wrapper px-4 py-5">
                                        <a href="#" class="noble-ui-logo d-block mb-2">e-Voting <span>Apps</span></a>
                                        <h5 class="text-muted font-weight-normal mb-4">Welcome back {{ Auth::user()->name }}! You've logged in</h5>
                                        <div class="row">
                                            <div class="col-2">
                                                <a  href="{{ route('logout') }}"
                                                    class="btn btn-danger mr-2 mb-2 mb-md-0 text-white"
                                                    onclick="event.preventDefault();
                                                    document.getElementById('logout-form').submit();">
                                                    <i data-feather="log-out" stroke-width="3" width="14" height="14"></i>
                                                </a>
                                                <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                                    @csrf
                                                </form>
                                            </div>
                                            <div class="col-7 col-lg-7 col-md-7">
                                                <a href="{{ route('home') }}" class="btn btn-primary w-100 mr-2 mb-2 mb-md-0 text-white">
                                                    Back to dashboard
                                                </a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            @endguest
        </div>
    </div>
@endsection
