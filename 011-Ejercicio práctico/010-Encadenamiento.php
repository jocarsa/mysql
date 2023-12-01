<!doctype html>
<html>
    <head>
        <style>
            button{
                width:120px;
                height:120px;
                margin:5px;
                text-transform:uppercase;
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
                    $cadena .= "</tr>";
                
                // Cargo el contenido de la tabla
                $peticion = "SELECT * FROM ".$_GET['tabla'];
                $resultado = mysqli_query($conexion,$peticion);   
                    while($fila = mysqli_fetch_assoc($resultado)){
                        $cadena .= "<tr>";
                        foreach($fila as $dato){
                            $cadena .= "<td>".$dato."</td>";
                        }
                        $cadena .= "</tr>";
                    }  
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
