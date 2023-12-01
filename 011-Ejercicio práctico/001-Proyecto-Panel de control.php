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
    
    $peticion = "SHOW TABLES in miempresa";

    $resultado = mysqli_query($conexion,$peticion);

    while($fila = mysqli_fetch_assoc($resultado)){
        echo $fila['Tables_in_miempresa'];
    }
?>