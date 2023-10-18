<?php 

	class Login extends Controllers{
		public function __construct()
		{
            session_start();
			session_regenerate_id(true);
            if(isset($_SESSION['login']))
            {
                header('Location: '.base_url().'dashboard');
            }
			parent::__construct();
		}

		public function login()
		{
			$data["page_tag"] = "Home";
			$data['page_title'] = "Página principal";
			$data['page_name'] = "home";
			$data['page_content'] = "Lorem ipsum dolor sit amet, consectetur adipisicing elit. Et, quis. Perspiciatis repellat perferendis accusamus, ea natus id omnis, ratione alias quo dolore tempore dicta cum aliquid corrupti enim deserunt voluptas.";
            $data["page_functions_js"] = "function_login.js";
			$this->views->getView($this,"login",$data);
		}

        public function loginUser(){
            //dep($_POST);

            if ($_POST){
                if (empty($_POST['txtUser']) || empty($_POST['txtPassword'])){
                    $arrResponse = array('status' => false, 'msg' => 'Error de datos');
                } else {
                    $strUser = strtolower(strClean($_POST['txtUser']));
                    $strPassword = hash("SHA256", $_POST['txtPassword']);
                    $requestUser = $this->model->loginUser($strUser, $strPassword);
                
                    if(empty($requestUser))
                    {
                        $arrResponse = array('status' => false, 'msg' => 'El usuario o la contraseña es Incorrecta.');

                    }else{
                        $arrData = $requestUser;
                        if($arrData['statuss'] == 1){
                            $_SESSION['idUser'] = $arrData['idpersona'];
                            $_SESSION['login'] = true;
                            
                            $arrData = $this->model->sessionLogin($_SESSION['idUser']);
                            $_SESSION['userData'] = $arrData;
                            
                            $arrResponse = array('status' => true, 'msg' => 'ok');
                        }else{
                            $arrResponse = array('status' => false, 'msg' => 'Usuario inactivo');
                        }
                    }
                }
                echo json_encode($arrResponse, JSON_UNESCAPED_UNICODE);
            }

            die();
        }

        public function loginRegister (){
            if ($_POST) {
                if (empty($_POST['txtName']) || empty($_POST['txtEmail']) || empty($_POST['txtPassword1'])){
                    $arrResponse = array('status' => false, 'msg' => 'Error de datos');
                    /*echo "<script>
                            Swal.fire({
                                icon: 'error',
                                title: 'Oops...!',
                                text: 'Operación inválida, el puesto ya ha sido vendido.',  
                            })          
                        </script>"; */

                }else{
                    $strName = strtolower(strClean($_POST['txtName']));
                    $strEmail = strtolower(strClean($_POST['txtEmail']));
                    $strPassword1 = hash("SHA256", $_POST['txtPassword1']);

                    $requestRegister = $this->model->loginRegister($strName,$strEmail,$strPassword1);
                    
                    if($requestRegister == true){
                        
                    }


                }
            }
        }

	}
 ?>