@extends('layouts.dashboard')

@section('title')
Jadwal Test
@endsection

@section('jadwal_test')
active
@endsection

@section('css')
    <link rel="stylesheet" href="{{ asset('/assets/vendors/bootstrap-datepicker/bootstrap-datepicker.min.css') }}" />
@endsection

@section('script')
<script src="{{ asset('/assets/vendors/bootstrap-datepicker/bootstrap-datepicker.min.js') }}"></script>
    <script src="{{ asset('/assets/js/datepicker.js') }}"></script>
    <script>
        $('.datepicker').datepicker();
    </script>
@endsection

@section('content')
<div class="row mb-3">
    <div class="col-12">
        <h6 class="card-title">Perbarui jadwal test</h6>
    </div>
</div>
<div class="row">
    <div class="col-12 col-lg-8 col-md-8 order-2 order-lg-1 order-md-1">
        <div class="card">
            <div class="card-body">
                @php
                    date_default_timezone_set('Asia/Jakarta');
                    if($data == null){
                        $tanggal_mulai = date('m/d/Y');
                        $tanggal_selesai = date('m/d/Y', strtotime(date('Y-m-d'). ' + 3 days'));
                        $jam_mulai = sprintf("%02d",7);
                        $menit_mulai = sprintf("%02d",0);
                        $jam_selesai = sprintf("%02d",23);
                        $menit_selesai = sprintf("%02d",59);
                    }else{
                        $tanggal_mulai = $data->tanggal_mulai;
                        $tanggal_selesai = $data->tanggal_selesai;
                        $jam_mulai = explode(':',$data->jam_mulai)[0];
                        $menit_mulai = explode(':',$data->jam_mulai)[1];

                        $jam_selesai = explode(':',$data->jam_selesai)[0];
                        $menit_selesai = explode(':',$data->jam_selesai)[1];
                    }
                @endphp
                @if ($data == null)
                    <div class="alert alert-danger" role="alert">
                        <p>Kartu peserta tidak akan bisa di download jiak, anda belum menentukan jadwal tes!</p>
                    </div>
                @endif
                <form class="forms-sample" method="POST" action="{{ route('jadwal_test_set') }}">
                    @csrf
                    <div class="row">
                        <div class="col-12">
                            <label>Waktu Mulai (mm/dd/yyyy)*</label>
                        </div>
                        <div class="col-6 col-lg-6 col-md-6 mb-3">
                            <div class="form-group">
                                <div class="input-group date datepicker">
                                    <input type="text" name="tanggal_mulai" value="{{ $tanggal_mulai }}" autocomplete="off"  class="form-control" placeholder="mm/dd/yyyy" required/>
                                    <span class="input-group-addon"><i data-feather="calendar"></i></span>
                                </div>
                            </div>
                        </div>
                        <div class="col-6 col-lg-6 col-md-6">
                            <div class="form-group">
                                <div class="row">
                                    <div class="col-6 pr-0">
                                        <select class="form-control" style="border-radius:0px !important" name="jam_mulai" data-width="100%">
                                            @for ($i = 0;$i<24;$i++)
                                                <option value="{{ sprintf("%02d",$i) }}" {{ $i == $jam_mulai ? 'selected' : '' }}>{{ sprintf("%02d",$i) }}</option>
                                            @endfor
                                        </select>
                                    </div>
                                    <div class="col-6 pl-0">
                                        <select class="form-control" style="border-radius:0px !important" name="menit_mulai" data-width="100%">
                                            @for ($i = 0;$i<60;$i++)
                                                <option value="{{ sprintf("%02d",$i) }}" {{ $i == $menit_mulai ? 'selected' : '' }}>{{ sprintf("%02d",$i) }}</option>
                                            @endfor
                                        </select>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-12">
                            <label>Waktu Selesai (mm/dd/yyyy)*</label>
                        </div>
                        <div class="col-6 col-lg-6 col-md-6">
                            <div class="form-group">
                                <div class="input-group date datepicker">
                                    <input type="text" name="tanggal_selesai" autocomplete="off" value="{{ $tanggal_selesai }}" class="form-control" placeholder="mm/dd/yyyy" required/>
                                    <span class="input-group-addon"><i data-feather="calendar"></i></span>
                                </div>
                            </div>
                        </div>
                        <div class="col-6 col-lg-6 col-md-6">
                            <div class="form-group">
                                <div class="row">
                                    <div class="col-6 pr-0">
                                        <select class="form-control" style="border-radius:0px !important" name="jam_selesai" data-width="100%">
                                            @for ($i = 0;$i<24;$i++)
                                                <option value="{{ sprintf("%02d",$i) }}" {{ $i == $jam_selesai ? 'selected' : '' }}>{{ sprintf("%02d",$i) }}</option>
                                            @endfor
                                        </select>
                                    </div>
                                    <div class="col-6 pl-0">
                                        <select class="form-control" style="border-radius:0px !important" name="menit_selesai" data-width="100%">
                                            @for ($i = 0;$i<60;$i++)
                                                <option value="{{ sprintf("%02d",$i) }}" {{ $i == $menit_selesai ? 'selected' : '' }}>{{ sprintf("%02d",$i) }}</option>
                                            @endfor
                                        </select>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="mt-2 d-flex">
                        <button type="submit" id="submit_button"  class="btn btn-warning mr-2 mb-2 mb-md-0 text-white">
                            Simpan
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <div class="col-12 col-lg-4 col-md-4 order-1 order-lg-2 order-md-2 mb-2">
        <div class="card">
            @if ($data == null)
                <div class="card-body text-center" style="background: rgb(255, 63, 63);border-radius:10px">
                    <h4 class="text-white font-weight-bold">Waktu tes Belum Di atur</h4>
                </div>
            @else
                <div class="card-body text-center" style="border:1px solid #e9af00;border-radius:10px">
                    <h4 class="text-orange font-weight-bold">Waktu tes</h4>
                    <hr>
                    <div class="row">
                        <div class="col-5">
                            <b class="text-success">Mulai </b> <br><br>
                            Tangal {{ date('d M Y', strtotime($tanggal_mulai)) }} <br>
                            Pukul {{ $jam_mulai }}:{{ $menit_mulai }}
                        </div>
                        <div class="col-2 text-center">
                            <br>
                            <br>
                            -
                        </div>
                        <div class="col-5">
                            <b class="text-danger">Selesai </b> <br><br>
                            Tangal {{ date('d M Y', strtotime($tanggal_selesai)) }} <br>
                            Pukul {{ $jam_selesai }}:{{ $menit_selesai }}</div>
                    </div>
                </div>
            @endif
        </div>
    </div>
</div>
@endsection
