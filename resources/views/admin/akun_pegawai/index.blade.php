@extends('layouts.dashboard')

@section('title')
Akun Pegawai
@endsection

@section('akun_pegawai')
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
        processing: true,
        serverSide: true,
        responsive: true,

        pageLength: 10,
        paging: true,
        ajax: "{{ route('getDataAkunPegwai')}}",
        columns: [
            {data: 'DT_RowIndex',name: 'DT_RowIndex'},
            {data: 'name',name: 'name'},
            {data: 'email',name: 'email'},
            {data: 'status',name: 'status'},
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
        $('.modal-title').text('Perbarui data '+data[0]);
        $('#name').val( data[0]);
        $('#email').val( data[1]);
        $('.modal-update').attr('action',url);
    }
    $('#batalkan').attr("style", "display:none");
    document.getElementById('password').readOnly = true;
    function ganti_pass(){
        document.getElementById('password').readOnly = false;
        $('#batalkan').attr("style", "display:block");
        $('#ganti_password').attr("style", "display:none");
    }
    function batal(){
        document.getElementById('password').readOnly = true;
        $('#ganti_password').attr("style", "display:block");
        $('#batalkan').attr("style", "display:none");
    }
</script>
@endsection

@section('content')
@if(Auth::user()->role == 'Root')
    <div class="row mb-3">
        <div class="col-6">
            <h6 class="card-title">Kelola Akun Pegawai</h6>
        </div>
        <div class="col-6">
            <button type="button"
                data-toggle="modal"
                data-target="#modalAdd"
                title="Tambah akun pegawai"
                class="btn btn-inverse-primary float-right">
                Tambah akun
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
                                    <th style="width: 5%">No</th>
                                    <th>Nama Lengkap</th>
                                    <th>Email</th>
                                    <th>Status</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="modal fade" id="modalUpdate" tabindex="-1" role="dialog" aria-labelledby="modalUpdateLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <form class="modal-update" method="POST" action="">
                    @csrf
                    <div class="modal-header">
                        <h5 class="modal-title"></h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close" > <span aria-hidden="true">&times;</span> </button>
                    </div>
                    <div class="modal-body">
                        <div class="form-group">
                            <label for="name">Nama Lengkap</label>
                            <input type="text" class="form-control" id="name" name="name" placeholder="nama lengkap beserta gelar" required autocomplete="name">
                        </div>
                        <div class="form-group">
                            <label for="email">Alamat Email</label>
                            <input type="email" class="form-control" id="email" name="email" placeholder="emailmu@gmail.com" required autocomplete="email">
                        </div>
                        <div class="row">
                            <div class="col-8">
                                <div class="form-group">
                                    <label for="password">Password (optional)</label>
                                    <input type="text" class="form-control" id="password" name="password" placeholder="min. 8 huruf" autocomplete="password">
                                </div>
                            </div>
                            <div class="col-4">
                                <div class="form-group">
                                    <label> &nbsp;</label>
                                    <button type="button" id="ganti_password" onclick="ganti_pass()" class="form-control btn btn-inverse-info">Ganti Password</button>
                                    <button type="button" id="batalkan" onclick="batal()" class="form-control btn btn-inverse-danger">Batalkan</button>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup </button>
                        <button type="submit" class="btn btn-warning text-white" >Perbarui</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <div class="modal fade" id="modalAdd" tabindex="-1" role="dialog" aria-labelledby="modalAddLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <form class="modal-add" method="POST" action="{{ route('store_akun_pegawai') }}">
                    @csrf
                    <div class="modal-header">
                        <h5>Tambah akun pegawai</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close" > <span aria-hidden="true">&times;</span> </button>
                    </div>
                    <div class="modal-body">
                        <div class="form-group">
                            <label for="add_name">Nama Lengkap</label>
                            <input type="text" class="form-control" id="add_name" name="name" placeholder="nama lengkap beserta gelar" required autocomplete="add_name">
                        </div>
                        <div class="form-group">
                            <label for="add_email">Alamat Email</label>
                            <input type="email" class="form-control" id="add_email" name="email" placeholder="emailmu@gmail.com" required autocomplete="add_email">
                        </div>
                        <div class="form-group">
                            <label for="add_password">Password</label>
                            <input type="text" class="form-control" id="add_password" name="password" placeholder="min. 8 huruf" autocomplete="add_password">
                        </div>
                        <div class="form-group">
                            <label for="add_ulangi-password">Ulangi Password</label>
                            <input type="text" class="form-control" id="add_ulangi-password" name="ulangi_password" placeholder="min. 8 huruf" autocomplete="add_ulangi-password">
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup </button>
                        <button type="submit" class="btn btn-warning text-white" >Tambah</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@else
<div class="alert alert-info w-100" role="alert">
	<h4 class="alert-heading mb-2">Opps, Kamu bukan admin</h4>
	<p>Akses kamu dibatasi karena kamu bukan admin teritinggi.</p>
</div>
@endif
@endsection
