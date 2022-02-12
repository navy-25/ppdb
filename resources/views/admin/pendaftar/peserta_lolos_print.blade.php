@extends('layouts.dashboard')

@section('title')
Daftar Peserta Lulus Seleksi PPDB MAN 1 Hulu Sungai Tengah
@endsection

@section('peserta_lolos_print')
active
@endsection

@section('css')
<link rel="stylesheet" href="{{ asset('../../../assets/vendors/datatables.net-bs4/dataTables.bootstrap4.css') }}">
<link rel="stylesheet" href="https://cdn.datatables.net/buttons/2.2.2/css/buttons.dataTables.min.css">
<style>
    .dt-buttons{
        float: left !important;
    }
    .dt-button{
        border-radius: 10px !important;
        background-color: rgba(5,163,74,.2) !important;
        background-image: none !important;
        border-color: rgba(5,163,74,0) !important;
        color: #05a34a !important;
    }
    .dt-button:hover{
        border-radius: 10px !important;
        background-color: rgba(4, 134, 60, 0.2) !important;
        background-image: none !important;
        border-color: rgba(5,163,74,0) !important;
        color: #05a34a !important;
    }
    .dt-button:active,.dt-button:focus{
        box-shadow: none !important;
    }
</style>
@endsection

@section('script')
<script src="{{ asset('../../../assets/js/data-table.js') }}"></script>
<script src="{{ asset('../../../assets/vendors/datatables.net/jquery.dataTables.js') }}"></script>
<script src="{{ asset('../../../assets/vendors/datatables.net-bs4/dataTables.bootstrap4.js') }}"></script>
<script src="{{ asset('../../../assets/js/data-table.js') }}"></script>

<script src="https://cdn.datatables.net/buttons/2.2.2/js/dataTables.buttons.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/pdfmake.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/vfs_fonts.js"></script>
<script src="https://cdn.datatables.net/buttons/2.2.2/js/buttons.html5.min.js"></script>
<script>
    $('#data-table').DataTable({
        processing:true,
        serverSide:true,
        responsive: true,

        order:[[1,'ASC']],
        ajax: "{{ route('getDataPesertaLolos') }}",
        dom: 'Bfrtip',
        buttons: [
            'excel',
            'csv'
        ],
        pageLength: 999999999,
        paging: true,
        columns: [
            {data: 'DT_RowIndex', name: 'DT_RowIndex'},
            {data: 'nama_lengkap', name: 'nama_lengkap'},
            {data: 'jalur', name: 'jalur'},
            {data: 'jurusan', name: 'jurusan'},
            {data: 'status', name: 'status'},
            {data: 'tempat_lahir', name: 'tempat_lahir'},
            {data: 'tanggal_lahir', name: 'tanggal_lahir'},
            {data: 'jenis_kelamin', name: 'jenis_kelamin'},
            {data: 'nisn', name: 'nisn'},
            {data: 'nis', name: 'nis'},
            {data: 'email', name: 'email'},
            {data: 'telepon', name: 'telepon'},
            {data: 'hobi', name: 'hobi'},
            {data: 'cita_cita', name: 'cita_cita'},
            {data: 'jumlah_saudara', name: 'jumlah_saudara'},
            {data: 'anak_ke', name: 'anak_ke'},
            {data: 'asal_sekolah', name: 'asal_sekolah'},
            {data: 'npsn_asal_sekolah', name: 'npsn_asal_sekolah'},
            {data: 'jenis_sekolah', name: 'jenis_sekolah'},
            {data: 'status_sekolah', name: 'status_sekolah'},

            {data: 'alamat', name: 'alamat'},
            {data: 'desa_kelurahan', name: 'desa_kelurahan'},
            {data: 'kecamatan', name: 'kecamatan'},
            {data: 'kab_kota', name: 'kab_kota'},
            {data: 'provinsi', name: 'provinsi'},
            {data: 'kodepos', name: 'kodepos'},

            {data: 'jarak_tempat_tinggal', name: 'jarak_tempat_tinggal'},
            {data: 'transportasi', name: 'transportasi'},
            {data: 'status_penerimaan_pip_bsm', name: 'status_penerimaan_pip_bsm'},
            {data: 'alasan_menerima_pip_bsm', name: 'alasan_menerima_pip_bsm'},
            {data: 'periode_menerima_pip_bsm', name: 'periode_menerima_pip_bsm'},
            {data: 'bidang_prestasi', name: 'bidang_prestasi'},
            {data: 'tingkat_prestasi', name: 'tingkat_prestasi'},
            {data: 'peringkat', name: 'peringkat'},
            {data: 'tahun', name: 'tahun'},
            {data: 'status_beasiswa', name: 'status_beasiswa'},
            {data: 'sumber_beasiswa', name: 'sumber_beasiswa'},
            {data: 'jenis_beasiswa', name: 'jenis_beasiswa'},
            {data: 'jangka_waktu', name: 'jangka_waktu'},
            {data: 'besaran_uang', name: 'besaran_uang'},

            {data: 'no_kk', name: 'no_kk'},
            {data: 'nama_ayah', name: 'nama_ayah'},
            {data: 'nik_ayah', name: 'nik_ayah'},
            {data: 'pendidikan_terakhir_ayah', name: 'pendidikan_terakhir_ayah'},
            {data: 'telepon_ayah', name: 'telepon_ayah'},
            {data: 'pekerjaan_ayah', name: 'pekerjaan_ayah'},
            {data: 'nama_ibu', name: 'nama_ibu'},
            {data: 'nik_ibu', name: 'nik_ibu'},
            {data: 'pendidikan_terakhir_ibu', name: 'pendidikan_terakhir_ibu'},
            {data: 'telepon_ibu', name: 'telepon_ibu'},
            {data: 'pekerjaan_ibu', name: 'pekerjaan_ibu'},
            {data: 'penghasilan_perbulan', name: 'penghasilan_perbulan'},
            {data: 'nomor_kss_kps', name: 'nomor_kss_kps'},
            {data: 'nomor_pkh', name: 'nomor_pkh'},
            {data: 'nomor_kip', name: 'nomor_kip'},
        ],
        columnDefs: [
            {
                targets: 0,
                className: 'table-stabilo',
            },
        ],
        language: {
            paginate: {
                previous: '<svg viewBox="0 0 24 24" width="24" height="24" stroke="currentColor" stroke-width="2" fill="none" stroke-linecap="round" stroke-linejoin="round" class="css-i6dzq1"><polyline points="15 18 9 12 15 6"></polyline></svg>',
                next:  '<svg viewBox="0 0 24 24" width="24" height="24" stroke="currentColor" stroke-width="2" fill="none" stroke-linecap="round" stroke-linejoin="round" class="css-i6dzq1"><polyline points="9 18 15 12 9 6"></polyline></svg>',
            },
        },
    });
    </script>
