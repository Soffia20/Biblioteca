$(document).ready(function () {
    $('#estudiante').on('input', function () {
        let query = $(this).val();
        if (query.length >= 2) {
            $.ajax({
                url: 'index.php?c=Estudiantes&a=buscar',
                method: 'POST',
                data: { nombre: query },
                success: function (response) {
                    $('#sugerencias').html(response).show();
                }
            });
        } else {
            $('#sugerencias').hide();
        }
    });

    // Cuando se hace clic en una sugerencia
    $(document).on('click', '.sugerencia-item', function () {
        let nombre = $(this).text();
        let id = $(this).data('id');

        $('#estudiante').val(nombre);
        $('#estudiante_id').val(id);
        $('#sugerencias').hide();
    });

    // Ocultar sugerencias al hacer clic fuera
    $(document).click(function (e) {
        if (!$(e.target).closest('#estudiante, #sugerencias').length) {
            $('#sugerencias').hide();
        }
    });
});



$(document).ready(function () {
    $('#prestamo').on('input', function () {
        let query = $(this).val();
        if (query.length >= 2) {
            $.ajax({
                url: 'index.php?c=Libros&a=buscar',
                method: 'POST',
                data: { titulo: query },
                success: function (response) {
                    $('#sugerencias').html(response).show();
                }
            });
        } else {
            $('#sugerencias').hide();
        }
    });

    // Cuando se hace clic en una sugerencia
    $(document).on('click', '.sugerencia-item', function () {
        let titulo = $(this).text();
        let id = $(this).data('id');

        $('#prestamo').val(titulo); // Mostrar nombre del libro
        $('#titulo').val(id);       // Guardar el ID del libro en el campo oculto
        $('#sugerencias').hide();
    });

    // Ocultar sugerencias al hacer clic fuera
    $(document).click(function (e) {
        if (!$(e.target).closest('#prestamo, #sugerencias').length) {
            $('#sugerencias').hide();
        }
    });
});
