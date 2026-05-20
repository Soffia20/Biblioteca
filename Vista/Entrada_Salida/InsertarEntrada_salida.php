<?php
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo $data["titulo"]; ?></title>
</head>
<body>
    <h2><?php echo $data["titulo"]; ?></h2>

    <!--para no autocompletar usa: autocomplete="off"  -->
    <form action="index.php?c=entrada_salida&a=guardar" method="POST" id="insertarEnt" name="insertarEnt" autocomplete="off">
        Estudiante: <input type="text" id="estudiante" name="estudiante"/><br>
        Servicio: <input type="text" id="servicio" name="servicio"/><br>
        Fecha: <input type="date" id="fecha" name="fecha"/><br>
        Hora_entrada: <input type="text" id="hora_entrada" name="hora_entrada"/><br>
        Hora_salida: <input type="text" id="hora_salida" name="hora_salida"/><br>


        <button id="guardar" name="guardar" type="submit">Guardar</button>
    </form>

    <a href="index.php?c=entrada_salida&a=index">Regresar</a>
</body>
</html>