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
    $('#tablaSelectMultiES').DataTable({
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
});

