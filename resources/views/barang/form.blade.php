<!-- Button Modal -->
<button type="button" class="btn icon icon-left btn-primary" data-bs-toggle="modal" data-bs-target="#barangmodal">
    <i data-feather="plus-circle"></i> Tambah Barang
</button>

<!-- Modal -->
<div class="modal fade text-left" id="barangmodal" tabindex="-1"
    role="dialog" aria-labelledby="myModalLabel33" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title" id="myModalLabel33">Tambah Data Barang</h4>
            </div>
            <div class="modal-body">
                    <form method="POST" action="barang">
                        @csrf
                        <div id="method"></div>
                        <div class="row">
                            <input type="hidden" class="form-control" id="kode_barang" value="{{ $kode_barang }}" name="kode_barang" required>
                            <input type="hidden" id="user_id" class="form-control" name="user_id" value="{{ auth()->user()->id }}" required>
                            <div class="col-md-6 col-12">
                                <label for="first-name-column" class="mb-2">Kategori</label>
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <select class="choices form-select" id="produk_id" name="produk_id" required>
                                            <option value="" selected disabled hidden></option>
                                            @foreach($produk as $p => $item)
                                            <option value="{{ $item }}">{{ $p }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6 col-12">
                                <label for="first-name-column" class="mb-2">Nama Barang</label>
                                <div class="form-group">
                                    <input type="text" class="form-control" id="nama_barang" name="nama_barang" required>
                                </div>
                            </div>
                            <div class="col-md-6 col-12">
                                <label for="first-name-column" class="mb-2">Satuan</label>
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <select class="choices form-select" id="satuan_id" name="satuan_id" required>
                                            <option value="" selected disabled hidden></option>
                                            @foreach($satuan as $s => $item)
                                            <option value="{{ $item }}">{{ $s }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6 col-12">
                                <label for="first-name-column" class="mb-2">Harga Jual</label>
                                <div class="form-group">
                                    <input type="number" class="form-control" id="harga_jual" name="harga_jual" required>
                                </div>
                            </div>
                            <div class="col-md-6 col-12">
                                <label for="first-name-column" class="mb-2">Stok</label>
                                <div class="form-group">
                                    <input type="number" class="form-control" id="stok" name="stok" required>
                                </div>
                            </div>
                            <div class="col-md-6 col-12">
                                <label for="first-name-column" class="mb-2">Ditarik</label>
                                <div class="form-group">
                                    <input type="number" class="form-control" id="ditarik" name="ditarik" required>
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