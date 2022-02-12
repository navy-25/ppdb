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
                    <input type="text" class="w-100 search-status mr-4" name="pencarian" placeholder="Cari berdasarkan nama, nomor pendaftaran, No. KK, atau NISN">
                    <span>
                        <button type="submit" class="btn btn-green" style="width: 100%; height: 100%;border-radius:100%">
                            <i class="text-white" data-feather="search"></i>
                        </button>
                    </span>
                </form>
            </div>
            @if ($data != null && isset($_GET['pencarian']) == true)
                @if(strlen($_GET['pencarian']) < 4);
                    <div class="col-12 col-lg-8 col-md-8 d-flex mx-auto">
                        <div class="alert alert-info w-100" role="alert">
                            <h4 class="alert-heading mb-2">Opps, Sory data kamu tidak ditemukan</h4>
                            <p>Masukkan setidaknya minimal 4 huruf.</p>
                        </div>
                    </div>
                @else
                    @if (count($data) == 0)
                        <div class="col-12 col-lg-8 col-md-8 d-flex mx-auto">
                            <div class="alert alert-info w-100" role="alert">
                                <h4 class="alert-heading mb-2">Opps, Sory data kamu tidak ditemukan</h4>
                                <p>Kamu bisa cari data kamu, berdasarkan nama lengkap, nomor pendaftaran, nomor peserta, nisn, atau no kartu keluarga (KK). Silahkan coba lagi !.</p>
                            </div>
                        </div>
                    @else
                        <div class="row mt-5 pt-3 px-3">
                            @foreach ($data as $x)
                                <div class="col-12 col-lg-8 col-md-8 mx-auto bg-white p-4 card-status-pendaftaran mb-3 text-black">
                                    <div class="row">
                                        <div class="col-4 col-lg-2 col-md-2">
                                            @if($x->photo == null)
                                                <img src="{{ asset('assets/images/placeholder.jpg') }}" width="80px" height="100px"  style="border-radius: 10px;object-fit:cover" alt="">
                                            @else
                                                <img src="{{ asset('assets/uploads/calon siswa/'.$x->photo) }}" width="80px" height="100px"  style="border-radius: 10px;object-fit:cover" alt="">
                                            @endif
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
                                                <div class="col-12 col-lg-6 col-mg-6 mb-2">
                                                    <small>Jurusan</small>
                                                    <br>
                                                    <b>{{$x->jurusan}} ({{$x->jalur}})</b>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-12 col-lg-4 col-md-4">
                                            <div class="row">
                                                @if ($x->status == "Lulus")
                                                    <div class="col-12 mb-2">
                                                        <a  target="_blank"  href="{{ route('print_kartu_peserta',['nama_lengkap'=>$x->nama_lengkap,'id'=>$x->id_siswa]) }}" class="btn btn-green text-white float-right btn-icon-text py-1">
                                                            <i class="text-white" data-feather="printer" width="16" class="btn-icon-prepend"></i>
                                                            <span class="ml-2">Cetak Kartu</span>
                                                        </a>
                                                    </div>
                                                    <div class="col-12 mb-2">
                                                        <a href = "{{route('print_sp_wali', ['id' =>  $x->id])}}"
                                                            title="Print Surat Pernyataan Orang Tua / Wali"
                                                            target="_blank"
                                                            class="btn btn-danger text-white float-right btn-icon-text py-1">
                                                            <i class="text-white" data-feather="printer" width="16" class="btn-icon-prepend"></i>
                                                            <span class="ml-2">Surat Pernyataan</span>
                                                        </a>
                                                    </div>
                                                    @if ($x->jalur == "Regular")
                                                        @php
                                                            $nilai_test = \App\Models\NilaiTest::where('id_siswa',$x->id_siswa)->first();
                                                        @endphp
                                                        @if ($nilai_test != null)
                                                            <div class="col-12 mb-2">
                                                                <button class="btn btn-primary text-white float-right btn-icon-text py-1">
                                                                    <i class="text-white" data-feather="star" width="16" class="btn-icon-prepend"></i>
                                                                    <span class="ml-2">Nilai Tes : {{ $nilai_test->nilai }}</span>
                                                                </button>
                                                            </div>
                                                        @else
                                                            <div class="col-12 mb-2">
                                                                <button class="btn btn-primary text-white float-right btn-icon-text py-1">
                                                                    <i class="text-white" data-feather="star" width="16" class="btn-icon-prepend"></i>
                                                                    <span class="ml-2">Nilai Tes : -</span>
                                                                </button>
                                                            </div>
                                                        @endif
                                                    @endif
                                                @elseif ($x->status == "Tidak Lulus")
                                                    <div class="col-12 mb-2">
                                                        <button disabled
                                                            class="btn btn-secondary text-white float-right btn-icon-text py-1">
                                                            <i class="text-white" data-feather="printer" width="16" class="btn-icon-prepend"></i>
                                                            <span class="ml-2">Cetak Kartu</span>
                                                        </button>
                                                    </div>
                                                    <div class="col-12 mb-2">
                                                        <button disabled
                                                            class="btn btn-secondary text-white float-right btn-icon-text py-1">
                                                            <i class="text-white" data-feather="printer" width="16" class="btn-icon-prepend"></i>
                                                            <span class="ml-2">Cetak Kartu</span>
                                                        </button>
                                                    </div>
                                                @else
                                                    <div class="col-12 mb-2">
                                                        <a  target="_blank"  href="{{ route('print_kartu_peserta',['nama_lengkap'=>$x->nama_lengkap,'id'=>$x->id_siswa]) }}" class="btn btn-green text-white float-right btn-icon-text py-1">
                                                            <i class="text-white" data-feather="printer" width="16" class="btn-icon-prepend"></i>
                                                            <span class="ml-2">Cetak Kartu</span>
                                                        </a>
                                                    </div>
                                                    <div class="col-12 mb-2">
                                                        <button disabled
                                                            class="btn btn-secondary text-white float-right btn-icon-text py-1">
                                                            <i class="text-white" data-feather="printer" width="16" class="btn-icon-prepend"></i>
                                                                <span class="ml-2">Surat Pernyataan</span>
                                                        </button>
                                                    </div>
                                                    @if ($x->jalur == "Regular")
                                                        @if ($jadwaltest == null)
                                                            <div class="col-12 mb-2">
                                                                <button disabled class="btn btn-secondary text-white float-right btn-icon-text py-1">
                                                                    <i class="text-white" data-feather="file-text" width="16" class="btn-icon-prepend"></i>
                                                                    <span class="ml-2">Download Soal Test</span>
                                                                </a>
                                                            </div>
                                                        @else
                                                            @php
                                                                date_default_timezone_set('Asia/Jakarta');
                                                                $x = date('Y-m-d', strtotime($jadwaltest->tanggal_mulai));
                                                                $y = date('Y-m-d', strtotime($jadwaltest->tanggal_selesai));
                                                                $time_x = date('H:i', strtotime($jadwaltest->jam_mulai));
                                                                $time_y = date('H:i', strtotime($jadwaltest->jam_selesai));
                                                            @endphp
                                                            @if (date('Y-m-d') >= $x && date('H:i')>$time_x)
                                                                <div class="col-12 mb-2">
                                                                    <a href="{{ asset('assets/uploads/landing/soal_test_regular.pdf') }}" target="_blank"  class="btn btn-primary text-white float-right btn-icon-text py-1">
                                                                        <i class="text-white" data-feather="file-text" width="16" class="btn-icon-prepend"></i>
                                                                        <span class="ml-2">Download Soal Test</span>
                                                                    </a>
                                                                </div>
                                                            @elseif (date('Y-m-d') <= $y && date('H:i')<$time_y)
                                                                <div class="col-12 mb-2">
                                                                    <a href="{{ asset('assets/uploads/landing/soal_test_regular.pdf') }}" target="_blank"  class="btn btn-primary text-white float-right btn-icon-text py-1">
                                                                        <i class="text-white" data-feather="file-text" width="16" class="btn-icon-prepend"></i>
                                                                        <span class="ml-2">Download Soal Test</span>
                                                                    </a>
                                                                </div>
                                                            @elseif (date('Y-m-d') >= $x && date('Y-m-d') <= $y)
                                                                @if (date('H:i')>$time_y)
                                                                    <div class="col-12 mb-2">
                                                                        <button disabled  class="btn btn-secondary text-white float-right btn-icon-text py-1">
                                                                            <i class="text-white" data-feather="file-text" width="16" class="btn-icon-prepend"></i>
                                                                            <span class="ml-2">Download Soal Test</span>
                                                                        </button>
                                                                    </div>
                                                                @else
                                                                    <div class="col-12 mb-2">
                                                                        <a href="{{ asset('assets/uploads/landing/soal_test_regular.pdf') }}" target="_blank"  class="btn btn-primary text-white float-right btn-icon-text py-1">
                                                                            <i class="text-white" data-feather="file-text" width="16" class="btn-icon-prepend"></i>
                                                                            <span class="ml-2">Download Soal Test</span>
                                                                        </a>
                                                                    </div>
                                                                @endif
                                                            @else
                                                                <div class="col-12 mb-2">
                                                                    <button disabled  class="btn btn-secondary text-white float-right btn-icon-text py-1">
                                                                        <i class="text-white" data-feather="file-text" width="16" class="btn-icon-prepend"></i>
                                                                        <span class="ml-2">Download Soal Test</span>
                                                                    </button>
                                                                </div>
                                                            @endif
                                                        @endif
                                                    @endif
                                                @endif
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    @endif
                @endif
            @elseif ($data == null && isset($_GET['pencarian']) == true)
                <div class="col-12 col-lg-8 col-md-8 d-flex mx-auto">
                    <div class="alert alert-info w-100" role="alert">
                        <h4 class="alert-heading mb-2">Opps, Sory data kamu tidak ditemukan</h4>
                        <p>Kamu bisa cari data kamu, berdasarkan nama lengkap, nomor pendaftaran, nomor peserta, nisn, atau no kartu keluarga (KK). Silahkan coba lagi !.</p>
                    </div>
                </div>
            @endif
        </div>
    </div>
</div>
@endsection
