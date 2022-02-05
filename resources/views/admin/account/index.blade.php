@extends('layouts.dashboard')

@section('title')
Akun Saya
@endsection

@section('akun_saya')
active
@endsection

@section('css')
@endsection

@section('script')
<script>
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
<div class="row mb-3">
    <div class="col-12">
        <h6 class="card-title">Kelola Akun Saya</h6>
    </div>
</div>
<div class="row">
    <div class="col-lg-7 col-md-7 col-12">
        <div class="card">
            <div class="card-body">
                <form method="POST" action="{{ route('update_akun_saya') }}">
                    @csrf
                    <div class="form-group">
                        <label for="name">Nama Lengkap</label>
                        <input type="text" class="form-control" value="{{ $data->name }}" id="name" name="name" placeholder="nama lengkap beserta gelar" required autocomplete="name">
                    </div>
                    <div class="form-group">
                        <label for="email">Alamat Email</label>
                        <input type="email" class="form-control" id="email" value="{{ $data->email }}" name="email" placeholder="emailmu@gmail.com" required autocomplete="email">
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
                    <button type="submit" class="btn btn-warning text-white" >Perbarui</button>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
