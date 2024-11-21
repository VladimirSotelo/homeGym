"use strict";

$(document).ready(function () { 

    //tabla General para visualizar sin seleccion
    $('#tablaES').DataTable({
        scrollX: true,
        pagingType: "full_numbers",
        language: window.espanol
    });

    //tabla solo seleccion
    $('#tablaSelectES').DataTable({
        scrollX: true,
        select: true,
        blurable: true,
        select: { style: "single" },
        pagingType: "full_numbers",
        language: window.espanol
    });

    //tabla solo seleccion multiple
    const tabla = $("#tablaSelectMultiES").DataTable({
        scrollX: true,
        select: true,
        blurable: true,
        select: { style: "multi" },
        pagingType: "full_numbers",
        columnDefs: [
            { targets: 0, visible: false }, // Oculta la columna de IDs
        ],
        language: window.espanol
    });
    //const especialidadesSeleccionadas = [1, 2, 3]; 

    // Selecciona las filas correspondientes
    especialidadesSeleccionadas.forEach((id) => {
        tabla.rows((idx, data, node) => {
            // Verifica si el ID de la especialidad coincide con la fila actual
            return data[0] == id; // Compara el primer dato (ID) de la fila
        }).select();
    });

});

