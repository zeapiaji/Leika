$(document).ready(function () {
    $("#datatable, #datatable-1, #datatable-2, #datatable-3").DataTable(), $("#datatable-buttons").DataTable({
        lengthChange: !1,
    }).buttons().container().appendTo("#datatable-buttons_wrapper .col-md-6:eq(0)"), $(".dataTables_length select").addClass("form-select form-select-sm")
});
