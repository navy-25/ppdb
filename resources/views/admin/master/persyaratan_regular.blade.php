@extends('layouts.dashboard')

@section('title')
Persyaratan Pendaftaran Khusus Jalur Regular
@endsection

@section('persyaratan_pendaftaran_regular')
active
@endsection

@section('css')
<link rel="stylesheet" href="{{ asset('../../../assets/vendors/datatables.net-bs4/dataTables.bootstrap4.css') }}">
<style>
    table,td,tr,th,tbody,thead{
        vertical-align: top !important;
    }
</style>
@endsection

@section('script')
<script src="{{ asset('../../../assets/js/data-table.js') }}"></script>
<script src="{{ asset('../../../assets/vendors/datatables.net/jquery.dataTables.js') }}"></script>
<script src="{{ asset('../../../assets/vendors/datatables.net-bs4/dataTables.bootstrap4.js') }}"></script>
<script src="{{ asset('../../../assets/js/data-table.js') }}"></script>
<script>
    $('#data-table').DataTable({
        processing: true,
        serverSide: true,
        responsive: true,

        pageLength: 100,
        paging: true,
        order:[[0,'ASC']],
        ajax: "{{ route('getDataPersyaratan',['category'=>3])}}",
        columns: [
            // {data: 'DT_RowIndex',name: 'DT_RowIndex'},
            {data: 'number',name: 'number'},
            // {data: 'category_name',name: 'category_name'},
            {data: 'name',name: 'name'},
            {data: 'sub_persyaratan',name: 'sub_persyaratan'},
            {data: 'action',name: 'action',orderable: true,searchable: true},
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
                next: '<svg viewBox="0 0 24 24" width="24" height="24" stroke="currentColor" stroke-width="2" fill="none" stroke-linecap="round" stroke-linejoin="round" class="css-i6dzq1"><polyline points="9 18 15 12 9 6"></polyline></svg>',
            },
        },
    });
    function data_modal(data,url){
        var data = data.split(",")
        $('.modal-title').text('Perbarui data nomor '+data[4]);
        $('#name').val( data[1]);
        $('#sub_persyaratan').html('');
        $.get("/getPersyaratanAll?id_category=3", function(response){
            $('#sub_persyaratan').append(`<option value="">Tidak ada</option>`);
            response.forEach(x => {
                if(x.id != data[0]){
                    if(x.id == data[3]){
                        $('#sub_persyaratan').append(`<option value="`+x.id+`" selected>`+x.number+`. `+x.name+`</option>`);
                    }else{
                        $('#sub_persyaratan').append(`<option value="`+x.id+`">`+x.number+`. `+x.name+`</option>`);
                    }
                }
            });
            $('.modal-update').attr('action',url);
        });
    }
</script>
@endsection

@section('content')
<div class="row mb-3">
    <div class="col-6">
        <h6 class="card-title">Perbarui persyaratan pendaftaran khusus jalur regular</h6>
    </div>
    <div class="col-6">
        <button type="button"
            data-toggle="modal"
            data-target="#modalAdd"
            title="Tambah persyaratan khususj jalur regular"
            class="btn btn-inverse-primary float-right">
            Tambah persyaratan
        </button>
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
                                {{-- <th style="width: 5%">No</th> --}}
                                <th>Urutan</th>
                                {{-- <th>Kategori</th> --}}
                                <th>Nama Persyaratan</th>
                                <th>Sub dari</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="modal fade" id="modalAdd" tabindex="-1" role="dialog" aria-labelledby="modalAddLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <form class="modal-add" method="POST" action="{{ route('store_persyaratan_pendaftaran',['category'=>3]) }}">
                @csrf
                <div class="modal-header">
                    <h5>Tambah persyaratan khusus jalur regular</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close" > <span aria-hidden="true">&times;</span> </button>
                </div>
                <div class="modal-body">
                    <div class="form-group">
                        <label for="name">Nama Persyaratan</label>
                        <input type="text" class="form-control" name="name" placeholder="nama persyaratan" required autocomplete="name">
                    </div>
                    <div class="form-group">
                        <label for="sub_persyaratan">Sub dari</label>
                        <select name="sub_persyaratan">
                            <option value="">Tidak ada</option>
                            @foreach ($data as $x)
                                <option value="{{ $x->id }}">{{ $x->number }}. {{ $x->name }}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup </button>
                    <button type="submit" class="btn btn-warning text-white" >Tambahkan</button>
                </div>
            </form>
        </div>
    </div>
</div>
@include('admin.master.modal_peryaratan')
@endsection
