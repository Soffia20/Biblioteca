<?php
// cone.php
$dsn = 'mysql:host=localhost;dbname=biblioteca';
$usuario = 'root';      // Reemplaza con tu usuario
$contrasena = ''; // Reemplaza con tu contraseña

try {
    $conn = new PDO($dsn, $usuario, $contrasena, [
        PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION
    ]);
} catch (PDOException $e) {
    die("❌ Error de conexión: " . $e->getMessage());
}
?>
