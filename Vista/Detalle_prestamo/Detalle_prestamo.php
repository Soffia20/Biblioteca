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

    <a href="index.php?c=detalle_prestamo&a=insertar">Agregar</a>
    <br>

    <a href="http://localhost/Biblioteca/Vista/Vista_Inicial/index.php">Regresar</a>

    <table border="1" width="80%">
        <!-- Cabecera thead -->
        <thead>
            <!-- Fila  tr-->
            <tr>
                <!-- Columnas th -->
                <th>ID</th>
                <th>Prestamo</th>
                <th>Libro</th>
                <th>Cantidad</th>
                <th>Modificar</th>
                <th>Eliminar</th>

            </tr>
        </thead>
        <!-- Contenido de la tabla -->
        <tbody>
            <!-- LLama los datos de la consulta, extrae el arreglo -->
            <?php foreach($data["detalle_prestamo"] as $dato) {
                // fila
                echo "<tr>";
                // columnas
                echo "<td>".$dato["Id_detalle_prestamo"]."</td>";
                echo "<td>".$dato["Prestamo"]."</td>";
                echo "<td>".$dato["Libro"]."</td>";
                echo "<td>".$dato["Cantidad"]."</td>";
                echo "<td><a href='index.php?c=detalle_prestamo&a=modificar&id=".$dato["Id_detalle_prestamo"]."'>Modificar</a></td>";
				echo "<td><a href='index.php?c=detalle_prestamo&a=eliminar&id=".$dato["Id_detalle_prestamo"]."'>Eliminar</a></td>";
                echo "<tr>";
            }

            ?>
        </tbody>


    </table>
</body>
</html>