@if($message = Session::get('success'))
    <script>
        Swal.fire({
            icon: 'success',
            title: 'Success',
            text: '{{ $message }}',
            showConfirmButton: false,
            timer: 1500
        })
    </script>
@elseif($message = Session::get('error'))
    <script>
        Swal.fire({
            icon: 'error',
            title: 'Try again',
            text: '{{ $message }}',
            showConfirmButton: false,
            timer: 4500
        })
    </script>
@endif
