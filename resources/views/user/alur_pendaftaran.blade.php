@extends('layouts.landing')
@section('title')
Alur Pendaftaran
@endsection
@section('css')
@endsection
@section('content')
<div class="container-fluid">
    <div class="row px-2 br-1 py-1 mb-5" style="background: rgb(230, 230, 230)">
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a class="text-decoration-none text-black breadcump-black" href="/">Beranda</a></li>
                <li class="breadcrumb-item active font-weight-bold text-green" aria-current="page">Alur Pendaftaran</li>
            </ol>
        </nav>
    </div>
    <div class="row">
        <div class="col-12 text-center font-weight-bold h4 mb-3">Alur Pendaftaran</div>
        <div class="col-12 mb-3">
            <hr class="" style="width: 100px">
        </div>
        <div class="col-12 col-lg-9 col-md-9 mb-3">
            <div class="col-12 mb-1">
                <img src="{{ asset('assets/uploads/landing/'.$data->file) }}" width="100%" alt="">
            </div>
        </div>
        <div class="col-12 col-lg-3 col-md-3">
            @include('includes.sidebar_user')
        </div>
    </div>
</div>
@endsection
