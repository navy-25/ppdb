@extends('layouts.landing')
@section('title')
Form Pendaftaran
@endsection
@section('css')
    <style>
        .header{display: none;}
        .carousel{display: none;}
        .datepicker{ border-radius: 10px !important; }
        .datepicker:active, .datepicker:focus {border-color: #ff9c22 !important}
    </style>
    <link rel="stylesheet" href="{{ asset('/assets/vendors/bootstrap-datepicker/bootstrap-datepicker.min.css') }}" />
    <link rel="stylesheet" href="{{ asset('../../../assets/css/other/dropify.min.css') }}">
@endsection

@section('script')
    <script src="{{ asset('../../../assets/js/dropify.min.js') }}"></script>
    <script>
        $('.dropify').dropify({
            messages: {
                default: 'Drag or upload your file here',
                replace: 'Drag or upload your file here',
                remove:  'Remove',
                error:   'Error, Check your image properties'
            },
        });
    </script>
    <script src="{{ asset('/assets/vendors/bootstrap-datepicker/bootstrap-datepicker.min.js') }}"></script>
    <script src="{{ asset('/assets/js/datepicker.js') }}"></script>
    <script>
        $('.datepicker').datepicker();
        function send_form_regis(){
            event.preventDefault();
            Swal.fire({
                title:'Yakin sudah mengisi data dengan benar ?',
                text:  'Cek kembali data pendaftaran anda (Data yang sudah dikirim tidak bisa diedit)',
                icon: 'warning',
                showConfirmButton: true,
                showCancelButton: true,
                cancelButtonText: "Batal",
                confirmButtonText: "Kirim sekarang",
                confirmButtonColor: "#138119",
                cancelButtonColor: "#c8c8c8",
            }).then((result) => {
                if (result.isConfirmed) {
                    $('#form_pendaftaran_siswa').submit();
                }
            })
        }
    </script>
@endsection
@section('content')
<div class="container-fluid">
    <div class="row px-2 br-1 py-1 mb-5 mt-5" style="background: rgb(230, 230, 230)">
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a class="text-decoration-none text-black breadcump-black" href="/">Beranda</a></li>
                <li class="breadcrumb-item active font-weight-bold text-green" aria-current="page">Form Pendaftaran</li>
            </ol>
        </nav>
    </div>
    <div class="row">
        <div class="col-12 text-center font-weight-bold h4 mb-3">Form Pendaftaran</div>
        <div class="col-12 mb-3">
            <hr class="" style="width: 100px">
        </div>
        <div class="col-12 col-lg-9 col-md-9 mx-auto mb-3">
            <form class="forms-sample" id="form_pendaftaran_siswa" method="POST" action="{{ route('form_pendaftaran_siswa') }}" enctype="multipart/form-data">
                <div class="card">
                    <div class="card-body">
                        @csrf
                        <label class="font-weight-bold mb-3">Identitas Diri</label>
                        <div class="form-group">
                            <label for="name">Nama Lengkap*</label>
                            <input type="text" class="form-control" id="name" name="name" placeholder="nama lengkap sesuai ijazah SD/MTs" required>
                        </div>
                        <div class="form-group">
                            <label for="jenis_kelamin">Jenis Kelamin*</label>
                            <select class="form-control" name="jenis_kelamin" style="border-radius: 10px" data-width="100%">
                                <option value="L">Laki-laki</option>
                                <option value="P">Perempuan</option>
                            </select>
                        </div>
                        <div class="row">
                            <div class="col-12 col-lg-6 col-md-6">
                                <div class="form-group">
                                    <label for="tempat_lahir">Tempat Lahir*</label>
                                    <input type="text" class="form-control" id="tempat_lahir" name="tempat_lahir" placeholder="Kota/Kabupten" required>
                                </div>
                            </div>
                            <div class="col-12 col-lg-6 col-md-6">
                                <div class="form-group">
                                    <label for="tanggal_lahir">Tanggal Lahir (mm/dd/yyyy)*</label>
                                    <div class="input-group date datepicker">
                                        <input type="text" name="tanggal_lahir"  id="tanggal_lahir"  class="form-control" placeholder="mm/dd/yyyy" required/>
                                        <span class="input-group-addon"><i data-feather="calendar"></i></span>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="email">Alamat Email (Optional)</label>
                            <input type="email" class="form-control" id="email" name="email" placeholder="emailmu@gmail.com" required>
                        </div>
                        <div class="form-group">
                            <label for="telepon">Telepon/WA (Aktif)*</label>
                            <input type="text" class="form-control" id="telepon" name="telepon" placeholder="0821 xxxx xxxx" required>
                        </div>
                        <div class="form-group">
                            <label for="alamat_sekarang">Alamat Sekarang*</label>
                            <textarea name="alamat_sekarang" class="form-control" id="alamat_sekarang" rows="4" placeholder="alamat lengkap sesuai ktp" required></textarea>
                        </div>
                    </div>
                </div>
                <br>
                <div class="card">
                    <div class="card-body">
                        <label class="font-weight-bold mb-3">Data Keluarga</label>
                        <div class="form-group">
                            <label for="no_kk">No. Kartu Keluarga (KK)*</label>
                            <input type="number" class="form-control" id="no_kk" name="no_kk" placeholder="nomor kartu keluarga" required>
                        </div>
                        <div class="form-group">
                            <label for="nama_ayah">Nama Ayah*</label>
                            <input type="text" class="form-control" id="nama_ayah" name="nama_ayah" placeholder="nama lengkap ayah sesuai ktp/kk" required>
                        </div>
                        <div class="row">
                            <div class="col-12 col-lg-6 col-md-6">
                                <div class="form-group">
                                    <label for="pekerjaan_ayah">Pekerjaan Ayah*</label>
                                    <input type="text" class="form-control" id="pekerjaan_ayah" name="pekerjaan_ayah" placeholder="pekerjaan ayah" required>
                                </div>
                            </div>
                            <div class="col-12 col-lg-6 col-md-6">
                                <div class="form-group">
                                    <label for="penghasilan_ayah">Penghasilan Ayah*</label>
                                    <input type="number" class="form-control" id="penghasilan_ayah" name="penghasilan_ayah" placeholder="penghasilan ayah" required>
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="nama_ibu">Nama Ibu*</label>
                            <input type="text" class="form-control" id="nama_ibu" name="nama_ibu" placeholder="nama lengkap ibu sesuai ktp/kk" required>
                        </div>
                        <div class="row">
                            <div class="col-12 col-lg-6 col-md-6">
                                <div class="form-group">
                                    <label for="pekerjaan_ibu">Pekerjaan Ibu*</label>
                                    <input type="text" class="form-control" id="pekerjaan_ibu" name="pekerjaan_ibu" placeholder="pekerjaan ibu"  required>
                                </div>
                            </div>
                            <div class="col-12 col-lg-6 col-md-6">
                                <div class="form-group">
                                    <label for="penghasilan_ibu">Penghasilan Ibu*</label>
                                    <input type="number" class="form-control" id="penghasilan_ibu" name="penghasilan_ibu" placeholder="penghasilan ibu" required>
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="telepon_wali">Telepon/WA Orang tua (Aktif)*</label>
                            <input type="text" class="form-control" id="telepon_wali" name="telepon_wali" placeholder="0821 xxxx xxxx" required>
                        </div>
                    </div>
                </div>
                <br>
                <div class="card">
                    <div class="card-body">
                        <label class="font-weight-bold mb-3">Data Sekolah/Institusi</label>
                        <div class="form-group">
                            <label for="asal_sekolah">Nama asal sekolah SMP/MTs*</label>
                            <input type="text" class="form-control" id="asal_sekolah" name="asal_sekolah" placeholder="nama sekolah" required>
                        </div>
                        <div class="row">
                            <div class="col-12 col-lg-12 col-md-12">
                                <div class="form-group">
                                    <label for="nisn">NISN*</label>
                                    <input type="number" class="form-control" id="nisn" name="nisn" placeholder="Nomor Induk Siswa Nasional" required>
                                </div>
                            </div>
                            {{-- <div class="col-12 col-lg-6 col-md-6">
                                <div class="form-group">
                                    <label for="no_un">No. Peserta UN*</label>
                                    <input type="text" class="form-control" id="no_un" name="no_un" placeholder="Nomor ujian nasioanl di SMP/Mts" required>
                                </div>
                            </div> --}}
                        </div>
                    </div>
                </div>
                <br>
                <div class="card">
                    <div class="card-body">
                        <label class="font-weight-bold mb-3">Jalur Peminatan</label>
                        <div class="row">
                            <div class="col-12 col-lg-6 col-md-6">
                                <div class="form-group">
                                    <label for="jurusan">Peminatan/Jurusan*</label>
                                    <select class="form-control" name="jurusan" style="border-radius: 10px" data-width="100%">
                                        <option value="Agama">Agama</option>
                                        <option value="IPS">IPS</option>
                                        <option value="MIPA">MIPA</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-12 col-lg-6 col-md-6">
                                <div class="form-group">
                                    <label for="jalur">Jalur pendaftaran*</label>
                                    <select class="form-control" name="jalur" style="border-radius: 10px" data-width="100%">
                                        <option value="Undangan">Undangan</option>
                                        <option value="Regular">Regular</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <br>
                <div class="card">
                    <div class="card-body">
                        <label class="font-weight-bold mb-3">Berkas Pendaftaran</label>
                        <div class="form-group">
                            <label for="ijazah">Raport Sem. 1 s/d 5 (PDF | max. 2 mb)*</label>
                            <input type="file" name="ijazah" class="dropify" data-max-file-size="2M" data-allowed-file-extensions="pdf" data-default-file="PDF"  data-height="140" />
                        </div>
                        <div class="form-group">
                            <label for="photo">Pas foto 3x4 (.jpg .png .jpeg | max. 2 mb)*</label>
                            <input type="file" name="photo" class="dropify" data-max-file-size="2M" data-allowed-file-extensions="jpeg png jpg tiff" data-default-file="IMG"  data-height="140" />
                        </div>
                    </div>
                </div>
                <br>
                <label class="font-weight-bold mb-3">
                    Perhatian*
                </label>
                <label class="mb-2">
                    - Harap konfirmasi pendaftaran ke kontak person yang tertera atau menghubungi pihak yang bertanggung jawab atas penerimaan peserta didik baru MAN 1 Hulu Sungai Tengah
                </label>
                <label class="mb-2">
                    - Cek kembali data yang anda masukkan (Data yang sudah dikirm tidak bisa dirubah)
                </label>
                <label class="mb-2">
                    - Informasi lebih lanjut dapat dicek dibagian menu <a target="_blank" href="{{ route('cek_status_pendaftaran') }}">Cek Status Pendaftaran</a> dengan memasukkan nama lengkap anda
                </label>
                <div class="mt-4 d-flex">
                    <button type="button" title="Hapus Data Calon"  id="submit_button"
                        onclick="send_form_regis()"
                        class="btn btn-warning mr-2 mb-2 mb-md-0 text-white">
                        Kirim data pendaftaran
                    </button>
                </div>
            </form>
        </div>
        {{-- <div class="col-12 col-lg-3 col-md-3">
            @include('includes.sidebar_user')
        </div> --}}
    </div>
</div>
@endsection
