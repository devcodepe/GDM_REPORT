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
    }
?>