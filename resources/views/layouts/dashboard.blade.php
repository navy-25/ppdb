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
    </head>
    <body>
        <div class="main-wrapper">
            @include('includes.sidebar')
            <div class="page-wrapper">
                @include('includes.nav')
                <div class="page-content">
                    @yield('content')
                </div>
                @include('includes.footer')
            </div>
        </div>
        @include('includes.script')
    </body>
</html>
