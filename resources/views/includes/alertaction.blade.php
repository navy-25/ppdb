<script>
    function are_you_sure(title,url,confirm_title){
        event.preventDefault();
        Swal.fire({
            title:'Apakah kamu yakin '+title+'?',
            text:  'Pertimbangkan kembali jika anda ingin merubah atau menghapus data',
            icon: 'warning',
            showConfirmButton: true,
            showCancelButton: true,
            cancelButtonText: "Batal",
            confirmButtonText: confirm_title,
            confirmButtonColor: "#dc3545",
            cancelButtonColor: "#c8c8c8",
        }).then((result) => {
            if (result.isConfirmed) {
                window.location.href = url;
            }
        })
    }
</script>
