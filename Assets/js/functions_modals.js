var tableRoles;
document.addEventListener('DOMContentLoaded', function(){

    tableRoles = $('#roltable').DataTable ({
        "responsive": true, "lengthChange": true, "autoWidth": false,
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

      var request = (window.XMLHttpRequest) ? new XMLHttpRequest : new ActiveXObject('Microsoft.XMLHTTP');
      var ajaxUrl = base_url+'Roles/setRoles';
      var formData = new FormData(formRol);
      request.open("POST", ajaxUrl, true);
      request.send(formData);
      request.onreadystatechange = function(){
        if (request.readyState == 4 && request.status == 200)
        {
          var objData = JSON.parse(request.responseText);
          if (objData.status)
          {
            $('#modalFormRol').modal("hide");
            formRol.reset();
            swal("Roles de Usuario",objData.msg,"success");
            tableRoles.ajax.reload(function() {
              
            });
            
          }
          else
          {
            swal("Error", objData.msg, "error");
          }
        }
      }
    }
}); 


function openModal(){
    document.querySelector('#idrol').value="";
    document.querySelector('#titleModal').innerHTML="Nuevo Rol";
    document.querySelector('.modal-header').classList.replace("headerUpdate","headerRegister");
    document.querySelector('#btnActionForm').classList.replace("btn-info","btn-primary");
    document.querySelector('#btnText').innerHTML="Guardar";
    document.querySelector("#formRol").reset();

    $('#modalFormRol').modal('show');
}

window.addEventListener('load', function(){
  fntEditRol();
}, true);


function fntEditRol(){
  var btnEditRol = document.querySelectorAll('.btnEditRol');
  btnEditRol.forEach(function(btnEditRol){
    btnEditRol.addEventListener('click',function(){
      
    document.querySelector('#titleModal').innerHTML="Actualizar Rol";
      document.querySelector('.modal-header').classList.replace("headerRegister","headerUpdate");
      document.querySelector('#btnActionForm').classList.replace("btn-primary","btn-info");
      document.querySelector('#btnText').innerHTML="Actualizar";

      $('#modalFormRol').modal('show');
    });
  });
}