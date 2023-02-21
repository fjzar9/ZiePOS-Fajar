<div class="table-responsive">
    <table class="table table-hover align-middle" id="dataTable1">
        <thead>
            <tr>
                <th>No</th>
                <th>Nama Produk</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($produk as $p)
            <tr>
                <td>{{ $i = (isset($i)?++$i:$i=1) }}</td>
                <td>{{ $p->nama_produk }}</td>
                <td>
                    <button type="button" class="btn icon btn-warning edit-data" data-bs-toggle="modal" data-bs-target="#produkmodal" data-mode="edit" data-id="{{ $p->id }}" data-nama_produk="{{ $p->nama_produk }}">
                        <i class="bi bi-pencil-fill"></i>
                    </button>
                    <form method="POST" action="{{ route('produk.destroy', $p->id) }}" style="display: inline">
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