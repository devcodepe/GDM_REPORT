<?php

    class RolesModel extends Mysql
    {
        public function __construct()
        {
            parent::__construct();
        }

        public function selectRoles()
        {
            $sql = "SELECT * FROM rol WHERE statusrol != 0";
            $request = $this->select_all($sql);
            return $request;
        }
    }

?>