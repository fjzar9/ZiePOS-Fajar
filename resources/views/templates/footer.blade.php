<script src="{{ asset('assets') }}/js/bootstrap.js"></script>
<script src="{{ asset('assets') }}/js/app.js"></script>

<script src="https://kit.fontawesome.com/a381b8673d.js" crossorigin="anonymous"></script>

<script src="{{ asset('assets') }}/extensions/sweetalert2/sweetalert2.min.js"></script>

<script src="{{ asset('assets') }}/extensions/jquery/jquery.js"></script>

<script src="https://cdn.datatables.net/v/bs5/dt-1.12.1/datatables.min.js"></script>
<script src="{{ asset('assets') }}/js/pages/datatables.js"></script>

<script src="{{ asset('assets') }}/extensions/toastify-js/src/toastify.js"></script>

<script src="{{ asset('assets') }}/extensions/parsleyjs/parsley.min.js"></script>

<script src="{{ asset('assets') }}/js/pages/parsley.js"></script>

<script src="https://cdn.datatables.net/buttons/2.3.2/js/dataTables.buttons.min.js"></script>

<script src="https://cdn.datatables.net/buttons/2.3.2/js/buttons.print.min.js"></script>


<script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/pdfmake.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/vfs_fonts.js"></script>
<script src="https://cdn.datatables.net/buttons/2.3.2/js/buttons.html5.min.js"></script>

<script>
  function logout() {
    document.getElementById("logout").submit();
}
</script>

<script>
  function upload() {
    document.getElementById("upload").submit();
}
</script>

{{-- <script>
  function print() {
    document.getElementById("print").submit();
}
</script> --}}

<script>
  @if(session('success'))
      Toastify({
        text: "{{ session('success') }}",
        duration: 3000,
        close: true,
        gravity: "bottom",
        position: "right",
        backgroundColor: "#4fbe87",
      }).showToast()
  @endif

  @if($errors->any())
      Toastify({
            text: `@foreach ($errors->all() as $error) {{ $error }} @endforeach`,
            duration: 3000,
            close: true,
            gravity: "bottom",
            position: "right",
            backgroundColor: "#f3616d",
          }).showToast()
  @endif

  // @if($errors->has('loginError'))
  //     Toastify({
  //           text: `{{ session('loginError') }}`,
  //           duration: 3000,
  //           close: true,
  //           gravity: "bottom",
  //           position: "right",
  //           backgroundColor: "#f3616d",
  //         }).showToast()
  // @endif
</script>

@stack('scripts')