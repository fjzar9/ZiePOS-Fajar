<!-- Modal -->
<div class="modal fade text-left" id="tblBarangModal" tabindex="-1"
    role="dialog" aria-labelledby="myModalLabel33" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title" id="myModalLabel33">Tambah Data Barang</h4>
                <button type="button" class="close" data-bs-dismiss="modal"
                    aria-label="Close">
                    <i data-feather="x"></i>
                </button>
            </div>
            <div class="modal-body">
                <div class="table-responsive">
                    <table class="table" id="dataTable1">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Kode Barang</th>
                                <th>Nama Barang</th>
                                <th>Harga Barang</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($barang as $b)
                            <tr>
                                <td>
                                    {{ $i = (isset($i)?++$i:$i=1) }}
                                    <input type="hidden" class="idBarang" name="idBarang" value="{{ $b->id }}">
                                    <input type="hidden" class="idSatuan" name="idSatuan" value="{{ $b->satuan->jenis_satuan }}">
                                </td>
                                <td>{{ $b->kode_barang }}</td>
                                <td>{{ $b->nama_barang }}</td>
                                <td>{{ $b->harga_jual }}</td>
                                <td><button type="button" class="btn btn-primary pilihBarangBtn"><i data-feather="plus"></i></button></td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>