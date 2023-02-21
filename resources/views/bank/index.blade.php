@extends('templates.layouts')

@push('styles')

@endpush

@section('contents')

<div class="page-content">
    <div class="card">
        <div class="card-header">
            @include('bank.form')
        </div>
        <div class="card-body">
            @include('bank.data')
        </div>
      </div>
</div>

@endsection

@push('scripts')

<script>

    //modal formInput
    $('#bankmodal').on('show.bs.modal', function(e){
       const btn = $(e.relatedTarget)
       const mode = btn.data('mode')
       const nama_bank = btn.data('nama_bank')
       const id = btn.data('id')
       const modal = $(this)
       if(mode === 'edit'){
            modal.find('.modal-title').text('Edit Data Bank')
            modal.find('#nama_bank').val(nama_bank)
            modal.find('#method').html('@method("PATCH")')
            modal.find('.modal-body form').attr('action', '{{ url("bank") }}/'+id)
       }else{
            modal.find('.modal-title').text('Tambah Data Bank')
            modal.find('#nama_bank').val('')
            modal.find('#method').html('')
            modal.find('.modal-body form').attr('action', '{{ url("bank") }}')
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
                bank.reload();
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