<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Escanear</title>
    <link rel="stylesheet" href="../diseño.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600;700;800&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">
</head>
<body>
    <div>    
		<br>
        <div>
            <i class="bi bi-book icono-libro"></i>
        </div>
        <h1>BIBLIOTECA UTNC</h1>
        <h5>Bienvenido correcaminos a tu biblioteca</h5>
        <div class="caja">
            <div class="escanear">
                <h3>Escanea tu gafete</h3>
                <div>
                    <form action="registrar.php" method="POST">
                        <input type="text" name="matricula" id="matricula" autofocus>
                    </form>
                </div>
                <div>
                    <label for=""></label>
                </div>
            </div>
        </div>
    </div>

	<script>
        const input = document.getElementById("matricula");
        input.addEventListener("input", function () {
        if (this.value.length >= 5) { // Ajusta según la longitud de la matrícula
            this.form.submit();
        }
        });
    </script>
</body>
</html>