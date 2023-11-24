document.addEventListener('DOMContentLoaded', function () 
{
    var formUsuario = document.querySelector('#formUsuario');
    formUsuario.onsubmit = function(e)
    {
        e.preventDefault();
        var strIdentification = document.querySelector('#txtIdentification').value;
        var strLastName = document.querySelector('#txtLastName').value;
        var strName = document.querySelector('#txtName').value;
        var strEmail = document.querySelector('#txtEmail').value;
        var strPhone = document.querySelector('#txtPhone').value;
        var strTipousuario = document.querySelector('#listRolid').value;
        var strStatus = document.querySelector('#listStatus').value;
        var strPassword = document.querySelector('#txtPassword').value;

        if (strIdentification == '' || strName == '' || strLastName == '' || strEmail == '' || strPhone == '' || strTipousuario == '' || strStatus == '')
        {
            swal("Atencion", "Todos los Campos son Obligatorios", "error");
        }

        var request = (window.XMLHttpRequest) ? new XMLHttpRequest() : new ActiveXObject('Microsoft.XMLHTTP');
        var ajaxUrl = base_url + 'Usuarios/setUsuarios';
        var formData = new FormData(formUsuario);
        
        request.open("POST", ajaxUrl, true);
        request.send(formData);

        request.onreadystatechange = function ()
        {
            if (request.readyState == 4 && request.status == 200)
            {
                var objData = JSON.parse(request.responseText);

                if (objData.status)
                {
                    $('#modalFormUsuario').modal("hide");
                    formUsuario.reset();
                    swal("Usuario", objData.msg, "success");
                    usuariotable.ajax.reload(function(){

                    });

                }
                else
                {
                    swal("Error", objData.msg, "error");
                }
            }
            else
            {
                console.log("error");
            }
        }
    }
})

window.addEventListener('load', function(){
    fntRolesUsuario();
}, false);


function fntRolesUsuario()
{
    var request = (window.XMLHttpRequest) ? new XMLHttpRequest() : new ActiveXObject('Microsoft.XMLHTTP');
    var ajaxUrl = base_url+'Roles/getSelectRoles';
    console.log(ajaxUrl);
    request.open("GET", ajaxUrl, true);
    request.send();

    request.onreadystatechange = function ()
    {
        if (request.status == 200 && request.readyState == 4)
        {
            document.querySelector('#listRolid').innerHTML = request.responseText;
            document.querySelector('#listRolid').value = 1;
            $('#listRolid').selectpicker('render');
        }
    }
}

function openModal()
{
    document.querySelector('#idUsuario').value="";
    document.querySelector('#titleModal').innerHTML="Nuevo Usuario";
    document.querySelector('.modal-header').classList.replace("headerUpdate","headerRegister");
    document.querySelector('#btnActionForm').classList.replace("btn-info","btn-primary");
    document.querySelector('#btnText').innerHTML="Guardar";
    document.querySelector("#formUsuario").reset();
    $('#modalFormUsuario').modal('show');
}