@extends('layouts.landing')
@section('title')
Cek Status Pendaftaran
@endsection
@section('css')
<style>
    .header, #banner_carrousel{
        display: none !important;
    }
    .card-status-pendaftaran{
        text-decoration: none;
        border-radius: 15px;
        border: 1px solid rgb(186, 186, 186);
        transition: all 0.8s;
    }
    .card-status-pendaftaran:hover{
        border: 1px solid #13903d;
        color: black;
    }
</style>
@endsection
@section('content')
<div class="container-fluid">
    <div class="row px-2 br-1 py-1 mb-5 mt-5" style="background: rgb(230, 230, 230)">
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a class="text-decoration-none text-black breadcump-black" href="/">Beranda</a></li>
                <li class="breadcrumb-item active font-weight-bold text-green" aria-current="page">Cek Status Pendaftaran</li>
            </ol>
        </nav>
    </div>
    <div class="row">
        <div class="col-12 text-center font-weight-bold h4 mb-3">Cek Status Pendaftaran</div>
        <div class="col-12 mb-3">
            <hr class="" style="width: 100px">
        </div>
        <div class="col-12">
            <div class="row mb-4">
                <form action="" class="col-12 col-lg-8 col-md-8 mx-auto d-flex">
                    @csrf
                    <input type="text" class="w-100 search-status mr-4" name="pencarian" placeholder="Cari berdasarkan nama, nomor pendaftaran, NIS, NISN ...">
                    <span>
                        <button type="submit" class="btn btn-green" style="width: 100%; height: 100%;border-radius:100%">
                            <i class="text-white" data-feather="search"></i>
                        </button>
                    </span>
                </form>
            </div>
            @if ($data != null)
                <div class="row mt-5 pt-3 px-3">
                    @foreach ($data as $x)
                        <div class="col-12 col-lg-8 col-md-8 mx-auto bg-white p-4 card-status-pendaftaran mb-3 text-black">
                            <div class="row">
                                <div class="col-4 col-lg-2 col-md-2">
                                    <img src="{{ asset('assets/images/placeholder.jpg') }}" width="80px" height="100px"  style="border-radius: 10px;object-fit:cover" alt="">
                                </div>
                                <div class="col-8 col-lg-6 col-md-6">
                                    <div class="row">
                                        <div class="col-12 col-lg-12 col-md-12 mb-2">
                                            <h5 class="text-green">
                                                {{ $x->nama_lengkap }}
                                            </h5>
                                        </div>
                                        <div class="col-12 col-lg-6 col-mg-6 mb-2">
                                            <small>Status</small>
                                            @if ($x->status == "Lulus")
                                                <h5 class="text-green">
                                                    Dinyatakan {{ $x->status }}
                                                </h5>
                                            @elseif ($x->status == "Calon Pendaftar")
                                                <h5 class="text-orange">
                                                    Proses Pengecekan
                                                </h5>
                                            @else
                                                <h5 class="text-danger">
                                                    Dinyatakan Tidak Lulus
                                                </h5>
                                            @endif
                                        </div>
                                    </div>
                                </div>
                                <div class="col-12 col-lg-4 col-md-4">
                                    <div class="row">
                                        <div class="col-12 mb-2">
                                            <button type="button" class="btn btn-green text-white float-right btn-icon-text py-1">
                                                <i class="text-white" data-feather="printer" width="16" class="btn-icon-prepend"></i>
                                                <span class="ml-2">Cetak Kartu</span>
                                            </button>
                                        </div>
                                        <div class="col-12">
                                            @if ($x->jalur == "Regular")
                                                <a href="{{ asset('assets/uploads/landing/soal_test_regular.pdf') }}" target="_blank"  class="btn btn-secondary text-white float-right btn-icon-text py-1">
                                                    <i class="text-white" data-feather="file-text" width="16" class="btn-icon-prepend"></i>
                                                    <span class="ml-2">Download Soal Test</span>
                                                </a>
                                            @endif
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            @endif
        </div>
    </div>
</div>
@endsection