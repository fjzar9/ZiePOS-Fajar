@extends('templates.layouts')

@push('styles')

@endpush

@section('contents')

<div class="page-content">
    <div class="card">
        <div class="card-header">
            @include('pemasok.form')
        </div>
        <div class="card-body">
            @include('pemasok.data')
        </div>
      </div>
</div>

@endsection

@push('scripts')

<script>
    
    //modal formInput
    $('#pemasokmodal').on('show.bs.modal', function(e){
       const btn = $(e.relatedTarget)
       const mode = btn.data('mode')
       const nama_pemasok = btn.data('nama_pemasok')
       const alamat = btn.data('alamat')
       const no_telp = btn.data('no_telp')
       const salesman = btn.data('salesman')
       const bank_id = btn.data('bank_id')
       const no_rek = btn.data('no_rek')
       const id = btn.data('id')
       const modal = $(this)
       if(mode === 'edit'){
            modal.find('.modal-title').text('Edit Data pemasok')
            modal.find('#nama_pemasok').val(nama_pemasok)
            modal.find('#alamat').val(alamat)
            modal.find('#no_telp').val(no_telp)
            modal.find('#salesman').val(salesman)
            modal.find('#bank_id').val(bank_id)
            modal.find('#no_rek').val(no_rek)
            modal.find('#method').html('@method("PATCH")')
            modal.find('.modal-body form').attr('action', '{{ url("pemasok") }}/'+id)
       }else{
            modal.find('.modal-title').text('Tambah Data pemasok')
            modal.find('#nama_pemasok').val('')
            modal.find('#alamat').val('')
            modal.find('#no_telp').val('')
            modal.find('#salesman').val('')
            modal.find('#bank_id').val('')
            modal.find('#no_rek').val('')
            modal.find('#method').html('')
            modal.find('.modal-body form').attr('action', '{{ url("pemasok") }}')
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