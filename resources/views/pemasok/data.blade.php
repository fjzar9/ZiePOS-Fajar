<div class="table-responsive">
    <table class="table table-hover align-middle" id="dataTable1">
        <thead>
            <tr>
                <th>No</th>
                <th>Nama Pemasok</th>
                <th>Alamat</th>
                <th>No Telp</th>
                <th>Salesman</th>
                <th>Bank</th>
                <th>No Rekening</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($pemasok as $p)
            <tr>
                <td>{{ $i = (isset($i)?++$i:$i=1) }}</td>
                <td>{{ $p->nama_pemasok }}</td>
                <td>{{ $p->alamat }}</td>
                <td>{{ $p->no_telp }}</td>
                <td>{{ $p->salesman }}</td>
                <td>{{ $p->bank->nama_bank }}</td>
                <td>{{ $p->no_rek }}</td>
                <td>
                    <button type="button" class="btn icon btn-warning edit-data" data-bs-toggle="modal" data-bs-target="#pemasokmodal" data-mode="edit" data-id="{{ $p->id }}" data-nama_pemasok="{{ $p->nama_pemasok }}" data-alamat="{{ $p->alamat }}" data-no_telp="{{ $p->no_telp }}" data-salesman="{{ $p->salesman }}" data-bank_id="{{ $p->bank_id }}" data-no_rek="{{ $p->no_rek }}">
                        <i class="bi bi-pencil-fill"></i>
                    </button>
                    <form method="POST" action="{{ route('pemasok.destroy', $p->id) }}" style="display: inline">
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