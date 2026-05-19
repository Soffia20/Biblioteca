$(document).ready(function () {
    $('.btn-eliminar').click(function(e) {
        e.preventDefault();

        if (!confirm("¿Estás seguro de eliminar este registro?")) return;

        const id = $(this).data('id');
        const tabla = $(this).data('tabla');
        const columna = $(this).data('columna');
        const row = $(this).closest('tr');

        $.ajax({
            url: 'eliminar.php',
            type: 'POST',
            data: {
                id: id,
                tabla: tabla,
                columna: columna
            },
            success: function(response) {
                if (response.trim() === 'ok') {
                    row.remove();
                } else {
                    alert("Error al eliminar: " + response);
                }
            },
            error: function(xhr, status, error) {
                alert("Error en la solicitud: " + error);
                console.log(xhr.responseText);
            }
        });
    });
});
