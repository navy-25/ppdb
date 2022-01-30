<script>
    function are_you_sure(title,url,confirm_title){
        event.preventDefault();
        Swal.fire({
            title:'Are you sure '+title+'?',
            text:  'You won t be able to revert this',
            icon: 'warning',
            showConfirmButton: true,
            showCancelButton: true,
            cancelButtonText: "Cancel",
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
