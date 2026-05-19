<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8">
  <title>Formulario con imagen</title>
  <style>
    #preview {
      max-width: 300px;
      max-height: 300px;
      display: block;
      margin: 10px 0;
    }
    .controls button {
      margin-right: 10px;
    }
  </style>
</head>
<body>
  <h2>Subir una imagen</h2>
  <form id="imageForm">
    <input type="file" accept="image/*" id="imageInput" required>
    <br>
    <img id="preview" src="#" alt="Previsualización" style="display:none;">
        <div class="controls" style="display: none;">
            <button type="button" onclick="clearImage()">Eliminar</button>
        </div>
    <br>
    <button type="submit">Guardar imagen</button>
  </form>

  <script>
    const input = document.getElementById('imageInput');
    const preview = document.getElementById('preview');
    const controls = document.querySelector('.controls');
    let rotation = 0;

    input.addEventListener('change', function () {
      const file = this.files[0];
      if (file && file.type.startsWith('image/')) {
        const reader = new FileReader();
        reader.onload = function (e) {
          preview.src = e.target.result;
          preview.style.display = 'block';
          controls.style.display = 'block';
        };
        reader.readAsDataURL(file);
      }
    });

    function clearImage() {
      input.value = '';
      preview.src = '#';
      preview.style.display = 'none';
      controls.style.display = 'none';
    }
  </script>
</body>
</html>
