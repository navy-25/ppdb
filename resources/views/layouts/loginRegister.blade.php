<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <title>@yield('title') - {{ config('app.name') }}</title>

        @include('includes.head')
        @include('includes.css')

        <style>
            @media screen and (max-width: 768px) {
                .main-wrapper .page-wrapper {
                    background: #be7723;
                    width: 100%;
                    height: 100%;
                    background-image: url("../../../assets/images/login-banner-2.jpg");
                    background-size: cover;
                    background-position: center;
                    background-repeat: no-repeat;
                }
                .card{
                    background-color: rgba(255, 255, 255, 0.651) !important;
                    backdrop-filter: blur(10px);
                    -webkit-backdrop-filter: blur(10px);
                    border: transparent;
                    padding-left: 10%;
                    padding-right: 10%;
                }
            }
            .spinner-border {
                width: 16px !important;
                height: 16px !important;
                margin-bottom: 2px !important;
                display: none;
            }
        </style>
    </head>
    <body>
        <div class="main-wrapper">
            @yield('content')
        </div>
        @include('includes.script')
    </body>
</html>
