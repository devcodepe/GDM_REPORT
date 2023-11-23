<?php 

    class Usuarios extends Controllers
    {
        public function __construct()
        {
            session_start();
            session_regenerate_id(true);
            if(empty($_SESSION['login']))
            {
                header('Location: '.base_url().'login');
            }
            parent::__construct();
        }

        public function Usuarios()
        {
            $data['page_tag'] = "Usuarios";
            $data['page_title'] = "Lista de Usuarios";
            $data['page_name'] = "usuario";
            
            $this->views->getView($this,"usuarios",$data);

        }

        public function setUsuarios()
        {
            if($_POST)
            {
                if (empty($_POST['txtIdentification']) || empty($_POST['txtLastName']) || empty($_POST['txtName']) || empty($_POST['txtEmail']) || empty($_POST['txtPhone']) || empty($_POST['listRolid']) || empty($_POST['txtStatus']))
                {
                    $arrResponse = array ("status" => false, "msg" => "Datos Incorrectos");
                }
                else
                {
                    $strIdentification = strClean($_POST['txtIdentification']);
                    $strLastName = ucwords(strClean($_POST['txtLastName']));
                    $strName = ucwords(strClean($_POST['txtName']));
                    $strEmail = strtolower(strClean($_POST['txtEmail']));
                    $strPhone = intval(strClean($_POST['txtPhone']));
                    $intTipoId = intval(strClean($_POST['listRolid']));
                    $intStatus = inval(strClean()$_POST['listStatus']);

                    $strPassword = empty($_POST['txtPassword']) ? hash("SHA256", passGenerator()) : hash("SHA256", $_POST['txtPassword']);
                    $request_user = $this->model->insertUsuario($strIdentification,$strName,$strLastName,$strEmail,$strPhone,$strPassword,$intTipoId,$intStatus);

                    if ($request_user > 0)
                    {
                        $arrResponse = array ('status' => true, 'msg' => 'Usuario Insertado Correctamente!!!'); 
                    }
                    else if ($request_user == 'exist')
                    {
                        $arrResponse = array ('status' => false, 'msg' => '!Atencion¡ el Email o la Identificacion ya existe, Ingrese Otro'.);
                    }
                    else
                    {
                        $arrResponse = array ('status' => false, 'msg' => 'No es posible almacenar los datos');
                    }
                }
                echo json_encode($arrResponse, JSON_UNESCAPED_UNICODE);
            }
        }
    }

    

?>