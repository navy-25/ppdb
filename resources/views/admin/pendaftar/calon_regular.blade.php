@extends('layouts.dashboard')

@section('title')
Daftar Calon Peserta Didik Baru
@endsection

@section('regular')
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
        ajax: "{{ route('getDataCalonPendfatar',['jalur'=>'Regular']) }}",
        columns: [
            {data: 'DT_RowIndex', name: 'DT_RowIndex'},
            {data: 'photo', name: 'photo'},
            {data: 'nama_lengkap', name: 'nama_lengkap'},
            {data: 'no_pendaftaran', name: 'no_pendaftaran'},
            {data: 'no_peserta', name: 'no_peserta'},
            {data: 'jurusan', name: 'jurusan'},
            {data: 'asal_sekolah', name: 'asal_sekolah'},
            {data: 'date', name: 'date'},
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
        <h6 class="card-title">Calon Pendaftar Regular</h6>
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
                                <th>No. Pendafataran</th>
                                <th>No. Peserta</th>
                                <th>Jurusan</th>
                                <th>Asal Sekolah</th>
                                <th>Tanggal Daftar</th>
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
