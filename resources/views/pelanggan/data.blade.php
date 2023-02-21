<div class="table-responsive">
    <table class="table table-hover align-middle" id="dataTable1">
        <thead>
            <tr>
                <th>No</th>
                <th>Kode</th>
                <th>Nama</th>
                <th>Alamat</th>
                <th>No Telp</th>
                <th>Email</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($pelanggan as $p)
            <tr>
                <td>{{ $i = (isset($i)?++$i:$i=1) }}</td>
                <td>{{ $p->kode_pelanggan }}</td>
                <td>{{ $p->nama }}</td>
                <td>{{ $p->alamat }}</td>
                <td>{{ $p->no_telp }}</td>
                <td>{{ $p->email }}</td>
                <td>
                    <button type="button" class="btn btn-warning edit-data" data-bs-toggle="modal" data-bs-target="#pelangganmodal" data-mode="edit" data-id="{{ $p->id }}" data-kode_pelanggan="{{ $p->kode_pelanggan }}" data-nama="{{ $p->nama }}" data-alamat="{{ $p->alamat }}" data-no_telp="{{ $p->no_telp }}" data-email="{{ $p->email }}">
                        <i class="bi bi-pencil-fill"></i>
                    </button>
                    <form method="POST" action="{{ route('pelanggan.destroy', $p->id) }}" style="display: inline">
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