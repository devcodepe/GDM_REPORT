CREATE TABLE rol(
	idrol           INT             AUTO_INCREMENT PRIMARY KEY NOT NULL,
    nombrerol       VARCHAR(30)     NOT NULL,
    descripcion     VARCHAR(255),
    statusrol       INT 			NOT NULL
);

CREATE TABLE persona(
	idpersona 	    INT 			AUTO_INCREMENT PRIMARY KEY,
    identificacion  VARCHAR(50),
    nombres		    VARCHAR(100) 	NOT NULL,
    apellidos		VARCHAR(100) 	NOT NULL,    
    telefono     	VARCHAR(30) 	NOT NULL,
    email_user 	    VARCHAR(100) 	NOT NULL,
    pass 		    VARCHAR(100) 	NOT NULL,
    direccion       VARCHAR(255)    NOT NULL,
    token 		    VARCHAR(255) 	NOT NULL,
    rolid           INT             NOT NULL,
    statuss         INT(11)         NOT NULL,
    CONSTRAINT fk_rolid_pers FOREIGN KEY (rolid)
    REFERENCES rol (idrol)

);



CREATE TABLE modulo(
    idmodulo         INT             AUTO_INCREMENT PRIMARY KEY NOT NULL,
    titulo           VARCHAR(50)     NOT NULL,
    descripcion      VARCHAR(255)    NOT NULL,
    statuss          INT             NOT NULL
);

CREATE TABLE permisos(
    idmodulo         INT             AUTO_INCREMENT PRIMARY KEY NOT NULL,
    rolid            INT             NOT NULL,
    moduloid         INT             NOT NULL,
    CONSTRAINT fk_rolid_perm FOREIGN KEY (rolid)
    REFERENCES rol (idrol),
    CONSTRAINT fk_moduloid FOREIGN KEY (moduloid)
    REFERENCES modulo (idmodulo)
)

