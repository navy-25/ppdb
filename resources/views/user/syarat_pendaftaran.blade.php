@extends('layouts.landing')
@section('title')
Syarat dan Pendaftaran
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
                <li class="breadcrumb-item active font-weight-bold text-green" aria-current="page">Syarat dan Pendaftaran</li>
            </ol>
        </nav>
    </div>
    <div class="row">
        <div class="col-12 text-center font-weight-bold h4 mb-3">Prosedur dan Syarat Pendaftaran</div>
        <div class="col-12 mb-3">
            <hr class="" style="width: 100px">
        </div>
        <div class="col-12 col-lg-9 col-md-9 mb-3">
            <div class="col-12 mb-1">
                @foreach ($data['category'] as $index => $category)
                    <table class="mb-2">
                        <tbody>
                            @php
                                $Persyaratan = \App\Models\Persyaratan::where('sub_persyaratan','')->where('id_category',$category->id)->orderBy('number', 'ASC')->get();
                            @endphp
                            @if (count($Persyaratan) != 0)
                                <tr class="font-weight-bold" style="font-size:20px;">
                                    <td style="width:30px !important">{{ ++$index }}.</td>
                                    <td colspan="3">{{ $category->name }}</td>
                                </tr>
                                @foreach ($Persyaratan as $number => $persyaratan)
                                    @php
                                        $sub_persyaratan = \App\Models\Persyaratan::where('sub_persyaratan',$persyaratan->id)->where('id_category',$category->id)->orderBy('number', 'ASC')->get();
                                    @endphp
                                    <tr style="font-size:15px;">
                                        <td></td>
                                        <td style="width:30px !important">{{ ++$number }}. </td>
                                        <td colspan="2">{{  $persyaratan->name }}</td>
                                    </tr>
                                    @php
                                        $abjad = ['a','b','c','d','e','f','g','h','i','j','k','l','m','n','o','p','q','r','s','t','u','v','w','x','y','z'];
                                    @endphp
                                    @foreach ($sub_persyaratan as $no => $sp)
                                        <tr style="font-size:15px;">
                                            <td></td>
                                            <td></td>
                                            <td style="width:30px !important">{{ $abjad[$no] }}. </td>
                                            <td>{{  $sp->name }}</td>
                                        </tr>
                                    @endforeach
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
