<?php
    session_start();
    date_default_timezone_set('America/Matamoros');
    require 'cone.php';

    $matricula = $_POST['matricula'] ?? '';

    if (!$matricula) {
        mostrarError("Matrícula no proporcionada.");
    }

    try {
        // Verifica si existe el estudiante
        $stmt = $conn->prepare("SELECT Nombre FROM estudiantes WHERE Matricula = ?");
        $stmt->execute([$matricula]);
        $estudiante = $stmt->fetch(PDO::FETCH_ASSOC);

        if (!$estudiante) {
            mostrarError("Estudiante no encontrado.");
        }

        $fecha = date('Y-m-d');

        // Verificar si ya existe una entrada sin salida para hoy
        $stmt = $conn->prepare("
            SELECT Id_entrada_salida 
            FROM entrada_salida 
            WHERE Estudiante = ? AND Fecha = ? AND Hora_salida IS NULL
        ");
        $stmt->execute([$matricula, $fecha]);
        $registro = $stmt->fetch(PDO::FETCH_ASSOC);

        if ($registro) {
            // Registrar hora de salida
            $hora_salida = date('H:i:s');
            $stmt = $conn->prepare("
                UPDATE entrada_salida 
                SET Hora_salida = ? 
                WHERE Id_entrada_salida = ?
            ");
            $stmt->execute([$hora_salida, $registro['Id_entrada_salida']]);

            // Mensaje y redirección automática
            $back = $_SERVER['HTTP_REFERER'] ?? 'salida.php';
            echo "<!DOCTYPE html>
            <html lang='es'>
            <head>
                <meta charset='UTF-8'>
                <meta http-equiv='refresh' content='3;url={$back}'>
                <title>Salida registrada</title>
                <link href='https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css' rel='stylesheet'>
                <link rel='stylesheet' href='../diseño.css'>
            </head>
            <body>
                <div class='salida'>
                    <div class='mensaje'>
                        <div class='encabezado-mensaje'>
                            <i class='bi bi-check-circle-fill'></i>
                            <h2>Salida registrada</h2>
                        </div>
                        <p>✅ Salida registrada para <strong>" . htmlspecialchars($estudiante['Nombre']) . "</strong> a las $hora_salida</p>
                        <p>Serás redirigido en 3 segundos…</p>
                    </div>
                </div>
            </body>
            </html>";
            exit;

        } else {
            // No hay entrada pendiente: volvemos a seleccionar servicio
            $_SESSION['matricula'] = $matricula;
            session_write_close();
            header("Location: seleccionar_servicio.php");
            exit;
        }
    } 
    catch (PDOException $e) 
    {
        // Mensaje de error y redirección en 5 segundos
        $back = $_SERVER['HTTP_REFERER'] ?? 'salida.php';
        echo "<!DOCTYPE html>
        <html lang='es'>
        <head>
            <meta charset='UTF-8'>
            <meta http-equiv='refresh' content='5;url={$back}'>
            <title>Error al registrar salida</title>
            <link href='https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css' rel='stylesheet'>
            <link rel='stylesheet' href='../diseño.css'>
        </head>
        <body>
            <div class'salidaerror'>
                <div class='mensaje'>
                    <div class='encabezado-mensaje'>
                        <i class='bi bi-x-circle-fill'></i>
                        <h2>Error al registrar salida</h2>
                    </div>
                    <p>❌ " . htmlspecialchars($e->getMessage()) . "</p>
                    <p>Serás redirigido en 5 segundos…</p>
                </div>
            </div>
        </body>
        </html>";
        exit;
    }

    // Muestra los mensajes de error de matricula y estudiante
    function mostrarError($mensaje) {
    echo '
    <html>
    <head>
        <link rel="stylesheet" href="../diseño.css">
    </head>
    <body>
        <div class="mostrarerror">
            <div class="mensaje">
                <div class="encabezado-mensaje">
                    <i>❌</i>
                    <h2>Error</h2>
                </div>
                <p>' . htmlspecialchars($mensaje) . '</p>
            </div>
        </div>
    </body>
    </html>';
    exit;
}
?>
