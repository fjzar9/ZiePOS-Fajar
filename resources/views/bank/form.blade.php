<!-- Button Modal -->
<button type="button" class="btn icon icon-left btn-primary" data-bs-toggle="modal" data-bs-target="#bankmodal">
    <i data-feather="plus-circle"></i> Tambah Bank
</button>

<!-- Modal -->
<div class="modal fade text-left" id="bankmodal" tabindex="-1"
    role="dialog" aria-labelledby="myModalLabel33" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title" id="myModalLabel33">Tambah Data Bank</h4>
            </div>
            <div class="modal-body">
                    <form method="POST" action="bank">
                        @csrf
                        <div id="method"></div>
                    <label class="mb-2">Nama Bank </label>
                    <div class="form-group">
                        <input type="text" class="form-control" id="nama_bank" name="nama_bank" required>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-light-secondary"
                        data-bs-dismiss="modal">
                        <i class="bx bx-x d-block d-sm-none"></i>
                        <span class="d-none d-sm-block">Kembali</span>
                    </button>
                    <button type="submit" class="btn btn-primary ml-1">
                        <i class="bx bx-check d-block d-sm-none"></i>
                        <span class="d-none d-sm-block">Simpan</span>
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>