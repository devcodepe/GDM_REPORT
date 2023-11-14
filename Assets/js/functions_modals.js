$(function () {
  $("#roltable").DataTable({
    "responsive": true, "lengthChange": false, "autoWidth": false,
    "buttons": ["copy", "csv", "excel", "pdf", "print", "colvis"]
  }).buttons().container().appendTo('#roltable_wrapper .col-md-6:eq(0)');
  
});

function openModal(){
    $('#modalFormRol').modal('show');
}