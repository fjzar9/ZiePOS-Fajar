<div class="table-responsive">
    <table class="table table-hover align-middle" id="dataTable1">
        <thead>
            <tr>
                <th>No</th>
                <th>Kode</th>
                <th>Kategori</th>
                <th>Nama</th>
                <th>Satuan</th>
                <th>Harga</th>
                <th>Stok</th>
                <th>Ditarik</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($barang as $b)
            <tr>
                <td>{{ $i = (isset($i)?++$i:$i=1) }}</td>
                <td>{{ $b->kode_barang }}</td>
                <td>{{ $b->produk->nama_produk }}</td>
                <td>{{ $b->nama_barang }}</td>
                <td>{{ $b->satuan->jenis_satuan }}</td>
                <td>{{ $b->harga_jual }}</td>
                <td>{{ $b->stok }}</td>
                <td>{{ $b->ditarik }}</td>
                <td>
                    <button type="button" class="btn btn-warning edit-data" data-bs-toggle="modal" data-bs-target="#barangmodal" data-mode="edit" data-id="{{ $b->id }}" data-kode_barang="{{ $b->kode_barang }}" data-produk_id="{{ $b->produk_id }}" data-nama_barang="{{ $b->nama_barang }}" data-satuan_id="{{ $b->satuan_id }}" data-harga_jual="{{ $b->harga_jual }}" data-stok="{{ $b->stok }}" data-ditarik="{{ $b->ditarik }}">
                        <i class="bi bi-pencil-fill"></i>
                    </button>
                    <form method="POST" action="{{ route('barang.destroy', $b->id) }}" style="display: inline">
                        @csrf
                        @method('DELETE')
                        <button type="button" class="btn btn-danger delete-data">
                            <i class="bi bi-trash3-fill"></i>
                        </button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>