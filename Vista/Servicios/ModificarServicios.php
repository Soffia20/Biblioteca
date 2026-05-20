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

    <form action="index.php?c=Servicios&a=actualizar" method="POST" id="modificarSrv" name="modificarSrv" autocomplete="off">

        <input type="hidden" id="id" name="id" value="<?php echo $data["id"]; ?>" />
        Nombre: <input type="text" id="nombre" name="nombre" value="<?php echo $data["servicios"]["Nombre"]?>" /><br>

        <button id="actualizar" name="actualizar" type="submit">Actualizar</button>
    </form>

    <a href="index.php?c=Servicios&a=index">Regresar</a>
</body>
</html>