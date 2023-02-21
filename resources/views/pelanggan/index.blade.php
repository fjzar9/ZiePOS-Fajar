@extends('templates.layouts')

@push('styles')

@endpush

@section('contents')

<div class="page-content">
    <div class="card">
        <div class="card-header">
            @include('pelanggan.form')
        </div>
        <div class="card-body">
            @include('pelanggan.data')
        </div>
      </div>
</div>

@endsection

@push('scripts')

<script>
    
    //modal formInput
    $('#pelangganmodal').on('show.bs.modal', function(e){
       const btn = $(e.relatedTarget)
       const mode = btn.data('mode')
       const kode_pelanggan = btn.data('kode_pelanggan')
       const nama = btn.data('nama')
       const alamat = btn.data('alamat')
       const no_telp = btn.data('no_telp')
       const email = btn.data('email')
       const id = btn.data('id')
       const modal = $(this)
       if(mode === 'edit'){
            modal.find('.modal-title').text('Edit Data Pelanggan')
            modal.find('#kode_pelanggan').val(kode_pelanggan)
            modal.find('#nama').val(nama)
            modal.find('#alamat').val(alamat)
            modal.find('#no_telp').val(no_telp)
            modal.find('#email').val(email)
            modal.find('#method').html('@method("PATCH")')
            modal.find('.modal-body form').attr('action', '{{ url("pelanggan") }}/'+id)
       }else{
            modal.find('.modal-title').text('Tambah Data Pelanggan')
            modal.find('#kode_pelanggan').val('{{ $kode_pelanggan }}')
            modal.find('#nama').val('')
            modal.find('#alamat').val('')
            modal.find('#no_telp').val('')
            modal.find('#email').val('')
            modal.find('#method').html('')
            modal.find('.modal-body form').attr('action', '{{ url("pelanggan") }}')
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
                pemasok.reload();
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