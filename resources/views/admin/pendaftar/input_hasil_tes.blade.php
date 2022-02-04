@extends('layouts.dashboard')

@section('title')
Input Hasil Tes Peserta Regular
@endsection

@section('peserta_lolos')
active
@endsection

@section('css')
<link rel="stylesheet" href="{{ asset('../../../assets/vendors/datatables.net-bs4/dataTables.bootstrap4.css') }}">
@endsection

@section('script')
<script src="{{ asset('../../../assets/js/data-table.js') }}"></script>
<script src="{{ asset('../../../assets/vendors/datatables.net/jquery.dataTables.js') }}"></script>
<script src="{{ asset('../../../assets/vendors/datatables.net-bs4/dataTables.bootstrap4.js') }}"></script>
<script src="{{ asset('../../../assets/js/data-table.js') }}"></script>
<script>
    $('#data-table').DataTable({
        processing:true,
        serverSide:true,
        responsive: true,

        pageLength: 10,
        paging: true,
        ajax: "{{ route('getDataPesertaRegular') }}",
        columns: [
            {data: 'DT_RowIndex', name: 'DT_RowIndex'},
            {data: 'photo', name: 'photo'},
            {data: 'nama_lengkap', name: 'nama_lengkap'},
            {data: 'jurusan', name: 'jurusan'},
            {data: 'asal_sekolah', name: 'asal_sekolah'},
            {data: 'nilai', name: 'nilai'},
            {data: 'status', name: 'status'},
            {data: 'action', name: 'action', orderable: true, searchable: true},
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
        <h6 class="card-title">Input Hasil Tes Peserta Regular</h6>
    </div>
</div>
<div class="row mb-3">
    <div class="col-12">
        @if (count($data) == 0)
            <div class="alert alert-success" role="alert">
                <p>Data peserta reguler kosong, kemungkinan besar belum ada peserta pendaftar di jalur regular</p>
            </div>
        @else
            <div class="card">
                <div class="card-body">
                    <form class="forms-sample" id="form_login" method="POST" action="{{ route('save_nilai') }}">
                        @csrf
                        <div class="row">
                            <div class="col-12 col-lg-4 col-md-4">
                                <div class="form-group">
                                    <label for="">Nama Pendaftar Regular</label>
                                    <select class="form-control select2-single" name="id_siswa" style="border-radius: 10px" data-width="100%">
                                        @foreach ($data as $x)
                                            <option value="{{ $x->id_siswa }}">{{ $x->no_pendaftaran }} - {{ $x->nama_lengkap }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="col-12 col-lg-3 col-md-3">
                                <div class="form-group">
                                    <label for="">Nilai Tes</label>
                                    <select class="form-control " name="nilai_tes" style="border-radius: 10px;height:30px" data-width="100%">
                                        <option value="100">100</option>
                                        <option value="90">90</option>
                                        <option value="80">80</option>
                                        <option value="70">70</option>
                                        <option value="60">60</option>
                                        <option value="50">50</option>
                                        <option value="40">40</option>
                                        <option value="30">30</option>
                                        <option value="20">20</option>
                                        <option value="10">10</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-12 col-lg-3 col-md-3">
                                <div class="form-group">
                                    <label for="">Status</label>
                                    <select class="form-control " name="status" style="border-radius: 10px;height:30px" data-width="100%">
                                        <option value="Lulus">Lulus</option>
                                        <option value="Tidak Lulus">Tidak Lulus</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-12 col-lg-2 col-md-2">
                                <div class="form-group">
                                    <label for="" class="text-white">&nbsp;</label>
                                    <button type="submit" id="submit_button" style=";height:30px" class="form-control btn btn-warning mr-2 mb-2 mb-md-0 text-white">
                                        Tambah
                                    </button>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        @endif
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
                                <th>Foto</th>
                                <th>Nama Lengkap</th>
                                <th>Jurusan</th>
                                <th>Asal Sekolah</th>
                                <th>Input Nilai</th>
                                <th>Status</th>
                                <th style="width: 10%">Action</th>
                            </tr>
                        </thead>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
