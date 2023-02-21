@extends('templates.layouts')

@push('styles')

@endpush

@section('contents')

<div class="page-content">
    <div class="card">
        <div class="card-header">
            @include('barang.form')
        </div>
        <div class="card-body">
            @include('barang.data')
        </div>
      </div>
</div>

@endsection

@push('scripts')

<script>

    //modal formInput
    $('#barangmodal').on('show.bs.modal', function(e){
       const btn = $(e.relatedTarget)
       const mode = btn.data('mode')
       const kode_barang = btn.data('kode_barang')
       const produk_id = btn.data('produk_id')
       const nama_barang = btn.data('nama_barang')
       const satuan_id = btn.data('satuan_id')
       const harga_jual = btn.data('harga_jual')
       const stok = btn.data('stok')
       const ditarik = btn.data('ditarik')
       const id = btn.data('id')
       const modal = $(this)
       if(mode === 'edit'){
            modal.find('.modal-title').text('Edit Data Barang')
            modal.find('#kode_barang').val(kode_barang)
            modal.find('#produk_id').val(produk_id)
            modal.find('#nama_barang').val(nama_barang)
            modal.find('#satuan_id').val(satuan_id)
            modal.find('#harga_jual').val(harga_jual)
            modal.find('#stok').val(stok)
            modal.find('#ditarik').val(ditarik)
            modal.find('#method').html('@method("PATCH")')
            modal.find('.modal-body form').attr('action', '{{ url("barang") }}/'+id)
       }else{
            modal.find('.modal-title').text('Tambah Data Barang')
            modal.find('#kode_barang').val('{{ $kode_barang }}')
            modal.find('#produk_id').val('')
            modal.find('#nama_barang').val('')
            modal.find('#satuan_id').val('')
            modal.find('#harga_jual').val('')
            modal.find('#stok').val('')
            modal.find('#ditarik').val('')
            modal.find('#method').html('')
            modal.find('.modal-body form').attr('action', '{{ url("barang") }}')
       }
    })

    //trigger action delete
    const swalWithBootstrapButtons = Swal.mixin({
        customClass: {
        confirmButton: 'btn btn-success',
        cancelButton: 'btn btn-danger'
    },
    buttonsStyling: true
        })

    $('.delete-data').click(function(e){
        e.preventDefault()
        const data = $(this).closest('tr').find('td:eq(1)').text()
        Swal.fire({
            title: 'Data akan dihapus!',
            text: `Apakah yakin data ${data} akan dihapus?`,
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#5cb85c',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Yes, delete it!',
            cancelButtonText: 'No, cancel!',
            reverseButtons: true
        })
        .then((result) => {
            if (result.value) {
                $(e.target).closest('form').submit()
                swalWithBootstrapButtons.fire(
                    'Deleted!',
                    'Your file has been deleted.',
                    'success'
                ); 
                barang.reload();
            } else if (
            /* Read more about handling dismissals below */
            result.dismiss === swalWithBootstrapButtons.DismissReason.cancel
            ) {
            swalWithBootstrapButtons.fire(
                'Cancelled',
                'Your imaginary file is safe :)',
                'error'
            )
            }
        })
    });

</script>

@endpush