let jquery_datatable1 = $("#dataTable1").DataTable({
    "ordering": false
});

let jquery_datatable2 = $("#dataTable2").DataTable({
    "ordering": false
});

$(document).ready(function() {
    $('#dataTable3').DataTable( {
        paging: false,
        ordering: false,
        info: false,
        searching: false
    } );
} );
