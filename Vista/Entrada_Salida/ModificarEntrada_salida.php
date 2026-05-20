<?php
    //Ver los datos que envia data en modificar 
    // echo "<pre>";
    // print_r($data);
    // echo "</pre>";
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
    <form action="index.php?c=entrada_salida&a=actualizar" method="POST" id="modificarEnt" name="modificarEnt" autocomplete="off">

        <input type="hidden" id="id" name="id" value="<?php echo $data["id"]; ?>" />
        Estudiante: <input type="text" id="estudiante" name="estudiante" value="<?php echo $data["entrada_salida"]["Estudiante"]?>" /><br>
        Servicio: <input type="text" id="servicio" name="servicio" value="<?php echo $data["entrada_salida"]["Servicio"]?>" /><br>
        Fecha: <input type="text" id="fecha" name="fecha" value="<?php echo $data["entrada_salida"]["Fecha"]?>" /><br>
        Hora_entrada: <input type="text" id="hora_entrada" name="hora_entrada" value="<?php echo $data["entrada_salida"]["Hora_entrada"]?>" /><br>
        Hora_salida: <input type="text" id="hora_salida" name="hora_salida" value="<?php echo $data["entrada_salida"]["Hora_salida"]?>" /><br>

        <button id="actualizar" name="actualizar" type="submit">Actualizar</button>
    </form>

    <a href="index.php?c=entrada_salida&a=index">Regresar</a>
</body>
</html>