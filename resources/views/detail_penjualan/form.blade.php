<!-- Modal -->
<div class="modal fade text-left" id="FormImport" tabindex="-1"
    role="dialog" aria-labelledby="myModalLabel33" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title" id="myModalLabel33">Import Data</h4>
            </div>
            <div class="modal-body">
                    <form method="POST" action="{{ (request()->segment(1). '/import') }}" enctype="multipart/form-data">
                        @csrf
                    <label class="mb-2">File Excel</label>
                    <div class="form-group">
                        <input type="file" class="form-control" id="import" name="import" required>
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