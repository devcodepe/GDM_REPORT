<?php 
    
    class UsuariosModel extends Mysql
    {
        public $intIdusuario;
        public $strIdentificacion;
        public $strNombres;
        public $strApellidos;
        public $intTelefono;
        public $strEmail;
        public $strPassword;
        public $strDireccion;
        public $strToken;
        public $intRolid;
        public $intStatus;

        public function __construct()
        {
            parent::__construct();
        }

        public function insertUsuario(string $identificacion, string $nombres, string $apellidos , string $email, int $telefono, string $password, int $tipoid, int $status)
        {
            $this->strIdentificacion = $identificacion;
            $this->strNombres = $nombres;
            $this->strApellidos = $apellidos;
            $this->inttTelefono = $telefono;
            $this->strEmail = $email;
            $this->strPassword = $password;
            $this->strDireccion = "dire";
            $this->strToken = "123";
            $this->intRolid = $tipoid;
            $this->intStatus = $status;
            $return = 0;
            
            $sql = "SELECT * FROM persona WHERE identificacion = '{$this->strIdentificacion}' or email_user = '{$this->strEmail}'";
            $request = $this->select_all($sql);

            if (empty($request)) 
            {
                $query_insert = "INSERT INTO persona (identificacion, nombres, apellidos, telefono, email_user, pass, direccion, token, rolid, statuss) 
                VALUES (?,?,?,?,?,?,?,?,?,?)";
                $arrData = array ($this->strIdentificacion,
                                  $this->strNombres,
                                  $this->strApellidos,
                                  $this->inttTelefono,
                                  $this->strEmail,
                                  $this->strPassword,
                                  $this->strDireccion,
                                  $this->strToken,
                                  $this->intRolid,
                                  $this->intStatus
                                 );
                $request_insert = $this->insert($query_insert, $arrData);
                $return = $request_insert;

            }
            else
            {
                $return = "exist";
            }

            return $return;


        }

        public function selectUsuarios()
        {
            $sql = "SELECT p.idpersona,p.identificacion, p.nombres, p.apellidos, p.telefono, p.email_user, r.nombrerol, p.statuss 
            FROM persona p INNER JOIN rol r ON p.rolid = r.idrol WHERE p.statuss !=0";
            $request = $this->select_all($sql);
            return $request;
        }
    }
?>