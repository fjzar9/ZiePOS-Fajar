<div class="table-responsive">
    <table class="table align-middle" id="dataTable3">
        <thead>
            <tr>
                <th>No</th>
                <th>Tanggal</th>
                <th>Kode Barang</th>
                <th>Nama Barang</th>
                <th>Harga Beli</th>
                <th>Jumlah</th>
                <th>Sub Total</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($detail_pembelian as $dp)
            <tr>
                <td>{{ $i = (isset($i)?++$i:$i=1) }}</td>
                <td>{{ $dp->pembelian->tanggal_masuk->translatedFormat('d F Y') }}</td>
                <td>{{ $dp->barang->kode_barang }}</td>
                <td>{{ $dp->barang->nama_barang }}</td>
                <td>@currency($dp->harga_beli)</td>
                <td>{{ $dp->jumlah }} {{ $dp->barang->satuan->jenis_satuan }}</td>
                <td>@currency($dp->sub_total)</td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>