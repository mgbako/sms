 $(function() {
  'use strict'
  $("#example1").DataTable();
  $("#student, #classes, #subjects, #progress, #assigned, #questions").DataTable();
  $('#example2').DataTable({
    "paging": true,
    "lengthChange": false,
    "searching": false,
    "ordering": true,
    "info": true,
    "autoWidth": false
  });

}());