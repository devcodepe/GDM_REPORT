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
                <button type="button" class="btn bg-gradient-primary btnEditarRol" rl="'.$arrdata[$i]['idrol'].'" title="Editar"><i class="fa-solid fa-file-pen"></i></button>
                <button type="button" class="btn bg-gradient-danger btnDeleteRol" rl="'.$arrdata[$i]['idrol'].'" title="Eliminar"><i class="fa-solid fa-trash"></i></button>
                                            </div>';
            }
            
            echo json_encode($arrdata, JSON_UNESCAPED_UNICODE);
            die();
        }
    }
?>