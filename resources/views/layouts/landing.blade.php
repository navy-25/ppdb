<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta name="generator" content="HubSpot">

        <meta name="author" content="ViProject | Muhammad Nafi Maula Hakim">
        <meta name="description" content="Aplikasi voting berbasis web, mempermudah pengelola untuk melakukan pemilihan umum (voting) secara custom, realtime, akurat dan terstruktur">
        <meta name="robots" content="noindex,nofollow">

        <link rel="kanonik" href="" >
        <title>
            @yield('title') - {{ config('app.name') }}
        </title>
        @include('includes.head')
        @include('includes.css')
        <style>
            .main-wrapper .page-wrapper {
                width: 100% !important;
                margin-left: 0px !important;
            }
            .navbar {
                width: 100% !important;
                left: 0px !important;
            }
            .nav-bar-bottom{
                opacity: 0%;
                background: white;
                position:fixed;
                z-index:999;
                bottom: 0px;
                left: 0px;
                height: 70px;
                border-radius: 15px 15px 0px 0px;
                width: 100% !important;
                box-shadow: 0 0 10px 10px rgba(105, 105, 105, 0.164);
            }
            @media (max-width: 640px){
                .nav-bar-bottom{
                    opacity: 100%;
                    background: white;
                    position:fixed;
                    z-index:999;
                    bottom: 0px;
                    left: 0px;
                    height: 70px;
                    border-radius: 15px 15px 0px 0px;
                    width: 100% !important;
                    box-shadow: 0 0 10px 10px rgba(105, 105, 105, 0.164);
                }
            }
            html,body{
                font-family: 'Poppins' !important;
                margin: 0px !important;
                padding: 0px !important;
            }
            .main-wrapper .page-wrapper .page-content {
                margin-top: 20px;
            }
            .carousel-item {
                height: 650px;
                background-position: center !important;
                background-repeat: no-repeat !important;
                background-size: cover !important;
            }
            .header{
                position:absolute;
                width:100%;
                height:650px;
                z-index:2;
            }
            .navbar {
                background: linear-gradient(153.85deg, #13903d 0%, #0a772e 98.59%) !important;
                border: none !important;
                backdrop-filter: blur(10px);
                -webkit-backdrop-filter: blur(10px);
            }
            .filter-black{
                position:absolute;
                background: black !important;
                filter:opacity(70%);
                width:100%;
                height:650px;
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
            .footer-landing{
                z-index: 9999 !important;
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
                    height: 820px;
                    background-position: center !important;
                    background-repeat: no-repeat !important;
                    object-fit: cover !important;
                }
                .img-carousel{
                    height: 820px !important;
                    background-position: center !important;
                    background-repeat: no-repeat !important;
                    object-fit: cover !important;
                }
                .filter-black{
                    height:820px;
                }
                .text-header{
                    position:absolute;
                    z-index:4;
                    padding-top:150px;
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
                .footer-landing{
                    padding-bottom: 100px !important;
                    z-index: 97 !important;
                }
            }
            /* cek status peendaftaran */
            .search-status{
                width: 100%;
                border-radius: 50px;
                border: 1px solid rgb(186, 186, 186);
                padding:15px;
                padding-left:25px;
            }
            .search-status:focus{
                border: 1px solid #13903d;
            }
            /* end cek status pendaftaran */
        </style>
        <script src="{{ asset('/assets/js/carousel-rtl.js') }}"></script>
        <script src="{{ asset('/assets/js/carousel.js') }}"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
        <script>
            var myCarousel = document.querySelector('#banner_carrousel')
            var carousel = new bootstrap.Carousel(myCarousel, {
                wrap: true,
                interval: 10000,
            })
        </script>
    </head>
    <body>
        <div class="nav-bar-bottom text-center d-flex">
            <a href="/" class="text-white p-3" style="text-decoration: none;width:calc(100vw/3)">
                {{-- <p class="text-black font-weight-bold py-2 w-100 h-100">Beranda</p> --}}
                <i class="text-green py-2 w-100 h-100 " width="40" height="40" data-feather="home"></i>
            </a>
            <a href="{{ route('cek_status_pendaftaran') }}" class="text-white p-3" style="text-decoration: none;width:calc(100vw/3)">
                <i class="text-green py-2 w-100 h-100 " width="40" height="40" data-feather="search"></i>
            </a>
            <a href="" class="text-white p-3" style="text-decoration: none;width:calc(100vw/3)">
                {{-- <p class="text-black font-weight-bold py-2 w-100 h-100">Daftar</p> --}}
                <i class="text-green py-2 w-100 h-100 " width="40" height="40" data-feather="user-plus"></i>
            </a>
        </div>
        <div class="main-wrapper">
            <div class="page-wrapper">
                @include('includes.nav_user')
                <div class="page-content">
                    @yield('content')
                </div>
                @include('includes.footer_user')
            </div>
        </div>
        @include('includes.script')
    </body>
</html>
