<?php

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo $data["titulo"] ?></title>
</head>
<body>
    <h2><?php echo $data["titulo"] ?></h2>

    <a href="index.php?c=Historial&a=insertar">Agregar</a>
    <br>

    <a href="http://localhost/Biblioteca/Vista/Historial/index.php">Regresar</a>

    <table border="1" width="80%">
        <thead>
            <tr>
                <th>ID</th>
                <th>Prestamo</th>
                <th>Descripcion</th>
                <th>Fecha</th>
                <th>Estado</th>
                <th>Modificar</th>
                <th>Eliminal</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach($data["historial"] as $dato) {
                echo "<tr>";
                echo "<td>".$dato["Id_historial"]."</td>";
                echo "<td>".$dato["Prestamo"]."</td>";
                echo "<td>".$dato["Descripcion"]."</td>";
                echo "<td>".$dato["Fecha"]."</td>"; 
                echo "<td>".$dato["Estado"]."</td>";                            
                echo "<td><a href='index.php?c=historial&a=modificar&id=".$dato["Id_historial"]."'>Modificar</a></td>";
				echo "<td><a href='index.php?c=Historial&a=eliminar&id=".$dato["Id_historial"]."'>Eliminar</a></td>";
                echo "<tr>";
            }
            ?>
        </tbody>
    </table>
</body>
</html>