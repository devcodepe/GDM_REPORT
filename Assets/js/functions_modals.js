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

      var intIdrol = document.querySelector('#idrol').value;
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
  //fntEditRol();
  //fntDelRol();
}, false);


function fntEditRol($idrol){
  
  document.querySelector('#titleModal').innerHTML="Actualizar Rol";
  document.querySelector('.modal-header').classList.replace("headerRegister","headerUpdate");
  document.querySelector('#btnActionForm').classList.replace("btn-primary","btn-info");
  document.querySelector('#btnText').innerHTML="Actualizar";

  var idrol = $idrol;
  var request = (window.XMLHttpRequest) ? new XMLHttpRequest() : new ActiveXObject('Microsoft.XMLHTTP');
  var ajaxUrl = base_url+'Roles/getRol/'+idrol;
  request.open("GET",ajaxUrl,true);
  request.send();

  request.onreadystatechange = function(){
    if (request.readyState == 4 && request.status == 200)
    {
      console.log(request.responseText);
      var objData = JSON.parse(request.responseText);
      console.log(objData.data.idrol);

      if (objData.status)
      {
          document.querySelector("#idrol").value = objData.data.idrol;
          document.querySelector("#txtName").value = objData.data.nombrerol;
          document.querySelector("#txtDescription").value = objData.data.descripcion;

          if (objData.data.statusrol == 1)
          {
            var optionSelect = '<option value="1" selected class="notBlock">Activo</option>';
          }
          else
          {
            var optionSelect = '<option value="2" selected class="notBlock">Inactivo</option>';
          }

          var htmlSelect = `${optionSelect}
                            <option value="1">Activo</option>
                            <option value="2">Inactivo</option>
                            `;
          document.querySelector("#listStatus").innerHTML = htmlSelect;
          $('#modalFormRol').modal('show');
      }
      else{
        swal("Error", objData.msg, "error");
      }
    } 
  }

}

function fntDelRol($idrol){
  var idrol = $idrol;
  swal({
    title: "Eliminar Rol",
    text: "¿Realmente quiere eliminar este Rol?",
    icon: "warning",
    buttons: ["No, cancelar","Si, eliminar"],
    dangerMode: true,
    
}).then((willDelete) => {
    if (willDelete) {
        var request = (window.XMLHttpRequest) ? new XMLHttpRequest() : new ActiveXObject('Microsoft.XMLHTTP');
        var ajaxUrl = 'http://localhost/GDM_REPORT/Roles/deleteRol/';
        var strData = "idrol="+idrol;
        request.open("POST",ajaxUrl,true);
        request.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
        request.send(strData);
        request.onreadystatechange = function () {
            if(request.readyState == 4 && request.status == 200){
                var objData = JSON.parse(request.responseText);
                if(objData.status)
                {   
                    swal("rol eliminado", objData.msg , "success");
                    tableRoles.ajax.reload(function () {
                        
                    });
                }else{
                    swal("Atención!", objData.msg , "error");
                }
            }
        }
      
    } 
  });
  
}

function fntPermisosRoles($idrol)
{
  var idrol = $idrol;
  var request = (window.XMLHttpRequest) ? new XMLHttpRequest() : new ActiveXObject('Microsft.XMLHTTP');
  var ajaxUrl = base_url+'PermisosRoles/getPermisosRol/'+idrol;
  request.open("GET",ajaxUrl,true);
  request.send();
  console.log(ajaxUrl);
  request.onreadystatechange = function()
  {
    if (request.readyState == 4 && request.status == 200)
    {
      document.querySelector('#contentAjax').innerHTML = request.responseText;
      $('.modalPermisos').modal('show');
      document.querySelector('#formPermisos').addEventListener('submit', fntSavePermisos, false);

    }
  }
  
}

function fntSavePermisos(event)
{
  event.preventDefault();
  var request = (window.XMLHttpRequest) ? new XMLHttpRequest() : new ActiveXObject('Microsoft.XMLHTTP');
  var ajaxUrl = base_url+'PermisosRoles/setPermisos';
  var formElement = document.querySelector("#formPermisos");
  var formData = new FormData(formElement);
  request.open("POST", ajaxUrl, true);
  request.send(formData);

  request.onreadystatechange = function()
  {
    if (request.readyState == 4 && request.status == 200) 
    {
      var objData = JSON.parse(request.responseText);
      if (objData.status)
      {
        swal("Permisos de Usuario", objData.msg, "success");
      }
      else
      {
        swal("Error", objData.msg, "error");
      }
    }
  }
}

    

