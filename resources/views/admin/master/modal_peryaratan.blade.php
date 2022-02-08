<div class="modal fade" id="modalUpdate" tabindex="-1" role="dialog" aria-labelledby="modalUpdateLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <form class="modal-update" method="POST" action="">
                @csrf
                <div class="modal-header">
                    <h5 class="modal-title">Perbarui data biaya persyaratan</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close" > <span aria-hidden="true">&times;</span> </button>
                </div>
                <div class="modal-body">
                    <div class="form-group">
                        <label for="name">Nama Persyaratan</label>
                        <input type="text" class="form-control" id="name" name="name" placeholder="nama persyaratan" required autocomplete="name">
                    </div>
                    <div class="form-group">
                        <label for="sub_persyaratan">Sub dari</label>
                        <select name="sub_persyaratan" id="sub_persyaratan"></select>
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
