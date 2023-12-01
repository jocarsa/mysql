<?php

    $servidor = "localhost";
    $usuario = "josevicente";
    $contrasena = "josevicente";
    $basededatos = "miempresa";

    $conexion = mysqli_connect(
        $servidor,
        $usuario,
        $contrasena,
        $basededatos
    );
    
    $peticion = "SELECT * FROM clientes";

    $resultado = mysqli_query($conexion,$peticion);

    while($fila = mysqli_fetch_assoc($resultado)){
        echo $fila['nombre'];
    }

?>