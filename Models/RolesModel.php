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

        public function selectRol(int $idrol)
        {
            $this->intIdrol = $idrol;
            $sql = "SELECT * FROM rol WHERE idrol = $this->intIdrol";
            $request = $this->select($sql);
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

        public function updateRol(int $idrol, string $name, string $description, int $status)
        {
            $this->intIdrol = $idrol;
            $this->strRol = $name;
            $this->strDescription = $description;
            $this->intStatus = $status;

            $sql = "SELECT * FROM rol WHERE nombrerol = '$this->strRol' and idrol != $this->intIdrol";
            $request = $this->select_all($sql);

            if (empty($request))
            {
                $sql = "UPDATE rol SET nombrerol = ? , descripcion = ?, statusrol = ? WHERE idrol = $this->intIdrol";
                $arrData = array($this->strRol, $this->strDescription, $this->intStatus);   
                $request = $this->update($sql,$arrData);
            }
            else
            {
                $request = "exist";
            }

            return $request;
        }

        public function deleteRol(int $idrol)
        {
            $this->intIdrol = $idrol;
            $sql = "SELECT * FROM persona WHERE rolid = $this->intIdrol";
            $request = $this->select_all($sql);
            if(empty($request))
            {
                $sql = "UPDATE rol SET statusrol = ? WHERE idrol = $this->intIdrol";
                $arrData = array(0);
                $request = $this->update($sql,$arrData);
                
                if ($request)
                {
                    $request = 'ok';
                }
                else
                {
                    $request = 'error';
                }
            }
            else
            {
                $request = 'exist';
            }

            return $request;
        }
    }

?>