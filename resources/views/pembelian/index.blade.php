@extends('templates.layouts')

@push('styles')

{{-- <style>
    .printme {
	display: none;
}
@media print {
	.no-printme  {
		display: none;
	}
	.printme  {
		display: block;
	}
}
</style> --}}

@endpush

@section('contents')

<div class="page-content">
    <div class="card">
        <div class="card-header">
            @include('pembelian.barang')
            @include('pembelian.pemasok')
        </div>
        <div class="card-body">

            <form class="form" id="formTransaksi" method="POST" action="pembelian">
                @csrf

                <div class="card-body">

                    <div class="row">
                        <input type="hidden" id="user_id" class="form-control" name="user_id" value="{{ auth()->user()->id }}" required>
                        <div class="col-md-6 col-12">
                            <div class="form-group">
                                <div class="row">
                                    <div class="col-md-4">
                                        <label for="first-name-column">Kode Pembelian</label>
                                    </div>
                                    <div class="col-md-6">
                                        <input type="text" id="kode-pembelian" value="{{ $kode }}" class="form-control" name="kode_masuk" required readonly>
                                    </div>
                                </div>
                            </div>                  
                        </div>
                        <div class="col-md-6 col-12">
                            <div class="form-group">
                                <div class="row">
                                    <div class="col-md-4">
                                        <label for="first-name-column">Tanggal</label>
                                    </div>
                                    <div class="col-md-6">
                                        <input type="date" id="first-name-column" class="form-control date-picker" name="tanggal_masuk" required readonly value="{{ date('Y-m-d') }}">
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6 col-12">
                            <div class="form-group">
                                <div class="row">
                                    <div class="col-md-4">
                                        <label for="first-name-column">Pemasok</label>
                                    </div>
                                    <div class="col-md-6">
                                        <input type="hidden" class="form-control" id="pemasok_id" name="pemasok_id">
                                        <div class="input-group" data-bs-toggle="modal" data-bs-target="#tblPemasokModal">
                                            <input type="text" id="nama_pemasok" class="form-control" name="nama_pemasok" required readonly>
                                            <button type="button" class="btn btn-primary"><i data-feather="search"></i></button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6 col-12">
                            <div class="form-group">
                                <div class="row">
                                    <div class="col-md-4">
                                        <label for="first-name-column">Tambah Barang</label>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="input-group" data-bs-toggle="modal" data-bs-target="#tblBarangModal">
                                            <input type="text" id="first-name-column" class="form-control" name="barang_id" required readonly>
                                            <button type="button" class="btn btn-primary"><i data-feather="search"></i></button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                
                    <div class="table-responsive">
                        <table class="table table-lg" id="tblTransaksi">
                            <thead>
                                <tr>
                                    <th>Kode Barang</th>
                                    <th>Nama Barang</th>
                                    <th>Harga</th>
                                    <th>Qty</th>
                                    <th>Total</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <tr>
                                        <td colspan="6" style="text-align:center;font-style:italic">Belum ada data</td>
                                    </tr>
                                </tr>
                            </tbody>
                        </table>
                    </div>

                    <div class="form-group my-4">
                        <div class="d-flex justify-content-between">
                            <div class="row">
                                <div class="col-md-4">
                                    <label for="first-name-column">Total Harga</label>
                                </div>
                                <div class="col-md-8">
                                    <div class="input-group">
                                        <span class="input-group-text">Rp</span><input type="number" id="totalHarga" class="form-control" name="total" required readonly>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-12">
                                    <button type="submit" class="btn icon icon-left btn-success">
                                        <i data-feather="save"></i> Simpan Transaksi
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>   
                             
            </form>
            
        </div>
    </div>
</div>

@endsection

@push('scripts')

<script>

    let totalHarga = 0;
    function tambahBarang(a){
        let d = $(a).closest('tr');
        let kodeBarang = d.find('td:eq(1)').text();
        let namaBarang = d.find('td:eq(2)').text();
        let hargaBarang = d.find('td:eq(3)').text();
        let idBarang = d.find('.idBarang').val();
        let idSatuan = d.find('.idSatuan').val();
        //console.log(kodeBarang)
        let data = '';
        let tbody = $('#tblTransaksi tbody tr td').text();
        data += '<tr>';
        data += '<td>'+kodeBarang+'</td>';
        data += '<td>'+namaBarang+'</td>';
        data += '<td>'+hargaBarang+'</td>';
        data += '<input type="hidden" name="barang_id[]" value="'+idBarang+'">'
        data += '<input type="hidden" name="harga_beli[]" value="'+hargaBarang+'">'
        data += '<td><div class="input-group"><input type="number" value="1" min="1" class="qty form-control" name="jumlah[]"><span class="input-group-text">'+idSatuan+'</span></div></td>';
        data += '<td><div class="input-group"><span class="input-group-text">Rp</span><input type="text" readonly name="sub_total[]" class="subTotal form-control" value="'+hargaBarang+'"></div></td>';
        data += '<td><button type="button" class="btn btn-danger btnRemoveBarang"><i class="bi bi-trash3-fill"></i></button></td>'
        data += '</tr>';

        if(tbody === 'Belum ada data') $('#tblTransaksi tbody tr').remove();

        $('#tblTransaksi tbody').append(data);
        totalHarga += parseFloat(hargaBarang);
        $('#totalHarga').val(totalHarga);
        $('#tblBarangModal').modal('hide');
    }

    function calcSubTotal(a){
        
        let qty = parseFloat($(a).closest('tr').find('.qty').val());
        let hargaBarang = parseFloat($(a).closest('tr').find('td:eq(2)').text());
        let subTotalAwal = parseInt($(a).closest('tr').find('.subTotal').val());
        let subTotal = qty * hargaBarang;

        totalHarga += subTotal - subTotalAwal;
        $(a).closest('tr').find('.subTotal').val(subTotal);
        $('#totalHarga').val(totalHarga);
    }

    $(function(){

        //pemilihan barang
        $('#tblBarangModal').on('click','.pilihBarangBtn',function(){
        tambahBarang(this);
        });

        //pemilihan Pemasok
        $('#tblPemasokModal').on('click','.pilihPemasokBtn',function(){
            var id = $(this).data('id')
            var nama_pemasok = $(this).data('nama_pemasok')
            $('#pemasok_id').val(id);
            $('#nama_pemasok').val(nama_pemasok);
            $('#tblPemasokModal').modal('hide');
        });

        //change qty event
        $('#tblTransaksi').on('change','.qty',function(){
            calcSubTotal(this);
        });

        //remove barang
        $('#tblTransaksi').on('click','.btnRemoveBarang',function(){
            console.log('test')
            let subTotalAwal = parseFloat($(this).closest('tr').find('.subTotal').val());
            totalHarga -= subTotalAwal;

            $currentRow = $(this).closest('tr').remove();
            $('#totalHarga').val(totalHarga);

            let tbody = Number($('#tblTransaksi tbody').text());
            if(tbody == 0)
                $('#tblTransaksi tbody').append('<tr><td colspan="6" style="text-align:center;font-style:italic">Belum ada data</td></tr>');
        });

    });
    

</script>

@endpush