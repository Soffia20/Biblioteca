<?php
session_start();
date_default_timezone_set('America/Matamoros');
require 'cone.php';

if (!isset($_SESSION['matricula'])) {
    die("❌ Matrícula no detectada.");
}

$matricula = $_SESSION['matricula'];

// Si ya se envió el servicio
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['servicio'])) {
    $servicio = $_POST['servicio'];
    $fecha = date('Y-m-d');
    $hora_entrada = date('H:i:s');

    try {
        $stmt = $conn->prepare("INSERT INTO entrada_salida (Estudiante, Servicio, Fecha, Hora_entrada) VALUES (?, ?, ?, ?)");
        $stmt->execute([$matricula, $servicio, $fecha, $hora_entrada]);

        unset($_SESSION['matricula']); // Limpiar la sesión

        echo "<!DOCTYPE html>
        <html lang='es'>
        <head>
            <meta charset='UTF-8'>
            <meta http-equiv='refresh' content='3;url=escanear.php'>
            <title>Registro exitoso</title>
            <link href='https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css' rel='stylesheet'>
            <link rel='stylesheet' href='../diseño.css'>
        </head>
        <body>
            <div class='registro'>
                <div class='mensaje'>
                    <div class='encabezado-mensaje'>
                        <i class='bi bi-check-circle-fill'></i>
                        <h2>Entrada registrada</h2>
                    </div>
                    <p>Hora de entrada: <strong>$hora_entrada</strong></p>
                    <p>Redirigiendo…</p>
                </div>
            </div>
        </body>
        </html>";

        exit;
    } 
    catch (PDOException $e) {
        echo "<!DOCTYPE html>
        <html lang='es'>
        <head>
            <meta charset='UTF-8'>
            <meta http-equiv='refresh' content='5;url=escanear.php'>
            <title>Error al registrar</title>
            <link href='https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css' rel='stylesheet'>
            <link rel='stylesheet' href='../diseño.css'>
        </head>
        <body>
            <div class='error'>
                <div class='mensaje'>
                    <div class='encabezado-mensaje'>
                        <i class='bi bi-x-circle-fill'></i>
                        <h2>Error al registrar</h2>
                    </div>
                    <p>❌ " . htmlspecialchars($e->getMessage()) . "</p>
                    <p>Serás redirigido en 5 segundos…</p>
                </div>
            </div>
        </body>
        </html>";
        exit;
    }

}

$stmt = $conn->query("SELECT Id_servicio, Nombre FROM servicios");
$servicios = $stmt->fetchAll(PDO::FETCH_ASSOC);

?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Seleccionar Servicio</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css" rel="stylesheet">
    <link rel="stylesheet" href="../diseño.css">
</head>
<body>
    <div class="encabezado-servicio">
        <i class="bi bi-book"></i>
        <div>
            <h2>Selecciona el servicio</h2>
            <p>Biblioteca UTNC</p>
        </div>
    </div>

    <div class="contenedor">
        <div class="servicios-grid">
            <?php foreach ($servicios as $servicio): ?>
                <form method="POST" class="form-servicio">
                    <input type="hidden" name="servicio" value="<?= $servicio['Id_servicio'] ?>">
                    <div class="card-servicio clickable-card">
                        <div>
                            <i class="bi bi-book icono"></i>
                            <h3><?= htmlspecialchars($servicio['Nombre']) ?></h3>
                            <p><?= htmlspecialchars($servicio['Descripcion'] ?? 'Haz clic para seleccionar este servicio.') ?></p>
                        </div>
                    </div>
                </form>
            <?php endforeach; ?>
        </div>
    </div>

    <script>
        document.querySelectorAll('.clickable-card').forEach(card => {
            card.addEventListener('click', () => {
                card.closest('form').submit();
            });
        });
    </script>

</body>
</html>

