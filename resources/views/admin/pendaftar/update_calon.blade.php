@extends('layouts.dashboard')

@section('title')
Perbarui Biodata Peserta
@endsection


@section('css')
<link rel="stylesheet" href="{{ asset('../../../assets/vendors/datatables.net-bs4/dataTables.bootstrap4.css') }}">
<link rel="stylesheet" href="{{ asset('../../../assets/css/other/dropify.min.css') }}">
<link rel="stylesheet" href="{{ asset('/assets/vendors/bootstrap-datepicker/bootstrap-datepicker.min.css') }}" />
<link rel="stylesheet" href="{{ asset('../../../assets/css/other/dropify.min.css') }}">
<style>
    .null_data{border:2px solid red !important;}
    .datepicker{ border-radius: 10px !important; }
    .datepicker:active, .datepicker:focus {border-color: #ff9c22 !important}
</style>
@endsection

@section('script')
    <script src="{{ asset('../../../assets/js/dropify.min.js') }}"></script>
    <script src="{{ asset('/assets/vendors/bootstrap-datepicker/bootstrap-datepicker.min.js') }}"></script>
    <script src="{{ asset('/assets/js/datepicker.js') }}"></script>
    <script>
        $('.datepicker').datepicker();
        $('.dropify').dropify({
            messages: {
                default: 'Drag or upload your file here',
                replace: 'Drag or upload your file here',
                remove:  'Remove',
                error:   'Error, Check your image properties'
            },
        });
    </script>
@endsection

@section('content')
<form id="form_pendaftaran_siswa" method="POST" action="{{ route('update_calon',['id'=>$data->id_siswa]) }}" enctype="multipart/form-data">
    @csrf
    <div class="row mb-3">
        <div class="col-6">
            <h6 class="card-title">
                Perbarui Biodata Peserta
                <i data-feather="chevron-right" class="btn-icon-prepend mb-1" width="13" stroke-width="2" height="13"></i>
                <span class="text-orange">{{ $data->nama_lengkap }}</span>
            </h6>
        </div>
        <div class="col-6">
            <button type="submit" title="Perbarui Data Calon"  id="submit_button"
                class="btn btn-warning mr-2 mb-2 mb-md-0 text-white float-right">
                Simpan
            </button>
        </div>
    </div>
    <div class="row">
        <div class="col-12 mb-3">
            <div class="card">
                <div class="card-header">
                    <div class="row">
                        <div class="col-12">
                            <h5 class="font-wight-bold">Identitas Diri</h5>
                        </div>
                    </div>
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-12 col-lg-6 col-md-6 mb-3">
                            <div class="form-group">
                                <label for="name">Nama Lengkap</label>
                                <input type="text" class="form-control {{ $data->nama_lengkap == null ? 'null_data' : '' }}" id="name" value="{{ $data->nama_lengkap }}"  name="nama_lengkap" placeholder="nama lengkap sesuai ijazah SD/MTs" >
                            </div>
                            <div class="row">
                                <div class="col-12 col-lg-6 col-md-6">
                                    <div class="form-group">
                                        <label for="tempat_lahir">Tempat Lahir</label>
                                        <input type="text" class="form-control {{ $data->tempat_lahir == null ? 'null_data' : '' }}" id="tempat_lahir" value="{{ $data->tempat_lahir }}" name="tempat_lahir" placeholder="Kota/Kabupten" >
                                    </div>
                                </div>
                                <div class="col-12 col-lg-6 col-md-6">
                                    <div class="form-group">
                                        <label for="tanggal_lahir">Tanggal Lahir (mm/dd/yyyy)</label>
                                        <div class="input-group date datepicker">
                                            <input type="text" name="tanggal_lahir" {{ $data->tanggal_lahir == null ? 'null_data' : '' }} id="tanggal_lahir"  value="{{ date('m/d/Y', strtotime($data->tanggal_lahir)) }}" class="form-control" placeholder="mm/dd/yyyy" />
                                            <span class="input-group-addon"><i data-feather="calendar"></i></span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="jenis_kelamin">Jenis Kelamin</label>
                                <select class="form-control  {{ $data->jenis_kelamin == null ? 'null_data' : '' }}" name="jenis_kelamin" style="border-radius: 10px" data-width="100%">
                                    <option value="L" {{ $data->jenis_kelamin == "L" ? 'selected' : '' }}>Laki-laki</option>
                                    <option value="P" {{ $data->jenis_kelamin == "P" ? 'selected' : '' }}>Perempuan</option>
                                </select>
                            </div>
                            <div class="row">
                                <div class="col-12 col-lg-6 col-md-6">
                                    <div class="form-group">
                                        <label for="nisn">NISN</label>
                                        <input type="number" class="form-control {{ $data->nisn == null ? 'null_data' : '' }}" id="nisn"  value="{{ $data->nisn }}"  name="nisn" placeholder="Nomor Induk Siswa Nasional" >
                                    </div>
                                </div>
                                <div class="col-12 col-lg-6 col-md-6">
                                    <div class="form-group">
                                        <label for="nis">NIK</label>
                                        <input type="number" class="form-control {{ $data->nis == null ? 'null_data' : '' }}" id="nis"  value="{{ $data->nis }}"  name="nis" placeholder="Nomor Induk Kependudukan" >
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-12 col-lg-6 col-md-6">
                                    <div class="form-group">
                                        <label for="email">Alamat Email (Optional)</label>
                                        <input type="email" class="form-control" id="email" {{ $data->email == null ? 'null_data' : '' }} name="email" value="{{ $data->email }}"  placeholder="emailmu@gmail.com" >
                                    </div>
                                </div>
                                <div class="col-12 col-lg-6 col-md-6">
                                    <div class="form-group">
                                        <label for="telepon">Telepon/WA (Aktif)</label>
                                        <input type="text" class="form-control" {{ $data->telepon == null ? 'null_data' : '' }} id="telepon" name="telepon" value="{{ $data->telepon }}" placeholder="0821 xxxx xxxx" >
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-12 col-lg-6 col-md-6 mb-3">
                            <div class="row">
                                <div class="col-12 col-lg-6 col-md-6">
                                    <div class="form-group">
                                        @php
                                            $hobi = ['Olahraga','Kesenian','Membaca','Menulis','Jalan-jalan','Lainya'];
                                        @endphp
                                        <label for="hobi">Hobi</label>
                                        <select class="form-control  {{ $data->hobi == null ? 'null_data' : '' }}" name="hobi" style="border-radius: 10px" data-width="100%">
                                            @foreach ($hobi as $x)
                                                <option value="{{ $x }}" {{ $data->hobi == $x ? 'selected' : '' }}>{{ $x }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                <div class="col-12 col-lg-6 col-md-6">
                                    <div class="form-group">
                                        @php
                                            $cita = ['PNS','TNI','POLRI','Guru','Dosen','Dokter','Politikus','Wiraswasta','Seniman','Artis','Lainya'];
                                        @endphp
                                        <label for="cita_cita">Cita-cita</label>
                                        <select class="form-control  {{ $data->cita_cita == null ? 'null_data' : '' }}" name="cita_cita" style="border-radius: 10px" data-width="100%">
                                            @foreach ($cita as $x)
                                                <option value="{{ $x }}" {{ $data->cita_cita == $x ? 'selected' : '' }}>{{ $x }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-12 col-lg-6 col-md-6">
                                    <div class="form-group">
                                        <label for="jumlah_saudara">Jumlah Saudara</label>
                                        <input type="number" class="form-control {{ $data->jumlah_saudara == null ? 'null_data' : '' }}" id="jumlah_saudara" name="jumlah_saudara"  value="{{ $data->jumlah_saudara }}" placeholder="jumlah saudara" >
                                    </div>
                                </div>
                                <div class="col-12 col-lg-6 col-md-6">
                                    <div class="form-group">
                                        <label for="anak_ke">Anak ke-</label>
                                        <input type="number" class="form-control {{ $data->anak_ke == null ? 'null_data' : '' }}" id="anak_ke" name="anak_ke"  value="{{ $data->anak_ke }}" placeholder="anak ke" >
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-12 col-lg-6 col-md-6">
                                    <div class="form-group">
                                        <label for="asal_sekolah">Nama asal Madrasah/Sekolah</label>
                                        <input type="text" class="form-control {{ $data->asal_sekolah == null ? 'null_data' : '' }}" id="asal_sekolah" name="asal_sekolah" value="{{ $data->asal_sekolah }}" placeholder="nama sekolah" >
                                    </div>
                                </div>
                                <div class="col-12 col-lg-6 col-md-6">
                                    <div class="form-group">
                                        <label for="npsn_asal_sekolah">NPSN Asal Madrasah/Sekolah</label>
                                        <input type="number" class="form-control {{ $data->npsn_asal_sekolah == null ? 'null_data' : '' }}" id="npsn_asal_sekolah" name="npsn_asal_sekolah"  value="{{ $data->npsn_asal_sekolah }}" placeholder="NPSN Asal Madrasah/Sekolah" >
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-12 col-lg-6 col-md-6">
                                    <div class="form-group">
                                        @php
                                            $jenis_sekolah = ['SMP','MTs'];
                                        @endphp
                                        <label for="jenis_sekolah">Jenis Sekolah</label>
                                        <select class="form-control  {{ $data->jenis_sekolah == null ? 'null_data' : '' }}" name="jenis_sekolah" style="border-radius: 10px" data-width="100%">
                                            @foreach ($jenis_sekolah as $x)
                                                <option value="{{ $x }}" {{ $data->jenis_sekolah == $x ? 'selected' : '' }}>{{ $x }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                <div class="col-12 col-lg-6 col-md-6">
                                    <div class="form-group">
                                        @php
                                            $status_sekolah = ['Swasta','Negeri'];
                                        @endphp
                                        <label for="status_sekolah">Staus Sekolah</label>
                                        <select class="form-control  {{ $data->status_sekolah == null ? 'null_data' : '' }}" name="status_sekolah" style="border-radius: 10px" data-width="100%">
                                            @foreach ($status_sekolah as $x)
                                                <option value="{{ $x }}" {{ $data->status_sekolah == $x ? 'selected' : '' }}>{{ $x }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-12 col-lg-6 col-md-6">
                                    <div class="form-group">
                                        @php
                                            $paud = ['Pernah','Tidak'];
                                        @endphp
                                        <label for="mengikuti_paud">Mengikuti PAUD</label>
                                        <select class="form-control  {{ $data->mengikuti_paud == null ? 'null_data' : '' }}" name="mengikuti_paud" style="border-radius: 10px" data-width="100%">
                                            @foreach ($paud as $x)
                                                <option value="{{ $x }}" {{ $data->mengikuti_paud == $x ? 'selected' : '' }}>{{ $x }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                <div class="col-12 col-lg-6 col-md-6">
                                    <div class="form-group">
                                        @php
                                            $mengikuti_tk = ['Pernah','Tidak'];
                                        @endphp
                                        <label for="mengikuti_tk">Mengikuti PAUD</label>
                                        <select class="form-control  {{ $data->mengikuti_tk == null ? 'null_data' : '' }}" name="mengikuti_tk" style="border-radius: 10px" data-width="100%">
                                            @foreach ($mengikuti_tk as $x)
                                                <option value="{{ $x }}" {{ $data->mengikuti_tk == $x ? 'selected' : '' }}>{{ $x }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-12 mb-3">
            <div class="card">
                <div class="card-header">
                    <div class="row">
                        <div class="col-12">
                            <h5 class="font-wight-bold">Informasi Tempat Tinggal Siswa Sekarang</h5>
                        </div>
                    </div>
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-12 col-lg-6 col-md-6 mb-3">
                            <div class="row">
                                <div class="col-12 col-lg-6 col-md-6">
                                    <div class="form-group">
                                        <label for="desa_kelurahan">Desa/Kelurahan</label>
                                        <input type="text" class="form-control {{ $data->desa_kelurahan == null ? 'null_data' : '' }}" id="desa_kelurahan" value="{{ $data->desa_kelurahan }}"  name="desa_kelurahan" placeholder="Desa/Kelurahan" >
                                    </div>
                                </div>
                                <div class="col-12 col-lg-6 col-md-6">
                                    <div class="form-group">
                                        <label for="kodepos">Kode Pos</label>
                                        <input type="number" class="form-control {{ $data->kodepos == null ? 'null_data' : '' }}" id="kodepos" value="{{ $data->kodepos }}"  name="kodepos" placeholder="Kode Pos" >
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-12 col-lg-6 col-md-6">
                                    <div class="form-group">
                                        <label for="kecamatan">Kecamatan</label>
                                        <input type="text" class="form-control {{ $data->kecamatan == null ? 'null_data' : '' }}" id="kecamatan" value="{{ $data->kecamatan }}"  name="kecamatan" placeholder="Kecamatan" >
                                    </div>
                                </div>
                                <div class="col-12 col-lg-6 col-md-6">
                                    <div class="form-group">
                                        <label for="kab_kota">Kab./Kota</label>
                                        <input type="text" class="form-control {{ $data->kab_kota == null ? 'null_data' : '' }}" id="kab_kota" value="{{ $data->kab_kota }}"  name="kab_kota" placeholder="Kab./Kota" >
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="provinsi">Provinsi</label>
                                <input type="text" class="form-control {{ $data->provinsi == null ? 'null_data' : '' }}" id="provinsi" value="{{ $data->provinsi }}"  name="provinsi" placeholder="Provinsi" >
                            </div>
                        </div>
                        <div class="col-12 col-lg-6 col-md-6 mb-3">
                            <div class="row">
                                <div class="col-12 col-lg-6 col-md-6">
                                    <div class="form-group">
                                        @php
                                            $jarak = ['Kurang dari 5 Km','5-10 Km','11-20 Km','21-30 Km','Lebih 30 Km'];
                                        @endphp
                                        <label for="jarak_tempat_tinggal">Jarak Tempat Tinggal Siswa</label>
                                        <select class="form-control  {{ $data->jarak_tempat_tinggal == null ? 'null_data' : '' }}" name="jarak_tempat_tinggal" style="border-radius: 10px" data-width="100%">
                                            @foreach ($jarak as $x)
                                                <option value="{{ $x }}" {{ $data->jarak_tempat_tinggal == $x ? 'selected' : '' }}>{{ $x }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                <div class="col-12 col-lg-6 col-md-6">
                                    <div class="form-group">
                                        @php
                                            $transportasi = ['Jalan Kaki','Sepeda','Motor','Mobil','Antar Jemput','Angkutan Umum','Lainya'];
                                        @endphp
                                        <label for="transportasi">Transportasi</label>
                                        <select class="form-control  {{ $data->transportasi == null ? 'null_data' : '' }}" name="transportasi" style="border-radius: 10px" data-width="100%">
                                            @foreach ($transportasi as $x)
                                                <option value="{{ $x }}" {{ $data->transportasi == $x ? 'selected' : '' }}>{{ $x }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="alamat">Alamat Sekarang</label>
                                <textarea name="alamat" class="form-control {{ $data->alamat == null ? 'null_data' : '' }} " id="alamat" rows="7" placeholder="alamat lengkap sesuai ktp" >{{ $data->alamat }}</textarea>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-12 mb-3">
            <div class="card">
                <div class="card-header">
                    <div class="row">
                        <div class="col-12">
                            <h5 class="font-wight-bold">Program Infonesia Pintar (PIP)/BSM</h5>
                        </div>
                    </div>
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-12 col-lg-4 col-md-4 mb-3">
                            <div class="form-group">
                                <label for="status_penerimaan_pip_bsm">Status Penerimaan PIP/BSM</label>
                                <input type="text" class="form-control {{ $data->status_penerimaan_pip_bsm == null ? 'null_data' : '' }}" id="status_penerimaan_pip_bsm" value="{{ $data->status_penerimaan_pip_bsm }}"  name="status_penerimaan_pip_bsm" placeholder="Status Penerimaan PIP/BSM" >
                            </div>
                        </div>
                        <div class="col-12 col-lg-4 col-md-4 mb-3">
                            <div class="form-group">
                                <label for="alasan_menerima_pip_bsm">Alasan Menerima PIP/BSM</label>
                                <input type="text" class="form-control {{ $data->alasan_menerima_pip_bsm == null ? 'null_data' : '' }}" id="alasan_menerima_pip_bsm" value="{{ $data->alasan_menerima_pip_bsm }}"  name="alasan_menerima_pip_bsm" placeholder="Alasan Menerima PIP/BSM" >
                            </div>
                        </div>
                        <div class="col-12 col-lg-4 col-md-4 mb-3">
                            <div class="form-group">
                                <label for="periode_menerima_pip_bsm">Periode Menerima PIP/BSM</label>
                                <input type="text" class="form-control {{ $data->periode_menerima_pip_bsm == null ? 'null_data' : '' }}" id="periode_menerima_pip_bsm" value="{{ $data->periode_menerima_pip_bsm }}"  name="periode_menerima_pip_bsm" placeholder="Periode Menerima PIP/BSM" >
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-12 mb-3">
            <div class="card">
                <div class="card-header">
                    <div class="row">
                        <div class="col-12">
                            <h5 class="font-wight-bold">Prestasi Tertinggi Yang Pernah Diraih</h5>
                        </div>
                    </div>
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-12 col-lg-3 col-md-6 mb-3">
                            <div class="form-group">
                                <label for="bidang_prestasi">Bidang Prestasi</label>
                                <input type="text" class="form-control {{ $data->bidang_prestasi == null ? 'null_data' : '' }}" id="bidang_prestasi" value="{{ $data->bidang_prestasi }}"  name="bidang_prestasi" placeholder="Bidang Prestasi" >
                            </div>
                        </div>
                        <div class="col-12 col-lg-3 col-md-6 mb-3">
                            <div class="form-group">
                                <label for="tingkat_prestasi">Tingkat Prestasi</label>
                                <input type="text" class="form-control {{ $data->tingkat_prestasi == null ? 'null_data' : '' }}" id="tingkat_prestasi" value="{{ $data->tingkat_prestasi }}"  name="tingkat_prestasi" placeholder="Tingkat Prestasi" >
                            </div>
                        </div>
                        <div class="col-12 col-lg-3 col-md-6 mb-3">
                            <div class="form-group">
                                <label for="peringkat">Peringkat yang diraih</label>
                                <input type="text" class="form-control {{ $data->peringkat == null ? 'null_data' : '' }}" id="peringkat" value="{{ $data->peringkat }}"  name="peringkat" placeholder="Peringkat yang diraih" >
                            </div>
                        </div>
                        <div class="col-12 col-lg-3 col-md-6 mb-3">
                            <div class="form-group">
                                <label for="tahun">Tahun meraih prestasi</label>
                                <input type="text" class="form-control {{ $data->tahun == null ? 'null_data' : '' }}" id="tahun" value="{{ $data->tahun }}"  name="tahun" placeholder="Tahun meraih prestasi" >
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-12 mb-3">
            <div class="card">
                <div class="card-header">
                    <div class="row">
                        <div class="col-12">
                            <h5 class="font-wight-bold">Beasiswa yang Diterima</h5>
                        </div>
                    </div>
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-12 col-lg-4 col-md-6 mb-3">
                            <div class="form-group">
                                <label for="status_beasiswa">Status Beasiswa</label>
                                <input type="text" class="form-control {{ $data->status_beasiswa == null ? 'null_data' : '' }}" id="status_beasiswa" value="{{ $data->status_beasiswa }}"  name="status_beasiswa" placeholder="Status Beasiswa" >
                            </div>
                        </div>
                        <div class="col-12 col-lg-8 col-md-6 mb-3">
                            <div class="form-group">
                                <label for="sumber_beasiswa">Sumber Beasiswa</label>
                                <input type="text" class="form-control {{ $data->sumber_beasiswa == null ? 'null_data' : '' }}" id="sumber_beasiswa" value="{{ $data->sumber_beasiswa }}"  name="sumber_beasiswa" placeholder="Sumber Beasiswa" >
                            </div>
                        </div>
                        <div class="col-12 col-lg-4 col-md-6 mb-3">
                            <div class="form-group">
                                <label for="jenis_beasiswa">Jenis Beasiswa</label>
                                <input type="text" class="form-control {{ $data->jenis_beasiswa == null ? 'null_data' : '' }}" id="jenis_beasiswa" value="{{ $data->jenis_beasiswa }}"  name="jenis_beasiswa" placeholder="Jenis Beasiswa" >
                            </div>
                        </div>
                        <div class="col-12 col-lg-4 col-md-6 mb-3">
                            <div class="form-group">
                                <label for="jangka_waktu">Jangka Waktu (Bulan)</label>
                                <input type="text" class="form-control {{ $data->jangka_waktu == null ? 'null_data' : '' }}" id="jangka_waktu" value="{{ $data->jangka_waktu }}"  name="jangka_waktu" placeholder="Jangka Waktu (Bulan)" >
                            </div>
                        </div>
                        <div class="col-12 col-lg-4 col-md-6 mb-3">
                            <div class="form-group">
                                <label for="besaran_uang">Besaran Uang diterima (Rp)</label>
                                <input type="number" class="form-control {{ $data->besaran_uang == null ? 'null_data' : '' }}" id="besaran_uang" value="{{ $data->besaran_uang }}"  name="besaran_uang" placeholder="Besaran Uang diterima (Rp)" >
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-12 mb-3">
            <div class="card">
                <div class="card-header">
                    <div class="row">
                        <div class="col-12">
                            <h5 class="font-wight-bold">Informasi Orang Tua kandung/Wali</h5>
                        </div>
                    </div>
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-12 mb-3">
                            <div class="form-group">
                                <label for="no_kk">No. Kartu Keluarga (KK)</label>
                                <input type="number" class="form-control {{ $data->no_kk == null ? 'null_data' : '' }}" id="no_kk" name="no_kk"  value="{{ $data->no_kk }}" placeholder="nomor kartu keluarga" >
                            </div>
                        </div>
                        <br>
                        <div class="col-12 col-lg-6 col-md-6 mb-3">
                            <div class="form-group">
                                <label for="nama_ayah">Nama Ayah</label>
                                <input type="text" class="form-control {{ $data->nama_ayah == null ? 'null_data' : '' }}" id="nama_ayah" name="nama_ayah" value="{{ $data->nama_ayah }}" placeholder="nama lengkap ayah sesuai ktp/kk" >
                            </div>
                            <div class="row">
                                <div class="col-12 col-lg-6 col-md-6">
                                    <div class="form-group">
                                        <label for="nik_ayah">NIK/Nomor KTP</label>
                                        <input type="text" class="form-control {{ $data->nik_ayah == null ? 'null_data' : '' }}" id="nik_ayah" name="nik_ayah" value="{{ $data->nik_ayah }}" placeholder="NIK ayah sesuai ktp" >
                                    </div>
                                </div>
                                <div class="col-12 col-lg-6 col-md-6">
                                    <div class="form-group">
                                        @php
                                            $pendidikan_terakhir_ayah = ['S3','S2','S1','D3','D2','D1','SMA/SMK/MA','SMP/MTS','SD/MI','Lainya'];
                                        @endphp
                                        <label for="pendidikan_terakhir_ayah">Pendidikan Terakhir Ayah</label>
                                        <select class="form-control  {{ $data->pendidikan_terakhir_ayah == null ? 'null_data' : '' }}" name="pendidikan_terakhir_ayah" style="border-radius: 10px" data-width="100%">
                                            @foreach ($pendidikan_terakhir_ayah as $x)
                                                <option value="{{ $x }}" {{ $data->pendidikan_terakhir_ayah == $x ? 'selected' : '' }}>{{ $x }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-12 col-lg-6 col-md-6">
                                    <div class="form-group">
                                        <label for="telepon_ayah">Telepon/WA (Aktif)</label>
                                        <input type="text" class="form-control" {{ $data->telepon_ayah == null ? 'null_data' : '' }} id="telepon_ayah" name="telepon_ayah" value="{{ $data->telepon_ayah }}" placeholder="0821 xxxx xxxx" >
                                    </div>
                                </div>
                                <div class="col-12 col-lg-6 col-md-6">
                                    <div class="form-group">
                                        <label for="pekerjaan_ayah">Pekerjaan Ayah</label>
                                        <input type="text" class="form-control {{ $data->pekerjaan_ayah == null ? 'null_data' : '' }}" id="pekerjaan_ayah" value="{{ $data->pekerjaan_ayah }}" name="pekerjaan_ayah" placeholder="pekerjaan ayah" >
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-12 col-lg-6 col-md-6 mb-3">
                            <div class="form-group">
                                <label for="nama_ibu">Nama Ibu</label>
                                <input type="text" class="form-control {{ $data->nama_ibu == null ? 'null_data' : '' }}" id="nama_ibu" name="nama_ibu" value="{{ $data->nama_ibu }}" placeholder="nama lengkap ibu sesuai ktp/kk" >
                            </div>
                            <div class="row">
                                <div class="col-12 col-lg-6 col-md-6">
                                    <div class="form-group">
                                        <label for="nik_ibu">NIK/Nomor KTP</label>
                                        <input type="text" class="form-control {{ $data->nik_ibu == null ? 'null_data' : '' }}" id="nik_ibu" name="nik_ibu" value="{{ $data->nik_ibu }}" placeholder="NIK Ibu sesuai ktp" >
                                    </div>
                                </div>
                                <div class="col-12 col-lg-6 col-md-6">
                                    <div class="form-group">
                                        @php
                                            $pendidikan_terakhir_ibu = ['S3','S2','S1','D3','D2','D1','SMA/SMK/MA','SMP/MTS','SD/MI','Lainya'];
                                        @endphp
                                        <label for="pendidikan_terakhir_ibu">Pendidikan Terakhir Ibu</label>
                                        <select class="form-control  {{ $data->pendidikan_terakhir_ibu == null ? 'null_data' : '' }}" name="pendidikan_terakhir_ibu" style="border-radius: 10px" data-width="100%">
                                            @foreach ($pendidikan_terakhir_ibu as $x)
                                                <option value="{{ $x }}" {{ $data->pendidikan_terakhir_ibu == $x ? 'selected' : '' }}>{{ $x }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-12 col-lg-6 col-md-6">
                                    <div class="form-group">
                                        <label for="telepon_ibu">Telepon/WA (Aktif)</label>
                                        <input type="text" class="form-control" {{ $data->telepon_ibu == null ? 'null_data' : '' }} id="telepon_ibu" name="telepon_ibu" value="{{ $data->telepon_ibu }}" placeholder="0821 xxxx xxxx" >
                                    </div>
                                </div>
                                <div class="col-12 col-lg-6 col-md-6">
                                    <div class="form-group">
                                        <label for="pekerjaan_ibu">Pekerjaan Ibu</label>
                                        <input type="text" class="form-control {{ $data->pekerjaan_ibu == null ? 'null_data' : '' }}" id="pekerjaan_ibu" value="{{ $data->pekerjaan_ibu }}" name="pekerjaan_ibu" placeholder="pekerjaan Ibu" >
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <br>
                    <div class="row">
                        <div class="col-12 col-lg-6 col-md-6 mb-3">
                            <div class="form-group">
                                <label for="penghasilan_perbulan">Rata rata penghasilan perbulan</label>
                                <input type="text" class="form-control {{ $data->penghasilan_perbulan == null ? 'null_data' : '' }}" id="penghasilan_perbulan" value="{{ $data->penghasilan_perbulan }}"  name="penghasilan_perbulan" placeholder="Rata rata penghasilan perbulan" >
                            </div>
                        </div>
                        <div class="col-12 col-lg-6 col-md-6 mb-3">
                            <div class="form-group">
                                <label for="nomor_kss_kps">Nomor KSS/KPS</label>
                                <input type="text" class="form-control {{ $data->nomor_kss_kps == null ? 'null_data' : '' }}" id="nomor_kss_kps" value="{{ $data->nomor_kss_kps }}"  name="nomor_kss_kps" placeholder="Nomor KSS/KPS" >
                            </div>
                        </div>
                        <div class="col-12 col-lg-6 col-md-6 mb-3">
                            <div class="form-group">
                                <label for="nomor_pkh">Nomor Kartu PKH (Penerima Kartu Harapan)</label>
                                <input type="text" class="form-control {{ $data->nomor_pkh == null ? 'null_data' : '' }}" id="nomor_pkh" value="{{ $data->nomor_pkh }}"  name="nomor_pkh" placeholder="Nomor Kartu PKH (Penerima Kartu Harapan)" >
                            </div>
                        </div>
                        <div class="col-12 col-lg-6 col-md-6 mb-3">
                            <div class="form-group">
                                <label for="nomor_kip">Nomor Kartu Indonesia Pintar (KIP)</label>
                                <input type="text" class="form-control {{ $data->nomor_kip == null ? 'null_data' : '' }}" id="nomor_kip" value="{{ $data->nomor_kip }}"  name="nomor_kip" placeholder="Nomor Kartu Indonesia Pintar (KIP)" >
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <br>
        <div class="col-12 col-lg-6 col-md-6 mb-3">
            <div class="card">
                <div class="card-body">
                    <label class="font-weight-bold mb-3">Berkas Pendaftaran (optional)</label>
                    <div class="form-group">
                        @if ($data->piagam == null || $data->piagam == '')
                            <label>Bukti Piagam (.pdf .jpeg .jpg .png | max. 10 mb)</label> <br>
                            <label for="piagam">*Jika ada lebih dari 1 piagam jadikan 1 pdf </label>
                            <input type="file" name="piagam" class="dropify" data-max-file-size="10M" data-allowed-file-extensions="pdf jpeg png jpg" data-default-file="PDF"  data-height="140" />
                        @else
                            <label for="ijazah">Bukti Piagam</label>
                            <br>
                            <a download href="{{ asset('assets/uploads/calon siswa/'.$data->piagam )}}" target="_blank" class="btn btn-inverse-info btn-print mr-2">
                                Download Piagam
                            </a>
                        @endif
                    </div>
                </div>
            </div>
        </div>
        <div class="col-12 col-lg-6 col-md-6 mb-3">
            <div class="card">
                <div class="card-body">
                    <label class="font-weight-bold mb-3">Berkas Pendaftaran (wajib)</label>
                    <div class="form-group">
                        @if ($data->ijazah == null || $data->ijazah == '')
                            <label for="ijazah">Raport Sem. 1 s/d 5 (.pdf | max. 10 mb)*</label>
                            <input type="file" name="ijazah" class="dropify" data-max-file-size="10M" data-allowed-file-extensions="pdf" data-default-file="PDF"  data-height="140" />
                        @else
                            <label for="ijazah">Raport Sem. 1 s/d 5</label>
                            <br>
                            <a download href="{{ asset('assets/uploads/calon siswa/'.$data->ijazah )}}" target="_blank" class="btn btn-inverse-info btn-print mr-2">
                                Download Ijazah
                            </a>
                        @endif
                    </div>
                    <div class="form-group">
                        @if ($data->photo == null || $data->photo == '')
                            <label for="photo">Pas foto 3x4 (.jpg .png .jpeg | max. 5 mb)*</label>
                            <input type="file" name="photo" class="dropify" data-max-file-size="5M" data-allowed-file-extensions="jpeg png jpg tiff" data-default-file="IMG"  data-height="140" />
                        @else
                            <label for="photo">Pas foto 3x4</label>
                            <br>
                            <a download href="{{ asset('assets/uploads/calon siswa/'.$data->photo )}}" target="_blank" class="btn btn-inverse-warning btn-print mr-2">
                                Download Foto
                            </a>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
</form>
@endsection
