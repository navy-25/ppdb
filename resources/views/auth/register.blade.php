@extends('layouts.loginRegister')
@section('title')
Register Admin
@endsection
@section('content')
    <div class="page-wrapper full-page">
        <div class="page-content d-flex align-items-center justify-content-center">
            <div class="row w-100 mx-0 auth-page">
                <div class="col-md-8 col-xl-8 mx-auto">
                    <div class="card">
                        <div class="row">
                            <div class="col-md-5 pr-md-0">
                                <div class="auth-left-wrapper" style="border-radius: 0.75rem;"></div>
                            </div>
                            <div class="col-md-7 pl-md-0">
                                <div class="auth-form-wrapper px-4 py-4">
                                    <a href="#" class="noble-ui-logo d-block mb-2">Admin PPDB <span style="text-green">Daftar</span></a>
                                    <h5 class="text-muted font-weight-normal mb-4">Selamat datang di sistem pengelolaan Peserta Didik Baru MAN 1 Hulu Sungai Tengah</h5>
                                    <form  method="POST" action="{{ route('register') }}">
                                        @csrf
                                        <div class="form-group">
                                            <label for="name">Nama Lengkap</label>
                                            <input type="text" class="form-control" id="name" name="name" placeholder="nama lengkap beserta gelar" required autocomplete="name">
                                        </div>
                                        <div class="form-group">
                                            <label for="email">Email</label>
                                            <input type="email" class="form-control" id="email" name="email" placeholder="emailanda@gmail.com" required autocomplete="email">
                                        </div>
                                        <div class="row">
                                            <div class="col-12 col-lg-6 col-md-6">
                                                <div class="form-group">
                                                    <label for="Password">Password</label>
                                                    <input type="password" class="form-control" id="Password" name="password" autocomplete="new-password" placeholder="min.8 huruf" required>
                                                </div>
                                            </div>
                                            <div class="col-12 col-lg-6 col-md-6">
                                                <div class="form-group">
                                                    <label for="password-confirm">Ulangi</label>
                                                    <input id="password-confirm" type="password" class="form-control" name="password_confirmation" placeholder="min.8 huruf"  autocomplete="new-password" required>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="mt-2">
                                            <button type="submit" class="btn btn-warning mr-2 mb-2 mb-md-0 text-white">
                                                <i data-feather="log-in" stroke-width="3" width="14" height="14" class="mr-2"></i>Daftar
                                            </button>
                                        </div>
                                        <span class="d-block mt-2 text-muted">
                                            Sudah punya akun admin?
                                            <a href="{{ route('login') }}" class="font-weight-bold text-decoration-none text-green">
                                                Masuk
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
