CREATE TABLE usuarios (
    Identificador INT(8) NOT NULL AUTO_INCREMENT , 
    usuario VARCHAR(50) NOT NULL , 
    contrasena VARCHAR(50) NOT NULL , 
    nombre VARCHAR(100) NOT NULL , 
    apellidos VARCHAR(100) NOT NULL , 
    email VARCHAR(100) NOT NULL , 
    PRIMARY KEY (`Identificador`)
) 
ENGINE = InnoDB 
CHARSET=utf8mb4 
COLLATE utf8mb4_spanish_ci 
COMMENT = 'Tabla para guardar los usuarios de la aplicación';