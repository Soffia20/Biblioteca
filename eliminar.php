<?php
require_once 'Conexion/database.php';

if (isset($_POST['tabla'], $_POST['id'], $_POST['columna'])) {
    $tabla = $_POST['tabla'];
    $id = $_POST['id'];
    $columna = $_POST['columna'];

    // Lista blanca para evitar inyecciones SQL
    $tablasPermitidas = ['carreras', 'estudiantes', 'servicios'];
    $columnasPermitidas = ['Id_carrera', 'Id_estudiante', 'Id_servicio'];

    if (in_array($tabla, $tablasPermitidas) && in_array($columna, $columnasPermitidas)) {
        $conn = Conectar::conexion();

        $query = "DELETE FROM `$tabla` WHERE `$columna` = ?";
        $stmt = $conn->prepare($query);
        $stmt->bind_param("i", $id);

        if ($stmt->execute()) {
            echo "ok";
        } else {
            echo "error";
        }

        $stmt->close();
        $conn->close();
    } else {
        echo "tabla-o-columna-no-valida";
    }
} else {
    echo "parametros-faltantes";
}
?>
