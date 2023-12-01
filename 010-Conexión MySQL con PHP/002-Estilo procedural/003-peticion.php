<?php

    $servidor = "localhost";
    $usuario = "josevicente";
    $contrasena = "josevicente";
    $basededatos = "miempresa";

    $mysqli = mysqli_connect(
        $servidor,
        $usuario,
        $contrasena,
        $basededatos
    );
    
    $peticion = "SELECT * FROM clientes";

?>