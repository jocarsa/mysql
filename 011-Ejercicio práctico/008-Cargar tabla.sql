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
                echo "<a href='?tabla=".$fila['Tables_in_miempresa']."'>";
                echo "<button>";
                echo "<h1>".$fila['Tables_in_miempresa'][0]."</h1>";
                echo $fila['Tables_in_miempresa'];
                echo "</button>";
                 echo "</a>";
            }
            if(isset($_GET['tabla'])){
                echo "<h2>Voy a trabajar con la tabla: ".$_GET['tabla']."</h2>";
                // Cargo los datos de la tabla concreta
                $peticion = "SHOW COLUMNS in ".$_GET['tabla'];
                $resultado = mysqli_query($conexion,$peticion);
                echo "<table>";
                    echo "<tr>";
                        while($fila = mysqli_fetch_assoc($resultado)){
                            echo "<th>".$fila['Field']."</th>";
                            
                        }
                    echo "</tr>";
                echo "</table>"
            }
        ?>
        </main>
        <footer>
            (c)2023 Jose Vicente Carratala
        </footer>
    </body>
</html>
