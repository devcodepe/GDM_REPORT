CREATE TABLE persona(
	idpersona 	int 			AUTO_INCREMENT PRIMARY KEY,
    nombre 		varchar(50) 	NOT NULL,
    usuario 	varchar(30) 	NOT NULL,
    email 	    varchar(100) 	NOT NULL,
    pass 		varchar(255) 	NOT NULL,
    token 		varchar(255) 	NOT NULL,
    statuss     int(11)         NOT NULL

)

CREATE TABLE rol(
	idrol       INT             AUTO_INCREMENT PRIMARY KEY NOT NULL,
    nombrerol   varchar(30)     NOT NULL,
    descripcion varchar(255),
    statusrol   int NOT NULL
)