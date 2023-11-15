var tableRoles;
document.addEventListener('DOMContentLoaded', function(){

    tableRoles = $('#roltable').DataTable ({
        "responsive": true, "lengthChange": false, "autoWidth": false,
        "aProcessing":true,
        "aServerSide":true,
        "language": {
          "url": "//cdn.datatables.net/plug-ins/1.13.7/i18n/es-ES.json"
        },
        "ajax":{
          "url": " "+base_url+"/Roles/getRoles",
          "dataSrc":""
        },
        "columns":[
          {"data":"idrol"},
          {"data":"nombrerol"},
          {"data":"descripcion"},
          {"data":"statusrol"},
          {"data":"opciones"}

        ],
        "resonsieve":"true",
        "bDestroy":true,
        "iDisplayLength":10,
        "order":[[0,"desc"]]
    });

    var formRol = document.querySelector('#formRol');
    formRol.onsubmit = function(e){
      e.preventDefault();

      var strName =  document.querySelector('#txtName').value;
      var strDescription = document.querySelector('#txtDescription').value;
      var intStatus = document.querySelector('#listStatus');

      if (strName == '' || strDescription == '' || intStatus == '')
      {
        swal("Atencion","Todo los campos son obligatorios", "error");
        return false;
      }
    }
}); 


function openModal(){
    $('#modalFormRol').modal('show');
}