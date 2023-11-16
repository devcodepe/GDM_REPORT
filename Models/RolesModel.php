<?php

    class RolesModel extends Mysql
    {
        public $intIdrol;
        public $strRol;
        public $strDescription;
        public $intStatus;

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

        public function insertRol(string $rol, string $description, int $status)
        {
            $return = "";
            $this->strRol = $rol;
            $this->strDescription = $description;
            $this->intStatus = $status;

            $sql = "SELECT * FROM rol WHERE nombrerol = '{$this->strRol}'";
            $request = $this->select_all($sql);

            if (empty($request))
            {
                $query_insert = "INSERT INTO rol (nombrerol, descripcion, statusrol) VALUES (?,?,?)";
                $arrData = array($this->strRol, $this->strDescription, $this->intStatus);
                $request_insert = $this->insert($query_insert, $arrData);
                $return = $request_insert;

            }else{
                $return = "exist";
            }

            return $return;
        }
    }

?>