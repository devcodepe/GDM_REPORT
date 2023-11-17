<?php

    class Roles extends Controllers
    { 
        public function __construct()
        {
            session_start();
            session_regenerate_id(true);
            if (empty($_SESSION['login']))
            {
                header('Location: '. base_url().'login');
            }
            parent::__construct();
        }

        public function Roles()
        {
            $data['page_id'] = 3;
            $data['page_tag'] = "Roles de Usuario";
            $data['page_title'] = "Roles de Usuario";
            $data['page_name'] = "Roles";

            $this->views->getView($this, "roles", $data);
        }

        public function getRoles()
        {
            $arrdata = $this->model->selectRoles();
            for ($i = 0; $i < count($arrdata); $i++)
            {
                if ($arrdata[$i]['statusrol'] == 1)
                {
                    $arrdata[$i]['statusrol'] = '<span class="badge badge-success">Activo</span>';
                }
                else
                {
                    $arrdata[$i]['statusrol'] = '<span class="badge badge-danger">Inactivo</span>';

                }

                $arrdata[$i]['opciones'] = '<div class="text-center"> 
                <button type="button" class="btn bg-gradient-secondary btnPermisosRol" rl="'.$arrdata[$i]['idrol'].'" title="Permisos"><i class="fa-solid fa-key"></i></button>
                <button type="button" class="btn bg-gradient-primary btnEditRol" onclick="fntEditRol('.$arrdata[$i]['idrol'].');" rl="'.$arrdata[$i]['idrol'].'" title="Editar"><i class="fa-solid fa-file-pen"></i></button>
                <button type="button" class="btn bg-gradient-danger btnDelRol" onclick="fntDelRol('.$arrdata[$i]['idrol'].');" rl="'.$arrdata[$i]['idrol'].'" title="Eliminar"><i class="fa-solid fa-trash"></i></button>
                                            </div>';
            }
            
            echo json_encode($arrdata, JSON_UNESCAPED_UNICODE);
            die();
        }

        public function getRol(int $idrol)
        {
            $intIdRol = intval(strClean($idrol));
            if ($intIdRol > 0)
            {
                $arrData = $this->model->selectRol($intIdRol);
                if (empty($arrData))
                {
                    $arrResponse = array ('status' => false, 'msg' => 'Datos no Encontrados.');
                }
                else
                {
                    $arrResponse = array ('status' => true, 'data' => $arrData);
                }
                echo json_encode($arrResponse, JSON_UNESCAPED_UNICODE);
            }
            die();
        }

        public function setRoles()
        {
            $intIdRol = intval($_POST['idrol']);
            $strName = strClean($_POST['txtName']);
            $strDescription = strClean($_POST['txtDescription']);
            $intStatus = intval($_POST['listStatus']);

            $requestRol = $this->model->insertRol($strName, $strDescription, $intStatus);

            if ($intIdRol == 0)
            {
                $requestRol = $this->model->insertRol($strName, $strDescription, $intStatus);
                $option = 1;
            }
            else
            {
                $requestRol = $this->model->updateRol($intIdRol, $strName, $strDescription, $intStatus);
                $option = 2;
            }

            if ($requestRol > 0)
            {
                if ($option == 1)
                {
                    $arrResponse = array ('status' => true, 'msg' => 'Datos Guardados Correctamente');
                }
                else
                {
                    $arrResponse = array ('status' => true, 'msg' => 'Datos Actualizados Correctamente');
                }
            }
            else if ($requestRol == 'exist')
            {
                $arrResponse = array ('status' => false, 'msg' => '!Atencion¡ El ya existe.');
            }
            else
            {
                $arrResponse = array ('status' => false, 'msg' => 'No es posible almacenar los datos.');
            }

            echo json_encode($arrResponse, JSON_UNESCAPED_UNICODE);
            die();
        }

        public function deleteRol()
        {
            $intIdRol = intval($_POST['idrol']);
            $requestDelete = $this->model->deleteRol($intIdRol);
            if ($requestDelete == 'ok')
            {
                $arrResponse = array ('status' => true, 'msg' => 'Se ha Eliminado el Rol');
            }
            else if ($requestDelete == 'exist')
            {
                $arrResponse = array ('status' => false, 'msg' => 'No es posible Eliminar Rol Asociado a Usuarios');
            }
            else
            {
                $arrResponse = array ('status' => false, 'msg' => 'Error al ELiminar el Rol');
            }

            echo json_encode($arrResponse, JSON_UNESCAPED_UNICODE);
        }

        
    }
?>