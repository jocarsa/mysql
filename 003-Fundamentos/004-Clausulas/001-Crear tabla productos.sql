CREATE TABLE productos (
    Identificador INT(8) NOT NULL AUTO_INCREMENT , 
    nombre VARCHAR(50) NOT NULL , 
    descripcion TEXT NOT NULL , 
    precio DOUBLE(10,2) NOT NULL , 
    categoria VARCHAR(100) NOT NULL ,  
    PRIMARY KEY (`Identificador`)
) 
ENGINE = InnoDB 
CHARSET=utf8mb4 
COLLATE utf8mb4_spanish_ci 
COMMENT = 'Tabla para guardar los productos de la empresa';