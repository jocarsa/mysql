<?php

    $servidor = "localhost";
    $usuario = "josevicente";
    $contrasena = "josevicente";
    $basededatos = "miempresa";
    
    $conexion = new mysqli(
        $servidor,
        $usuario,
        $contrasena,
        $basededatos
    );
    
    $peticion = "SELECT * FROM clientes";

    $resultado = $conexion->query($peticion);


?>