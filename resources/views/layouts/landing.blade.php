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
        </style>
    </head>
    <body>
        <div class="nav-bar-bottom text-center d-flex">
            <a href="" class="text-white p-3" style="text-decoration: none;width:calc(100vw/3)">
                <p class="text-black font-weight-bold py-2 w-100 h-100">Daftar</p>
            </a>
            <a href="" class="text-white p-2" style="text-decoration: none;width:calc(100vw/3)">
                <i class="text-warning py-2 w-100 h-100 " width="40" height="40" data-feather="search"></i>
            </a>
            <a href="{{ route('login') }}" class="text-white p-3" style="text-decoration: none;width:calc(100vw/3)">
                <p class="text-black font-weight-bold py-2 w-100 h-100">Masuk</p>
            </a>
        </div>
        <div class="main-wrapper">
            <div class="page-wrapper">
                @include('includes.nav_user')
                <div class="page-content">
                    @yield('content')
                </div>
                @yield('footer')
                @include('includes.footer')
            </div>
        </div>
        @include('includes.script')
    </body>
</html>
