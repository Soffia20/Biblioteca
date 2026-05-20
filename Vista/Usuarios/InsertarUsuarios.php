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
    <form action="index.php?c=usuarios&a=guardar" method="POST" id="insertarUsu" name="insertarUsu" autocomplete="off">
        Nombre: <input type="text" id="nombre" name="nombre"/><br>
        Usuario: <input type="text" id="usuario" name="usuario"/><br>
        Correo: <input type="text" id="correo" name="correo"/><br>
        Contraseña: <input type="text" id="contrasena" name="contrasena"/><br>

        <button id="guardar" name="guardar" type="submit">Guardar</button>
    </form>

    <a href="index.php?c=Usuarios&a=index">Regresar</a>
</body>
</html>