<!doctype html>
<html>
    <head>
        <title>Panel de control</title>
        <meta charset="utf-8">
        <style>
            button{
                width:120px;
                height:120px;
                margin:5px;
                text-transform:uppercase;
            }
            body{
                background:rgb(220,220,220);
                font-family: sans-serif;
            }
            header,main,footer{
                width:1200px;
                background:white;
                padding:20px;
                margin:auto;
            }
            header,footer{
                text-align:center;
            }
            table{
                width:100%;
            }
            table tr:first-child{
                background:black !important;
                color:white !important;
            }
            table tr:nth-child(odd){
                background:rgb(240,240,240);
            }
            input{
                max-width:100px;
            }
            .borrar{
                height:20px;
            }
        </style>
    </head>
    <body>
        <header>
            <h1>Panel de control</h1>
        </header>
        <main>
            <?php
            $cadena = "";
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
            mysqli_set_charset($conexion, "utf8mb4");
            if(isset($_GET['operacion'])){
                if($_GET['operacion'] == "borrar"){
                    $peticion = "DELETE FROM ".$_GET['tabla']." WHERE Identificador = ".$_GET['id'];
                    $resultado = mysqli_query($conexion,$peticion);
                }
            }
            if(isset($_POST['Identificador'])){
                $peticion = "INSERT INTO ".$_GET['tabla']." VALUES (NULL,";
                foreach($_POST as $clave=>$valor){
                    if($clave != "Identificador"){
                        $peticion .= "'".$valor."',";
                    }
                }
                $peticion = substr($peticion, 0, -1);
                $peticion .= ")";
                $resultado = mysqli_query($conexion,$peticion);
            }

            $peticion = "SHOW TABLES in miempresa";

            $resultado = mysqli_query($conexion,$peticion);

            while($fila = mysqli_fetch_assoc($resultado)){
                $cadena .= "<a href='?tabla=".$fila['Tables_in_miempresa']."'>";
                $cadena .= "<button>";
                $cadena .= "<h1>".$fila['Tables_in_miempresa'][0]."</h1>";
                $cadena .= $fila['Tables_in_miempresa'];
                $cadena .= "</button>";
                 $cadena .= "</a>";
            }
            if(isset($_GET['tabla'])){
                $cadena .= "<h2>Voy a trabajar con la tabla: ".$_GET['tabla']."</h2>";
                // Cargo los datos de la tabla concreta
                $peticion = "SHOW COLUMNS in ".$_GET['tabla'];
                $resultado = mysqli_query($conexion,$peticion);
                $cadena .= "<table>";
                    $cadena .= "<tr>";
                        while($fila = mysqli_fetch_assoc($resultado)){
                            $cadena .= "<th>".$fila['Field']."</th>";
                            
                        }
                    $cadena .= "<th>Acciones</th>";
                    $cadena .= "</tr>";
                
                // Cargo el contenido de la tabla
                $peticion = "SELECT * FROM ".$_GET['tabla'];
                $resultado = mysqli_query($conexion,$peticion);   
                    while($fila = mysqli_fetch_assoc($resultado)){
                        $cadena .= "<tr>";
                        $contador = 0;
                        foreach($fila as $clave=>$dato){
                            if($contador == 0){
                                $id = $dato;
                            }
                            if(strpos($clave, "_") !== false){
                                $cadena .= "<td>";
                                    $tabla = explode("_",$clave)[0]."s";
                                    
                                   $peticion2 = "SELECT * FROM ".$tabla." WHERE Identificador = ".$dato;
                                $resultado2 = mysqli_query($conexion,$peticion2); 
                               while($fila2 = mysqli_fetch_assoc($resultado2)){
                                   foreach($fila2 as $dato2){
                                       $cadena .= $dato2."<br>";
                                   }
                               }
                                 $cadena .=  "</td>";
                            }else{
                                $cadena .= "<td>".$dato."</td>";
                            }
                            
                            $contador++;
                        }
                        $cadena .= '
                        <td>
                            <a href="?tabla='.$_GET['tabla'].'&operacion=borrar&id='.$id.'">
                                <button class="borrar">
                                    Borrar
                                </button>
                            </a>
                        </td>
                        ';
                        $cadena .= "</tr>";
                    }  
                // Formulario para insertar un nuevo elemento
                // Cargo los datos de la tabla concreta
                $peticion = "SHOW COLUMNS in ".$_GET['tabla'];
                $resultado = mysqli_query($conexion,$peticion);
                    $cadena .= "<tr>";
                $cadena .= "<form method='POST' action='?tabla=".$_GET['tabla']."'>";
                        while($fila = mysqli_fetch_assoc($resultado)){
                            $cadena .= "<td><input type='text' name='".$fila['Field']."'></td>";
                            
                        }
                    $cadena .= "<th><input type='submit'></th>";
                $cadena .= "</form>";
                    $cadena .= "</tr>";
                $cadena .= "</table>";
            }
            echo $cadena;
        ?>
        </main>
        <footer>
            (c)2023 Jose Vicente Carratala
        </footer>
    </body>
</html>
