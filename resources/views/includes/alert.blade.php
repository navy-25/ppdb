@if($message = Session::get('success'))
    <script>
        Swal.fire({
            icon: 'success',
            title: 'Berhasil',
            text: '{{ $message }}',
            showConfirmButton: false,
            timer: 1500
        })
    </script>
@elseif ($errors->any())
    <script>
        Swal.fire({
            icon: 'error',
            title: 'Kesalahan',
            text: '{{$errors->first()}}',
            showConfirmButton: false,
            timer: 4000
        })
    </script>
@elseif($message = Session::get('error'))
    <script>
        Swal.fire({
            icon: 'error',
            title: 'Gagal',
            text: '{{ $message }}',
            showConfirmButton: false,
            timer: 4500
        })
    </script>
@endif
