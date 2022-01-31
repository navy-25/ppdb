@extends('layouts.landing')
@section('title')
Penerimaan Peserta Didik Baru
@endsection
@section('css')
<style>
    html,body{
        font-family: 'Poppins' !important;
        margin: 0px !important;
        padding: 0px !important;
    }
    .main-wrapper .page-wrapper .page-content {
        margin-top: 20px;
    }
    .carousel-item {
        height: 600px;
        background-position: center !important;
        background-repeat: no-repeat !important;
        background-size: cover !important;
    }
    .header{
        position:absolute;
        width:100%;
        height:600px;
        z-index:2;
    }
    .navbar {
        background: rgba(5, 5, 5, 0.466) !important;
        border: none !important;
        backdrop-filter: blur(10px);
        -webkit-backdrop-filter: blur(10px);
    }
    .filter-black{
        position:absolute;
        background: black !important;
        filter:opacity(70%);
        width:100%;
        height:600px;
        z-index:3;
    }
    .text-header{
        position:absolute;
        z-index:4;
        padding-top:200px;
        filter:opacity(100%) !important;
        padding-left: 50px;
        width: 90% !important;
    }
    .navbar .navbar-nav .nav-item .btn{
        float: right !important;
    }
    .left{
        margin-left: 0px !important;
        display: none !important;
    }
    @media (max-width: 991px){
        .navbar .navbar-content {
            width: 100% !important;
        }
        .text-header{
            position:absolute;
            z-index:4;
            padding-top:100px;
            filter:opacity(100%) !important;
            padding-left: 50px;
            width: 85% !important;
        }
        .carousel-item {
            height: 470px;
            background-position: center !important;
            background-repeat: no-repeat !important;
            background-size: cover !important;
        }
        .filter-black{
            height:470px;
        }
        .img-header{
            display: none !important;
        }
    }
    @media (max-width: 640px){
        .navbar .navbar-content{
            width: 100% !important;
            height: 100% !important;
            align-items: center !important;
        }
        .left{
            margin-left: 0px !important;
            display: block !important;
        }
        .carousel-item {
            height: 620px;
            background-position: center !important;
            background-repeat: no-repeat !important;
            background-size: cover !important;
        }
        .img-carousel{
            height: 620px !important;
            background-position: center !important;
            background-repeat: no-repeat !important;
            background-size: cover !important;
        }
        .filter-black{
            height:620px;
        }
        .text-header{
            position:absolute;
            z-index:4;
            padding-top:100px;
            filter:opacity(100%) !important;
            padding-left: 20px;
            width: 90% !important;
        }
        .img-header{
            display: none !important;
        }
        .search-form{
            display: none !important;
            margin: 0px !important;
        }
    }
</style>
@endsection
@section('script')
    <script type="text/javascript">
        $('#sidebarCollapse').on('click',function(){
            $("#sidebar, #content").toggleClass("active");
        })
    </script>
    <script src="{{ asset('/assets/js/carousel-rtl.js') }}"></script>
    <script src="{{ asset('/assets/js/carousel.js') }}"></script>
    <script>
        var myCarousel = document.querySelector('#banner_carrousel')
        var carousel = new bootstrap.Carousel(myCarousel, {
            wrap: true,
            interval: 15000,
        })
    </script>
