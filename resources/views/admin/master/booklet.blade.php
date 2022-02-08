@extends('layouts.dashboard')

@section('title')
Booklet
@endsection

@section('booklet')
active
@endsection

@section('css')
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
@endsection

@section('content')
<div class="row mb-3">
    <div class="col-12">
        <h6 class="card-title">Perbarui dokumen booklet</h6>
    </div>
</div>
<div class="row">
    <div class="col-12 col-lg-6 col-md-6 mb-2 order-2 order-lg-1 order-md-1">
        <div class="card">
            <div class="card-body">
                <form class="forms-sample" method="POST" action="{{ route('update_booklet') }}" enctype="multipart/form-data">
                    @csrf
                    <div class="form-group">
                        <label for="file">Upload file (PDF | max. 10 mb)</label>
                        <input type="file" name="file" class="dropify" data-max-file-size="10M" data-allowed-file-extensions="pdf" data-default-file="PDF"  data-height="140" />
                    </div>
                    <div class="mt-4 d-flex">
                        <button type="submit" id="submit_button"  class="btn btn-warning mr-2 mb-2 mb-md-0 text-white">
                            Simpan
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <div class="col-12 col-lg-6 col-md-6 mb-2 order-1 order-lg-2 order-md-2">
        <div class="card">
            <div class="card-body">
                <iframe src="{{ asset('assets/uploads/landing/'.$data->file) }}" height="600px" width="100%" title="Booklet"></iframe>
            </div>
        </div>
    </div>
</div>
@endsection
