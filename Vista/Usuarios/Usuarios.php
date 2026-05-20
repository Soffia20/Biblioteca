<?php

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- LLama el titulo desde el controlador con el data -->
    <!-- <title>Estudiantes</title>  ANTES-->
    <!-- DESPUES  -->
    <title><?php echo $data["titulo"]; ?></title>
</head>
<body>
    <h2><?php echo $data["titulo"]; ?></h2>

    <a href="index.php?c=usuarios&a=insertar">Agregar</a>
    <br>

    <a href="http://localhost/Biblioteca/Vista/Vista_Inicial/index.php">Regresar</a>

    <table border="1" width="80%">
        <!-- Cabecera thead -->
        <thead>
            <!-- Fila  tr-->
            <tr>
                <!-- Columnas th -->
                <th>ID</th>
                <th>Nombre</th>
                <th>Usuario</th>
                <th>Correo</th>
                <th>Contrasena</th>
                <th>Modificar</th>
                <th>Eliminar</th>

            </tr>
        </thead>
        <!-- Contenido de la tabla -->
        <tbody>
            <!-- LLama los datos de la consulta, extrae el arreglo -->
            <?php foreach($data["usuarios"] as $dato) {
                // fila
                echo "<tr>";
                // columnas
                echo "<td>".$dato["Id_usuario"]."</td>";
                echo "<td>".$dato["Nombre"]."</td>";
                echo "<td>".$dato["Usuario"]."</td>";
                echo "<td>".$dato["Correo"]."</td>";
                echo "<td>".$dato["Contrasena"]."</td>";
                echo "<td><a href='index.php?c=usuarios&a=modificar&id=".$dato["Id_usuario"]."'>Modificar</a></td>";
				echo "<td><a href='index.php?c=usuarios&a=eliminar&id=".$dato["Id_usuario"]."'>Eliminar</a></td>";
                echo "<tr>";
            }

            ?>
        </tbody>


    </table>
</body>
</html>