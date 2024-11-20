$(document).on("click", ".btnGuardar", function (e) {
  // Previene el envío automático del formulario
  e.preventDefault();

  // Inicializar arreglo para IDs de especialidades seleccionadas
  let especialidadesSeleccionadas = [];

  // Verificar si existe la tabla de especialidades
  const tabla = $("#tablaSelectMultiES").DataTable();
  if ($.fn.DataTable.isDataTable("#tablaSelectMultiES")) {
      // Capturar los IDs seleccionados si la tabla existe
      tabla.rows({ selected: true }).every(function () {
          const data = this.data();
          especialidadesSeleccionadas.push(data[0]); // El ID está en la primera columna
      });

      // Agregar los IDs seleccionados al input oculto del formulario
      if ($("#especialidadesSeleccionadas").length === 0) {
          // Crear dinámicamente el input oculto si no existe
          $("<input>")
              .attr({
                  type: "hidden",
                  id: "especialidadesSeleccionadas",
                  name: "especialidadesSeleccionadas",
                  value: especialidadesSeleccionadas.join(","),
              })
              .appendTo("form");
      } else {
          // Si ya existe, actualizar su valor
          $("#especialidadesSeleccionadas").val(especialidadesSeleccionadas.join(","));
      }
  }

  // Confirmación con SweetAlert

  Swal.fire({
      title: "¿Está seguro que desea guardar?",
      text: "Confirme si desea guardar los cambios.",
      icon: "warning",
      showCancelButton: true,
      confirmButtonColor: "#3085d6",
      cancelButtonColor: "#d33",
      cancelButtonText: "Cancelar",
      confirmButtonText: "Sí, guardar",
  }).then(function (result) {
      if (result.isConfirmed) {
          // Enviar el formulario manualmente si se confirma
        $("form").submit();
          $("form").submit(); // Enviar el formulario si se confirma
      }
  });
});


$(document).on("click", ".btnVolver", function () {
  let pag = $(this).attr("pag"); 
  Swal.fire({
      title: "¿Está seguro que desea salir sin guardar?",
      text: "Confirme si desea salir sin guardar los cambios.",
      icon: "warning",
      showCancelButton: true,
      confirmButtonColor: "#3085d6",
      cancelButtonColor: "#d33",
      cancelButtonText: "Cancelar",
      confirmButtonText: "Sí, salir",
  }).then(function (result) {
      if (result.isConfirmed) {
        window.location = pag;
      }
  });
});

$(document).on("click", ".btnPermisos", function () {
  let pag = $(this).attr("pag"); 
  Swal.fire({
      title: "Error",
      text: "Permisos Insuficientes.",
      icon: "error",
      showCancelButton: false,
      confirmButtonColor: "#3085d6",
      cancelButtonColor: "#d33",
      cancelButtonText: "Cancelar",
      confirmButtonText: "OK",
  }).then(function (result) {
      if (result.isConfirmed) {
        window.location =
        "login";
      }
  });
});

$(document).on("click", ".btnEliminar", function () {
   
  let categoria = $(this).attr("categoria"); 
  let valorElim = $(this).attr("valorElim"); 
  let pag = $(this).attr("pag"); 

  Swal.fire({
    title: "¿Está seguro de eliminar el registro?",
    text: categoria +  ": " + valorElim,
    icon: "warning",
    showCancelButton: true,
    confirmButtonColor: "#3085d6",
    cancelButtonColor: "#d33",
    cancelButtonText: "Cancelar",
    confirmButtonText: "Sí, eliminar",
  }).then(function (result) {
    if (result.value) {
      window.location =
        pag;
    }
  });
});

