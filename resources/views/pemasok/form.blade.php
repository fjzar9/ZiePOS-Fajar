<!-- Button Modal -->
<button type="button" class="btn icon icon-left btn-primary" data-bs-toggle="modal" data-bs-target="#pemasokmodal">
    <i data-feather="plus-circle"></i> Tambah Pemasok
</button>

<!-- Modal -->
<div class="modal fade text-left" id="pemasokmodal" tabindex="-1"
    role="dialog" aria-labelledby="myModalLabel33" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title" id="myModalLabel33">Tambah Data Pemasok</h4>
            </div>
            <div class="modal-body">
                    <form method="POST" action="pemasok">
                        @csrf
                        <div id="method"></div>
                        <div class="row">
                            <div class="col-md-6 col-12">
                                <label for="first-name-column" class="mb-2">Nama Pemasok</label>
                                <div class="form-group">
                                    <input type="text" class="form-control" id="nama_pemasok" name="nama_pemasok" required>
                                </div>
                            </div>
                            <div class="col-md-6 col-12">
                                <label for="first-name-column" class="mb-2">Alamat Pemasok</label>
                                <div class="form-group">
                                    <input type="text" class="form-control" id="alamat" name="alamat" required>
                                </div>
                            </div>
                            <div class="col-md-6 col-12">
                                <label for="first-name-column" class="mb-2">No Telp</label>
                                <div class="form-group">
                                    <input type="number" class="form-control" id="no_telp" name="no_telp" required>
                                </div>
                            </div>
                            <div class="col-md-6 col-12">
                                <label for="first-name-column" class="mb-2">Salesman</label>
                                <div class="form-group">
                                    <input type="text" class="form-control" id="salesman" name="salesman" required>
                                </div>
                            </div>
                            <div class="col-md-6 col-12">
                                <label for="first-name-column" class="mb-2">Bank</label>
                                <div class="form-group">
                                    <select class="choices form-select" id="bank_id" name="bank_id" required>
                                        <option value="" selected disabled hidden></option>
                                        @foreach($bank as $b => $item)
                                        <option value="{{ $item }}">{{ $b }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-6 col-12">
                                <label for="first-name-column" class="mb-2">No Rekening</label>
                                <div class="form-group">
                                    <input type="number" class="form-control" id="no_rek" name="no_rek" required>
                                </div>
                            </div>
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