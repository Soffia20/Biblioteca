<?php
date_default_timezone_set('America/Matamoros');

$matricula = $_POST['matricula'] ?? '';
$servicio = $_POST['servicio'] ?? '';

if (!$matricula || !$servicio) {
    die("❌ Datos incompletos.");
}

try {
    $conn = new PDO("mysql:host=localhost;port=33065;dbname=biblioteca", "root", "");
    $fecha = date('Y-m-d');
    $hora_entrada = date('H:i:s');

    $stmt = $conn->prepare("INSERT INTO entrada_salida (Estudiante, Servicio, Fecha, Hora_entrada) VALUES (?, ?, ?, ?)");
    $stmt->execute([$matricula, $servicio, $fecha, $hora_entrada]);

    echo "✅ Entrada registrada a las $hora_entrada.";
    session_destroy();
} catch (PDOException $e) {
    echo "❌ Error: " . $e->getMessage();
}
?>