@endsection

@section('content')
<div class="row mb-3">
    <div class="col-12">
        <h6 class="card-title">Data Laporan Peserta Lulus Seleksi</h6>
    </div>
</div>
<div class="row">
    <div class="col-md-12 grid-margin stretch-card">
        <div class="card">
            <div class="card-body">
                <div class="table-responsive">
                    <table id="data-table" class="table display table-hover table-bordered w-100">
                        <thead>
                            <tr>
                                <th style="width: 5%">No</th>
                                <th>Nama Lengkap</th>
                                <th>Jalur</th>
                                <th>Jurusan</th>
                                <th>Status</th>

                                <th>Tempat Lahir</th>
                                <th>Tanggal Lahir</th>
                                <th>Jenis Kelamin</th>
                                <th>NISN</th>
                                <th>NIK</th>
                                <th>Email</th>
                                <th>Telepon</th>
                                <th>Hobi</th>
                                <th>Cita-cita</th>
                                <th>Jumlah Saudara</th>
                                <th>Anak ke-</th>
                                <th>Asal Sekolah</th>
                                <th>NPSN Asal sekolah</th>
                                <th>Jenis Sekolah</th>
                                <th>Status Sekolah</th>

                                <th>Alamat</th>
                                <th>Ds.</th>
                                <th>Kec.</th>
                                <th>Kab/Kota</th>
                                <th>Propinsi</th>
                                <th>Kode pos</th>

                                <th>Jarak</th>
                                <th>Transportasi</th>
                                <th>Status PIP/BSM</th>
                                <th>Alasan PIP/BSM</th>
                                <th>Periode PIP/BSM</th>
                                <th>Bidang Prestasi</th>
                                <th>Tingkat Prestasi</th>
                                <th>Peringkat</th>
                                <th>Tahun</th>
                                <th>Status Beasiswa</th>
                                <th>Sumber Beasiswa</th>
                                <th>Jenis Beasiswa</th>
                                <th>Jangka Waktu(Bulan)</th>
                                <th>Besaran Uang (Rp.)</th>

                                <th>No. KK</th>
                                <th>Nama Ayah</th>
                                <th>NIK Ayah</th>
                                <th>Pend. Terakhir</th>
                                <th>Telepon</th>
                                <th>Pekerjaan</th>
                                <th>Nama Ibu</th>
                                <th>NIK Ibu</th>
                                <th>Pend. Terakhir</th>
                                <th>Telepon</th>
                                <th>Pekerjaan</th>
                                <th>Penghasilan per-bulan</th>
                                <th>No. KSS/KPS</th>
                                <th>No. PKH</th>
                                <th>No. KIP</th>
                            </tr>
                        </thead>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
