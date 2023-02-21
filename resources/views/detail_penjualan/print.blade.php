<!DOCTYPE html>
<html lang="en">
<head>
    @include('templates.header')
    <style>
        @page {
            margin: 5% 2%;
        }
        body {
            margin: 2%;
        }
    </style>
</head>
<body onload="window.print()">

    <div class="row my-5 d-print-none">
        <div class="col">
            <a href="{{ url('LaporanPenjualan') }}" class="btn icon icon-left btn-danger">
                <i data-feather="corner-up-left"></i> Kembali
            </a>
            <button type="button" class="btn icon icon-left btn-primary" onclick=window.print()>
                <i data-feather="printer"></i> Print
            </button>
        </div>
    </div> 

    <div id="main-content">
        <div class="page-heading">
            <div class="page-title text-center mb-3">
                <h3>ZIEPOS</h3>
                <h5>{{ $title }} Kamis, 29 Desember 2022 <br>s/d Kamis, 29 Desember 2022</h5>
            </div>
            <div class="page-content">
                <div class="table-responsive">
                    <table class="table align-middle" id="dataTable3">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Tanggal</th>
                                <th>Kode Barang</th>
                                <th>Nama Barang</th>
                                <th>Harga Jual</th>
                                <th>Jumlah</th>
                                <th>Sub Total</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($detail_penjualan as $dp)
                            <tr>
                                <td>{{ $i = (isset($i)?++$i:$i=1) }}</td>
                                <td>{{ $dp->penjualan->tgl_faktur->translatedFormat('d-m-Y') }}</td>
                                <td>{{ $dp->barang->kode_barang }}</td>
                                <td>{{ $dp->barang->nama_barang }}</td>
                                <td>@currency($dp->harga_jual)</td>
                                <td>{{ $dp->jumlah }} {{ $dp->barang->satuan->jenis_satuan }}</td>
                                <td>@currency($dp->sub_total)</td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
    
    @include('templates.footer')

</body>
</html>