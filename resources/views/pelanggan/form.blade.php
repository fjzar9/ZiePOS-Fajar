<!-- Button Modal -->
<button type="button" class="btn icon icon-left btn-primary" data-bs-toggle="modal" data-bs-target="#pelangganmodal">
    <i data-feather="plus-circle"></i> Tambah Pelanggan
</button>

<!-- Modal -->
<div class="modal fade text-left" id="pelangganmodal" tabindex="-1"
    role="dialog" aria-labelledby="myModalLabel33" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title" id="myModalLabel33">Tambah Data Pelanggan</h4>
            </div>
            <div class="modal-body">
                    <form method="POST" action="pelanggan">
                        @csrf
                        <div id="method"></div>
                        <input type="hidden" class="form-control" id="kode_pelanggan" value="{{ $kode_pelanggan }}" name="kode_pelanggan" required>
                    <label class="mb-2">Nama pelanggan </label>
                    <div class="form-group">
                        <input type="text" class="form-control" id="nama" name="nama" required>
                    </div>
                    <label class="mb-2">Alamat </label>
                    <div class="form-group">
                        <input type="text" class="form-control" id="alamat" name="alamat" required>
                    </div>
                    <label class="mb-2">No Telp </label>
                    <div class="form-group">
                        <input type="number" class="form-control" id="no_telp" name="no_telp" required>
                    </div>
                    <label class="mb-2">Email </label>
                    <div class="form-group">
                        <input type="text" class="form-control" id="email" name="email" required>
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