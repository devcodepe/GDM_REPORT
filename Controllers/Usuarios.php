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
    }

    

?>