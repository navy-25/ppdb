@extends('layouts.landing')
@section('title')
Penerimaan Peserta Didik Baru
@endsection
@section('content')
<div class="container-fluid">
    <div class="row px-4">
        <div class="col-12 text-center font-weight-bold h4 mb-3">Informasi Calon Siswa Baru</div>
        <div class="col-12 mb-3">
            <hr class="" style="width: 100px">
        </div>
        <div class="col-lg-4 col-md-6 col-6 text-center grid-margin stretch-card mb-1">
            <a href="{{ route('syarat_pendaftaran') }}" class="grid-margin stretch-card  w-100">
                <div class="card">
                    <div class="card-body">
                        <i class="mb-4 text-green" width="50" height="50" data-feather="clipboard"></i>
                        <p class="text-black font-weight-bold">Syarat Pendaftaran</p>
                    </div>
                </div>
            </a>
        </div>
        <div class="col-lg-4 col-md-6 col-6 text-center grid-margin stretch-card mb-1">
            <a href="{{ route('jadwal') }}" class="grid-margin stretch-card  w-100">
                <div class="card">
                    <div class="card-body">
                        <i class="mb-4 text-green" width="50" height="50" data-feather="calendar"></i>
                        <p class="text-black font-weight-bold">Jadwal</p>
                    </div>
                </div>
            </a>
        </div>
        <div class="col-lg-4 col-md-6 col-6 text-center grid-margin stretch-card mb-1">
            <a href="{{ route('biaya') }}" class="grid-margin stretch-card  w-100">
                <div class="card">
                    <div class="card-body">
                        <i class="mb-4 text-green" width="50" height="50" data-feather="dollar-sign"></i>
                        <p class="text-black font-weight-bold">Biaya</p>
                    </div>
                </div>
            </a>
        </div>
        <div class="col-lg-4 col-md-6 col-6 text-center grid-margin stretch-card mb-1">
            <a href="{{ asset('assets/uploads/landing/booklet.pdf') }}" target="_blank" class="grid-margin stretch-card  w-100">
                <div class="card">
                    <div class="card-body">
                        <i class="mb-4 text-green" width="50" height="50" data-feather="book-open"></i>
                        <p class="text-black font-weight-bold">Booklet</p>
                    </div>
                </div>
            </a>
        </div>
        <div class="col-lg-4 col-md-6 col-6 text-center grid-margin stretch-card mb-1">
            <a href="{{ route('alur_pendaftaran') }}" class="grid-margin stretch-card  w-100">
                <div class="card">
                    <div class="card-body">
                        <i class="mb-4 text-green" width="50" height="50" data-feather="layers"></i>
                        <p class="text-black font-weight-bold">Alur Pendaftaran</p>
                    </div>
                </div>
            </a>
        </div>
        <div class="col-lg-4 col-md-6 col-6 text-center grid-margin stretch-card mb-1">
            <a href="{{ route('cek_status_pendaftaran') }}" class="grid-margin stretch-card  w-100">
                <div class="card">
                    <div class="card-body">
                        <i class="mb-4 text-green" width="50" height="50" data-feather="search"></i>
                        <p class="text-black font-weight-bold">Cek Status Daftar</p>
                    </div>
                </div>
            </a>
        </div>
    </div>
</div>
@endsection
