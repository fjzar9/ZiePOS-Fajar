<!DOCTYPE html>
<html lang="en">
<head>
    @include('templates.header')
</head>

<body onload="window.print()">

    <div class="container">
        <div class="row my-5 d-print-none">
            <div class="col">
                <a href="{{ url('dataPenjualan') }}" class="btn icon icon-left btn-danger">
                    <i data-feather="corner-up-left"></i> Kembali
                </a>
                <button type="button" class="btn icon icon-left btn-primary" onclick=window.print()>
                    <i data-feather="printer"></i> Print
                </button>
            </div>
        </div> 
        <div id="main-content">
            <div class="page-heading">
                <div class="page-title text-center my-3">
                    <h3>ZIEPOS</h3>
                    <p>JL. SILIWANGI NO.41, SAWAH GEDE, KEC. CIANJUR, KABUPATEN CIANJUR, JAWA BARAT 43212</p>
                </div>
                <div class="page-content">
                    <p class="mb-0">{{ $printPenjualan->tgl_faktur->translatedFormat('d-m-Y') }}</p>
                    <p class="mb-0">Admin : {{ $printPenjualan->user->name }}</p>
                    <p class="mb-0">No Faktur : {{ $printPenjualan->no_faktur }}</p>
                    <p class="mb-0">Pelanggan : {{ $printPenjualan->pelanggan->nama }}</p>
                    <hr style="border-top: 3px dashed;">
                    <br>
                    <p class="mb-0">{{ $printPenjualan->barang_id }}</p>
                        @foreach ($detailBarang as $db)
                            <p class="mb-0">{{ $db->barang->nama_barang }}</p>
                            <div class="d-flex justify-content-between">
                            <p class="mb-0">@currency($db->barang->harga_jual) x {{ $db->jumlah }} {{ $db->barang->satuan->jenis_satuan }}</p>
                            <p class="mb-0">@currency($db->sub_total)</p>
                            </div>
                        @endforeach
                    <hr style="border-top: 3px dashed;">
                    <div class="d-flex justify-content-between">
                        <p class="mb-0">Total Harga</p>
                        <p class="mb-0">@currency($printPenjualan->total_bayar)</p>
                    </div>
                    <hr style="border-top: 3px dashed;">
                    <p class="text-center">-- TERIMA KASIH --</p>
                    <div class="float-end text-center">
                        <p>Hormat Kami</p>
                        <br>
                        <br>
                        <hr style="border-top: 3px dotted;">
                        <p>{{ $printPenjualan->user->name }}</p>
                    </div>
                </div>
            </div>
        </div>
    </div>

    @include('templates.footer')

</body>
</html>