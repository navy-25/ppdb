@extends('layouts.dashboard')

@section('title')
Biodata Peserta
@endsection


@section('css')
<link rel="stylesheet" href="{{ asset('../../../assets/vendors/datatables.net-bs4/dataTables.bootstrap4.css') }}">
<style>
    .t-top{border-top: 1px solid #e8ebf1;}
    .t-bottom{border-bottom: 1px solid #e8ebf1;}
    .t-left{border-left: 1px solid #e8ebf1;}
    .t-right{border-right: 1px solid #e8ebf1;}

    th{font-weight: 300 !important;}
    table th, table td { font-size:10px !important; line-height: 0 !important; }
    .text-desc{text-align: center;padding-top:20px}
    @media screen and (max-width: 480px) {
        .text-desc{text-align: left;padding-top:8px}
        .btn-print{
            float: right;
        }
    }
</style>
@endsection

@section('script')
<script src="{{ asset('../../../assets/js/data-table.js') }}"></script>
<script src="{{ asset('../../../assets/vendors/datatables.net/jquery.dataTables.js') }}"></script>
<script src="{{ asset('../../../assets/vendors/datatables.net-bs4/dataTables.bootstrap4.js') }}"></script>
<script src="{{ asset('../../../assets/js/data-table.js') }}"></script>
<script>
    $("#ppdb").toggleClass("show");

    $(document).ready(function(){
        $("#myTab a").click(function(e){
            e.preventDefault();
            $(this).tab("show");
        });
    });
</script>
@endsection

@section('content')
<div class="row mb-3">
    <div class="col-12">
        <h6 class="card-title">
            Biodata Peserta
            <i data-feather="chevron-right" class="btn-icon-prepend mb-1" width="13" stroke-width="2" height="13"></i>
            <span class="text-orange">{{ $data->nama_lengkap }}</span>
        </h6>
    </div>
</div>
<div class="row">
    <div class="col-md-3 col-lg-3 col-12 order-md-2 order-lg-2 order-1 mb-3">
        <div class="card">
            <div class="card-body text-center">
                <div class="row">
                    <div class="col-2 col-md-12 col-lg-12">
                        @if ($data->photo == '' || $data->photo == null)
                            <img src="{{ asset('assets/images/80x80.png') }}" alt="placeholder" style="border-radius:10px !important;object-fit: cover !important;width:100% !important;">
                        @else
                            <img src="{{ asset('assets/uploads/calon siswa/' . $data->photo) }}" alt="placeholder" style="border-radius:10px !important;object-fit: cover !important;width:100% !important;">
                        @endif
                    </div>
                    <div class="col-5 col-md-12 col-lg-12 text-desc">
                        <h6 class="text-orange font-weight-bold">
                            {{ $data->nama_lengkap }}
                        </h6>
                        <small>{{ $data->jenis_kelamin == 'L' ? 'Laki-Laki' : 'Perempuan'}} / {{ $count['umur'] }} Tahun</small>
                    </div>
                    <div class="col-5 col-md-12 col-lg-12 text-desc">
                        <a href="{{ route('print_calon',['id'=>$data->id]) }}" target="_blank" class="btn btn-inverse-warning btn-print">
                            Cetak
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="col-md-9 col-lg-9 col-12 order-md-1 order-lg-1 order-2">
        <div class="card">
            <div class="card-header">
                <h5 class="font-wight-bold">Biodata Peserta</h5>
            </div>
            <div class="card-body">
                <ul class="nav nav-pills" id="myTab">
                    <li class="nav-item">
                        <a href="#biodata" class="nav-link active" data-bs-toggle="tab">Identitas Diri</a>
                    </li>
                    <li class="nav-item">
                        <a href="#tempat_tinggal" class="nav-link" data-bs-toggle="tab">Tempat Tinggal</a>
                    </li>
                    <li class="nav-item">
                        <a href="#pip_bsm" class="nav-link" data-bs-toggle="tab">PIP/BSM</a>
                    </li>
                    <li class="nav-item">
                        <a href="#prestasi" class="nav-link" data-bs-toggle="tab">Prestasi</a>
                    </li>
                    <li class="nav-item">
                        <a href="#beasiswa" class="nav-link" data-bs-toggle="tab">Beasiswa</a>
                    </li>
                    <li class="nav-item">
                        <a href="#orang_tua" class="nav-link" data-bs-toggle="tab">Orang Tua</a>
                    </li>
                </ul>
                <div class="tab-content">
                    <div class="tab-pane fade show active" id="biodata">
                        <table  class="table display table-hover w-100 table-striped">
                            <tbody>
                                <tr>
                                    <th class="t-left" style="width:40%">Nama Lengkap (Sesuai dengan ijazah)</th>
                                    <th class="" style="width: 5px">:</th>
                                    <th class="t-right">{{ $data->nama_lengkap }}</th>
                                </tr>
                                <tr>
                                    <th class="t-left">Tempat, Tanggal Lahir</th>
                                    <th class="" style="width: 5px">:</th>
                                    <th class="t-right">{{ $data->tempat_lahir }}, {{ $date = date('d M Y', strtotime($data->tanggal_lahir)); }}</th>
                                </tr>
                                <tr>
                                    <th class="t-left">Jenis Kelamin</th>
                                    <th class="" style="width: 5px">:</th>
                                    <th class="t-right">{{ $data->jenis_kelamin == 'L' ? 'Laki-Laki' : 'Perempuan'}}</th>
                                </tr>
                                <tr>
                                    <th class="t-left">NISN</th>
                                    <th class="" style="width: 5px">:</th>
                                    <th class="t-right">{{ $data->nisn}}</th>
                                </tr>
                                <tr>
                                    <th class="t-left">NIS (Nomor Induk Kependudukan)</th>
                                    <th class="" style="width: 5px">:</th>
                                    <th class="t-right">{{ $data->nis}}</th>
                                </tr>
                                <tr>
                                    <th class="t-left">Alamat Email</th>
                                    <th class="" style="width: 5px">:</th>
                                    <th class="t-right">{{ $data->email}}</th>
                                </tr>
                                <tr>
                                    <th class="t-left">No. Telp/HP</th>
                                    <th class="" style="width: 5px">:</th>
                                    <th class="t-right">{{ $data->telepon}}</th>
                                </tr>
                                <tr>
                                    <th class="t-left">Hobi</th>
                                    <th class="" style="width: 5px">:</th>
                                    <th class="t-right">{{ $data->hobi}}</th>
                                </tr>
                                <tr>
                                    <th class="t-left">Cita-cita</th>
                                    <th class="" style="width: 5px">:</th>
                                    <th class="t-right">{{ $data->cita_cita}}</th>
                                </tr>
                                <tr>
                                    <th class="t-left">Anak Ke-</th>
                                    <th class="" style="width: 5px">:</th>
                                    <th class="t-right">{{ $data->anak_ke}} dari {{ $data->jumlah_saudara}} Bersaudara</th>
                                </tr>
                                <tr>
                                    <th class="t-left">Asal Madrasah/Sekolah</th>
                                    <th class="" style="width: 5px">:</th>
                                    <th class="t-right">{{ $data->asal_sekolah}}</th>
                                </tr>
                                <tr>
                                    <th class="t-left">Jenis Madrasah/Sekolah</th>
                                    <th class="" style="width: 5px">:</th>
                                    <th class="t-right">{{ $data->jenis_sekolah}}</th>
                                </tr>
                                <tr>
                                    <th class="t-left">NPSN Asal Madrasah/Sekolah</th>
                                    <th class="" style="width: 5px">:</th>
                                    <th class="t-right">{{ $data->npsn_asal_sekolah}}</th>
                                </tr>
                                <tr>
                                    <th class="t-left">Pernah Mengikuti PAUD</th>
                                    <th class="" style="width: 5px">:</th>
                                    <th class="t-right">{{ $data->mengikuti_paud}}</th>
                                </tr>
                                <tr>
                                    <th class="t-left t-bottom">Pernah Mengikuti TK/RA</th>
                                    <th class="t-bottom" style="width: 5px">:</th>
                                    <th class="t-right t-bottom">{{ $data->mengikuti_tk}}</th>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                    <div class="tab-pane fade" id="tempat_tinggal">
                        <table  class="table display table-hover table-striped w-100">
                            <tbody>
                                <tr>
                                    <th class="t-left" style="width:40%">Alamat</th>
                                    <th class="" style="width: 5px">:</th>
                                    <th class="t-right">{{ $data->alamat }}</th>
                                </tr>
                                <tr>
                                    <th class="t-left">Desa/Kelurahan</th>
                                    <th class="" style="width: 5px">:</th>
                                    <th class="t-right">{{ $data->desa_kelurahan}}</th>
                                </tr>
                                <tr>
                                    <th class="t-left">Kecamatan</th>
                                    <th class="" style="width: 5px">:</th>
                                    <th class="t-right">{{ $data->kecamatan}}</th>
                                </tr>
                                <tr>
                                    <th class="t-left">Kab./Kota</th>
                                    <th class="" style="width: 5px">:</th>
                                    <th class="t-right">{{ $data->kab_kota}}</th>
                                </tr>
                                <tr>
                                    <th class="t-left">Provinsi</th>
                                    <th class="" style="width: 5px">:</th>
                                    <th class="t-right">{{ $data->provinsi}}</th>
                                </tr>
                                <tr>
                                    <th class="t-left">Jarak Tempat Tinggal Siswa</th>
                                    <th class="" style="width: 5px">:</th>
                                    <th class="t-right">{{ $data->jarak_tempat_tinggal}}</th>
                                </tr>
                                <tr>
                                    <th class="t-left t-bottom">Transportasi ke Madrasah</th>
                                    <th class="t-bottom" style="width: 5px">:</th>
                                    <th class="t-right t-bottom">{{ $data->transportasi}}</th>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                    <div class="tab-pane fade" id="pip_bsm">
                        <table  class="table display table-hover table-striped w-100">
                            <tbody>
                                <tr>
                                    <th class="t-left" style="width:40%">Status Penerima PIP/BSM </th>
                                    <th class="" style="width: 5px">:</th>
                                    <th class="t-right">{{ $data->status_penerimaan_pip_bsm }}</th>
                                </tr>
                                <tr>
                                    <th class="t-left">Alasan Menerima PIP/BSM</th>
                                    <th class="" style="width: 5px">:</th>
                                    <th class="t-right">{{ $data->status_penerimaan_pip_bsm}}</th>
                                </tr>
                                <tr>
                                    <th class="t-left">Periode Menerima PIP/BSM</th>
                                    <th class="" style="width: 5px">:</th>
                                    <th class="t-right">{{ $data->periode_menerima_pip_bsm}}</th>
                                </tr>
                                <tr>
                                    <th class="t-left t-bottom">Transportasi ke Madrasah</th>
                                    <th class="t-bottom" style="width: 5px">:</th>
                                    <th class="t-right t-bottom">{{ $data->transportasi}}</th>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                    <div class="tab-pane fade" id="prestasi">
                        <table  class="table display table-hover table-striped w-100">
                            <tbody>
                                <tr>
                                    <th class="t-left" style="width:40%">Bidang Prestasi </th>
                                    <th class="" style="width: 5px">:</th>
                                    <th class="t-right">{{ $data->bidang_prestasi }}</th>
                                </tr>
                                <tr>
                                    <th class="t-left">Tingkat Prestasi</th>
                                    <th class="" style="width: 5px">:</th>
                                    <th class="t-right">{{ $data->tingkat_prestasi}}</th>
                                </tr>
                                <tr>
                                    <th class="t-left">Peringkat yang diraih</th>
                                    <th class="" style="width: 5px">:</th>
                                    <th class="t-right">{{ $data->peringkat}}</th>
                                </tr>
                                <tr>
                                    <th class="t-left t-bottom">Tahun meraih prestasi</th>
                                    <th class="t-bottom" style="width: 5px">:</th>
                                    <th class="t-right t-bottom">{{ $data->tahun}}</th>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                    <div class="tab-pane fade" id="beasiswa">
                        <table  class="table display table-hover table-striped w-100">
                            <tbody>
                                <tr>
                                    <th class="t-left" style="width:40%">Status Beasiswa</th>
                                    <th class="" style="width: 5px">:</th>
                                    <th class="t-right">{{ $data->status_beasiswa }}</th>
                                </tr>
                                <tr>
                                    <th class="t-left">Sumber Beasiswa</th>
                                    <th class="" style="width: 5px">:</th>
                                    <th class="t-right">{{ $data->sumber_beasiswa}}</th>
                                </tr>
                                <tr>
                                    <th class="t-left">Jenis Beasiswa</th>
                                    <th class="" style="width: 5px">:</th>
                                    <th class="t-right">{{ $data->jenis_beasiswa}}</th>
                                </tr>
                                <tr>
                                    <th class="t-left">Jangka Waktu (Bulan)</th>
                                    <th class="" style="width: 5px">:</th>
                                    <th class="t-right">{{ $data->jenis_beasiswa}}</th>
                                </tr>
                                <tr>
                                    <th class="t-left t-bottom">Besar Uang diterima (Rp)</th>
                                    <th class="t-bottom" style="width: 5px">:</th>
                                    <th class="t-right t-bottom">{{ "Rp. " . number_format($data->besaran_uang, 0, ".", ".")}}</th>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                    <div class="tab-pane fade" id="orang_tua">
                        <table  class="table display table-hover table-striped w-100 mb-3">
                            <tbody class="mb-3">
                                <tr>
                                    <th class="t-left t-bottom" style="width:40%">No. Kartu Keluarga</th>
                                    <th class="t-bottom" style="width: 5px">:</th>
                                    <th class="t-right t-bottom">{{ $data->no_kk }}</th>
                                </tr>
                            </tbody>
                        </table>
                        <table  class="table display table-hover table-striped w-100 mb-3">
                            <tbody>
                                <tr>
                                    <th colspan="3" class="t-left t-right t-bottom">Ayah Kandung</th>
                                </tr>
                                <tr>
                                    <th class="t-left" style="width:40%">Nama Lengkap</th>
                                    <th class="" style="width: 5px">:</th>
                                    <th class="t-right">{{ $data->nama_ayah}}</th>
                                </tr>
                                <tr>
                                    <th class="t-left">NIK/Nomor KTP</th>
                                    <th class="" style="width: 5px">:</th>
                                    <th class="t-right">{{ $data->nik_ayah}}</th>
                                </tr>
                                <tr>
                                    <th class="t-left">Pendidikan Terakhir</th>
                                    <th class="" style="width: 5px">:</th>
                                    <th class="t-right">{{ $data->pendidikan_terakhir_ayah}}</th>
                                </tr>
                                <tr>
                                    <th class="t-left">No .Telp/HP</th>
                                    <th class="" style="width: 5px">:</th>
                                    <th class="t-right">{{ $data->telepon_ayah}}</th>
                                </tr>
                                <tr>
                                    <th class="t-left t-bottom">Pekerjaan Ayah</th>
                                    <th class="t-bottom" style="width: 5px">:</th>
                                    <th class="t-right t-bottom">{{ $data->pekerjaan_ayah }}</th>
                                </tr>
                            </tbody>
                        </table>
                        <table  class="table display table-hover table-striped w-100 mb-3">
                            <tbody>
                                <tr>
                                    <th colspan="3" class="t-left t-right t-bottom">Ibu Kandung</th>
                                </tr>
                                <tr>
                                    <th class="t-left" style="width:40%">Nama Lengkap</th>
                                    <th class="" style="width: 5px">:</th>
                                    <th class="t-right">{{ $data->nama_ibu}}</th>
                                </tr>
                                <tr>
                                    <th class="t-left">NIK/Nomor KTP</th>
                                    <th class="" style="width: 5px">:</th>
                                    <th class="t-right">{{ $data->nik_ibu}}</th>
                                </tr>
                                <tr>
                                    <th class="t-left">Pendidikan Terakhir</th>
                                    <th class="" style="width: 5px">:</th>
                                    <th class="t-right">{{ $data->pendidikan_terakhir_ibu}}</th>
                                </tr>
                                <tr>
                                    <th class="t-left">No .Telp/HP</th>
                                    <th class="" style="width: 5px">:</th>
                                    <th class="t-right">{{ $data->telepon_ibu}}</th>
                                </tr>
                                <tr>
                                    <th class="t-left t-bottom">Pekerjaan Ibu</th>
                                    <th class="t-bottom" style="width: 5px">:</th>
                                    <th class="t-right t-bottom">{{ $data->pekerjaan_ibu}}</th>
                                </tr>
                            </tbody>
                        </table>
                        <table  class="table display table-hover table-striped w-100 mb-3">
                            <tbody>
                                <tr>
                                    <th class="t-left" style="width:40%">Rata-rata penghasilan Orang tua per Bulan</th>
                                    <th class="" style="width: 5px">:</th>
                                    <th class="t-right">{{ "Rp. " . number_format($data->penghasilan_perbulan, 0, ".", ".")}}</th>
                                </tr>
                                <tr>
                                    <th class="t-left">Nomor KSS/KPS</th>
                                    <th class="" style="width: 5px">:</th>
                                    <th class="t-right">{{ $data->penghasilan_perbulan}}</th>
                                </tr>
                                <tr>
                                    <th class="t-left">Nomor Kartu PKH (Penerima Kartu Harapan)</th>
                                    <th class="" style="width: 5px">:</th>
                                    <th class="t-right">{{ $data->nomor_pkh}}</th>
                                </tr>
                                <tr>
                                    <th class="t-left t-bottom">Nomor Kartu Indoensia Pintar (KIP)</th>
                                    <th class="t-bottom" style="width: 5px">:</th>
                                    <th class="t-right t-bottom">{{ $data->nomor_kip}}</th>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
