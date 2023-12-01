CREATE TABLE lineaspedido (
    Identificador INT(8) NOT NULL AUTO_INCREMENT ,  
    pedido_id INT(8) NOT NULL,
    producto_id INT(8) NOT NULL,
    cantidad INT(8) NOT NULL,
    PRIMARY KEY (Identificador),
    FOREIGN KEY (pedido_id) REFERENCES pedidos(Identificador)
        ON UPDATE CASCADE
        ON DELETE CASCADE,
    FOREIGN KEY (producto_id) REFERENCES productos(Identificador)
        ON UPDATE CASCADE
        ON DELETE CASCADE
) 
ENGINE = InnoDB 
CHARSET=utf8mb4 
COLLATE utf8mb4_spanish_ci 
COMMENT = 'Tabla para guardar las líneas de pedido de la aplicación';