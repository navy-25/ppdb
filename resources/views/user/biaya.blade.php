@extends('layouts.landing')
@section('title')
Biaya
@endsection
@section('css')
<style>
    table,td,tr,th{
        vertical-align: top !important;
    }
</style>
@endsection
@section('content')
<div class="container-fluid">
    <div class="row px-2 br-1 py-1 mb-5" style="background: rgb(230, 230, 230)">
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a class="text-decoration-none text-black breadcump-black" href="/">Beranda</a></li>
                <li class="breadcrumb-item active font-weight-bold text-green" aria-current="page">Biaya Pendaftaran</li>
            </ol>
        </nav>
    </div>
    <div class="row">
        <div class="col-12 text-center font-weight-bold h4 mb-3">Biaya Pendaftaran</div>
        <div class="col-12 mb-3">
            <hr class="" style="width: 100px">
        </div>
        <div class="col-12 col-lg-9 col-md-9 mb-3">
            <div class="col-12 mb-1">
                @foreach ($data['category'] as $index => $category)
                    <table class="mb-4">
                        <tbody>
                            @php
                                $Biaya = \App\Models\Biaya::where('id_category',$category->id)->orderBy('id', 'ASC')->get();
                                $total = \App\Models\Biaya::where('id_category',$category->id)->sum('total');
                            @endphp
                            @if (count($Biaya) != 0)
                                <tr class="font-weight-bold" style="font-size:20px;height:40px">
                                    <td style="width:30px !important">{{ ++$index }}.</td>
                                    <td colspan="3">{{ $category->name }} (Total : {{ "Rp. " . number_format($total, 0, ".", ".")}})</td>
                                </tr>
                                @foreach ($Biaya as $number => $biaya)
                                    <tr style="font-size:15px;">
                                        <td style="height:30px"></td>
                                        <td style="border-bottom:1px solid rgba(0, 0, 0, 0.116) ;width:30px !important">{{ ++$number }}. </td>
                                        <td style="border-bottom:1px solid rgba(0, 0, 0, 0.116) ;width: 500px">{{  $biaya->name }}</td>
                                        <td style="border-bottom:1px solid rgba(0, 0, 0, 0.116);text-align:right">{{ "Rp. " . number_format($biaya->total, 0, ".", ".")}}</td>
                                    </tr>
                                @endforeach
                            @endif
                        </tbody>
                    </table>
                @endforeach
                <br><br>
            </div>
        </div>
        <div class="col-12 col-lg-3 col-md-3">
            @include('includes.sidebar_user')
        </div>
    </div>
</div>
@endsection
