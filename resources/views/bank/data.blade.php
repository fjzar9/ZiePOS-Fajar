<div class="table-responsive">
    <table class="table table-hover align-middle" id="dataTable1">
        <thead>
            <tr>
                <th>No</th>
                <th>Nama Bank</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($bank as $b)
            <tr>
                <td>{{ $i = (isset($i)?++$i:$i=1) }}</td>
                <td>{{ $b->nama_bank }}</td>
                <td>
                    <button type="button" class="btn icon btn-warning edit-data" data-bs-toggle="modal" data-bs-target="#bankmodal" data-mode="edit" data-id="{{ $b->id }}" data-nama_bank="{{ $b->nama_bank }}">
                        <i class="bi bi-pencil-fill"></i>
                    </button>
                    <form method="POST" action="{{ route('bank.destroy', $b->id) }}" style="display: inline">
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