@endsection
@section('content')
<div class="container-fluid">
    <div class="row px-4">
        <div class="col-12 text-center font-weight-bold h4 mb-3">Informasi Calon Siswa Baru</div>
        <div class="col-12 mb-3">
            <hr class="" style="width: 100px">
        </div>
        <div class="col-lg-4 col-md-6 col-6 text-center grid-margin stretch-card mb-1">
            <a href="" class="grid-margin stretch-card  w-100">
                <div class="card">
                    <div class="card-body">
                        <i class="mb-4 text-warning" width="50" height="50" data-feather="clipboard"></i>
                        <p class="text-black font-weight-bold">Syarat Pendaftaran</p>
                    </div>
                </div>
            </a>
        </div>
        <div class="col-lg-4 col-md-6 col-6 text-center grid-margin stretch-card mb-1">
            <a href="" class="grid-margin stretch-card  w-100">
                <div class="card">
                    <div class="card-body">
                        <i class="mb-4 text-warning" width="50" height="50" data-feather="calendar"></i>
                        <p class="text-black font-weight-bold">Jadwal</p>
                    </div>
                </div>
            </a>
        </div>
        <div class="col-lg-4 col-md-6 col-6 text-center grid-margin stretch-card mb-1">
            <a href="" class="grid-margin stretch-card  w-100">
                <div class="card">
                    <div class="card-body">
                        <i class="mb-4 text-warning" width="50" height="50" data-feather="dollar-sign"></i>
                        <p class="text-black font-weight-bold">Biaya</p>
                    </div>
                </div>
            </a>
        </div>
        <div class="col-lg-4 col-md-6 col-6 text-center grid-margin stretch-card mb-1">
            <a href="" class="grid-margin stretch-card  w-100">
                <div class="card">
                    <div class="card-body">
                        <i class="mb-4 text-warning" width="50" height="50" data-feather="book-open"></i>
                        <p class="text-black font-weight-bold">Booklet</p>
                    </div>
                </div>
            </a>
        </div>
        <div class="col-lg-4 col-md-6 col-6 text-center grid-margin stretch-card mb-1">
            <a href="" class="grid-margin stretch-card  w-100">
                <div class="card">
                    <div class="card-body">
                        <i class="mb-4 text-warning" width="50" height="50" data-feather="layers"></i>
                        <p class="text-black font-weight-bold">Alur Pendaftaran</p>
                    </div>
                </div>
            </a>
        </div>
        <div class="col-lg-4 col-md-6 col-6 text-center grid-margin stretch-card mb-1">
            <a href="" class="grid-margin stretch-card  w-100">
                <div class="card">
                    <div class="card-body">
                        <i class="mb-4 text-warning" width="50" height="50" data-feather="search"></i>
                        <p class="text-black font-weight-bold">Cek Status Daftar</p>
                    </div>
                </div>
            </a>
        </div>
    </div>
</div>
@endsection
@section('footer')
    <div class="bg-warning-gradient row px-4 py-4">
        <div class="col-12 col-lg-6 col-md mb-4">
            <div class="row">
                <div class="col-12 h4 text-white mb-3">
                    Kontak Kami
                </div>
                <div class="col-12">
                    <p class="text-white  mb-2">
                        <i class="text-white mr-2" width="13" height="13" data-feather="map-pin"></i>
                        Jalan Empu Jatmika Sungai Malang Amuntai Tengah 71471 Hulu Sungai Utara Kalimantan Selatan
                    </p>
                    <p class="text-white">
                        <i class="text-white mr-2" width="13" height="13" data-feather="phone"></i>
                        +62 527 61009
                    </p>
                </div>
            </div>
        </div>
        <div class="col-12 col-lg-6 col-md">
            <div class="row">
                <div class="col-12 h4 text-white mb-3">
                    Menu
                </div>
                <div class="col-12 col-lg-6 col-md-6">
                    <p class="text-white  mb-2">
                        <a href="" class="text-white" style="text-decoration: none">
                            <i class="text-white mr-2" width="13" height="13" data-feather="clipboard"></i>
                            Syarat Pendaftaran
                        </a>
                    </p>
                    <p class="text-white  mb-2">
                        <a href="" class="text-white" style="text-decoration: none">
                            <i class="text-white mr-2" width="13" height="13" data-feather="calendar"></i>
                            Jadwal
                        </a>
                    </p>
                    <p class="text-white  mb-2">
                        <a href="" class="text-white" style="text-decoration: none">
                            <i class="text-white mr-2" width="13" height="13" data-feather="dollar-sign"></i>
                            Biaya
                        </a>
                    </p>
                    <p class="text-white  mb-2">
                        <a href="" class="text-white" style="text-decoration: none">
                            <i class="text-white mr-2" width="13" height="13" data-feather="book-open"></i>
                            Booklet
                        </a>
                    </p>
                </div>
                <div class="col-12 col-lg-6 col-md-6">
                    <p class="text-white  mb-2">
                        <a href="" class="text-white" style="text-decoration: none">
                            <i class="text-white mr-2" width="13" height="13" data-feather="layers"></i>
                            Alur Pendaftaran
                        </a>
                    </p>
                    <p class="text-white  mb-2">
                        <a href="" class="text-white" style="text-decoration: none">
                            <i class="text-white mr-2" width="13" height="13" data-feather="search"></i>
                            Pengumuman
                        </a>
                    </p>
                    <p class="text-white  mb-2">
                        <a href="{{ route('login') }}" class="text-white" style="text-decoration: none">
                            <i class="text-white mr-2" width="13" height="13" data-feather="log-in"></i>
                            Masuk Admin
                        </a>
                    </p>
                </div>
            </div>
        </div>
    </div>
@endsection