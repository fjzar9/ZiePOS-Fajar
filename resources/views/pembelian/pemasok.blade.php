<!-- Modal -->
<div class="modal fade text-left" id="tblPemasokModal" tabindex="-1"
    role="dialog" aria-labelledby="myModalLabel33" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title" id="myModalLabel33">Tambah Data Pemasok</h4>
                <button type="button" class="close" data-bs-dismiss="modal"
                    aria-label="Close">
                    <i data-feather="x"></i>
                </button>
            </div>
            <div class="modal-body">
                <table class="table" id="dataTable2">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Nama</th>
                            <th>Alamat</th>
                            <th>No Telp</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($pemasok as $p)
                        <tr>
                            <td>
                                {{ $i = (isset($i)?++$i:$i=1) }}
                            </td>
                            <td>{{ $p->nama_pemasok }}</td>
                            <td>{{ $p->alamat }}</td>
                            <td>{{ $p->no_telp }}</td>
                            <td>
                                <button type="button" class="btn btn-primary pilihPemasokBtn" data-id="{{ $p->id }}" data-nama_pemasok="{{ $p->nama_pemasok }}"><i data-feather="plus"></i></button>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>