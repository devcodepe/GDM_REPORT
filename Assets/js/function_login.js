document.addEventListener('DOMContentLoaded', function(){
    if(document.querySelector("#formLogin")){
        let formLogin = document.querySelector("#formLogin");
        formLogin.onsubmit = function(e) {
            e.preventDefault();

            let strUser = document.querySelector('#txtUser').value;
            let strPassword = document.querySelector('#txtPassword').value;

            if (strUser == "" || strPassword == ""){
                
                return false;
            }else{
                var request = (window.XMLHttpRequest) ? new XMLHttpRequest() : new ActiveXObject('Microsoft.XMLHTTP');
                var ajaxUrl = base_url + 'Login/loginUser';
                var formData = new FormData(formLogin);
                request.open("POST",ajaxUrl, true);
                request.send(formData);
                
                request.onreadystatechange = function(){
                    if (request.readyState != 4) return;
                    if (request.status = 200){
                        var objData = JSON.parse(request.responseText);
                        if (objData.status){
                            window.location = base_url+'dashboard';
                        }else{
                            swal("Validacion", "Error de Usuario o constraseña!!! ", "error");

                            document.querySelector('#txtPassword').value = "";
                        }
                    }else{

                    }
                    return false
                }
            }
            
        }
    }

    if(document.querySelector("#formRegister")){
        let formRegister = document.querySelector('#formRegister');
        formRegister.onsubmit = function(e){
            e.preventDefault();

            let strName = document.querySelector('#txtName').value;
            let strEmail = document.querySelector('#txtEmail').value;
            let strPassword1 = document.querySelector('#txtPassword1').value;

            if (strName == "" || strEmail == "" || strPassword1 == ""){
                return false;
            }else{
                var request = (window.XMLHttpRequest) ? new XMLHttpRequest() : new ActiveXObject('Microsoft.XMLHTTP');
                var ajaxUrl = base_url + 'Login/loginRegister';
                var formDataRegister = new FormData(formRegister);
                request.open("POST",ajaxUrl, true);
                request.send(formDataRegister);
                
                request.onreadystatechange = function(){
                
                    if (request.status = 200){
                        swal("Success", "Registrado Exitosamente", "success");
                        document.querySelector('#txtName').value = "";
                        document.querySelector('#txtEmail').value = "";
                        document.querySelector('#txtPassword1').value = "";
                        
                    }else{
                        swal("ERROR", "Hubo un Problema en los datos", "error");
                    }
                    return false
                }
                
            }


        }
    }

}, false);