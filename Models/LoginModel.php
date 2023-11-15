<?php 

	class LoginModel extends Mysql
	{
        private $intIdUsuario;
        private $strUser;
        private $strPassword;
        private $strToken;

		public function __construct()
		{
            session_start();
            if(isset($_SESSION['login']))
            {
                header('Location: '.base_url().'Dashboard');
            }

			parent::__construct();
		}
        
        public function loginUser(string $usuario, string $password)
        {
            $this->strUser = $usuario;
            $this->strPassword = $password;

            $sql = "SELECT idpersona, statuss FROM persona WHERE
                    email_user = '$this->strUser' and
                    pass = '$this->strPassword' and
                    statuss != 0 ";
            $request = $this->select($sql);
            return $request;
        }

        public function loginRegister(String $name, String $email, String $password1){
            $query_insert = "INSERT INTO persona (identificacion, nombres, apellidos, telefono, email_user, pass, direccion, token, rolid, statuss) VALUES (?,?,?,?,?,?,?,?,?,?)";
            $arrData = array("70047543","$name", "viza", "917447158", $email, $password1, "San Fransisco - Ancon", "", 1 , 1);
            $request_insert = $this->insert($query_insert, $arrData);
            
            return $request_insert;
        }

        public function sessionLogin(int $iduser){
            $this->intIdUsuario = $iduser;
            $sql = "SELECT * FROM persona WHERE idpersona = $this->intIdUsuario";
            $request = $this->select($sql); 
            return $request;
        }
	}
 ?>