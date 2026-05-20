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

    <form action="index.php?c=Servicios&a=guardar" method="POST" id="insertarSrv" name="insertarSrv" autocomplete="off">
        Nombre: <input type="text" id="nombre" name="nombre"/><br>
        <button id="guardar" name="guardar" type="submit">Guardar</button>
    </form>

    <a href="index.php?c=Servicios&a=index">Regresar</a>
</body>
</html>