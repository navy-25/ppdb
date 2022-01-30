<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <title>{{ config('app.name') }}</title>

        @include('includes.head')
        @include('includes.css')

        <style>
            @media screen and (max-width: 768px) {
                .main-wrapper .page-wrapper {
                    background: #727cf5;
                    width: 100%;
                    height: 100%;
                    background-image: url("../../../assets/images/login-banner-2.jpg");
                    background-size: cover;
                    background-position: center;
                    background-repeat: no-repeat;
                }
                .card{
                    background-color: rgba(204, 204, 204, 0.651) !important;
                    backdrop-filter: blur(10px);
                    -webkit-backdrop-filter: blur(10px);
                    border: transparent;
                    padding-left: 10%;
                    padding-right: 10%;
                }
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
