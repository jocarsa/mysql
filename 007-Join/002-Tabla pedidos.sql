CREATE TABLE pedidos (
    Identificador INT(8) NOT NULL AUTO_INCREMENT , 
    fecha DATE NOT NULL , 
    cliente_id INT(8) NOT NULL,
    PRIMARY KEY (Identificador),
    FOREIGN KEY (cliente_id) REFERENCES clientes(Identificador)
        ON UPDATE CASCADE
        ON DELETE CASCADE
) 
ENGINE = InnoDB 
CHARSET=utf8mb4 
COLLATE utf8mb4_spanish_ci 
COMMENT = 'Tabla para guardar los clientes de la aplicación';