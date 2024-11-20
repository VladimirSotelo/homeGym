<div class="container-xxl">
    <div class="py-3 d-flex align-items-sm-center flex-sm-row flex-column">
        <div class="flex-grow-1">
            <h4 class="fs-22 fw-bold m-0">Profesores</h4>
        </div>
    </div>
    <div class="py-2 d-flex align-items-sm-center flex-sm-row flex-column">
        <div class="d-flex flex-wrap gap-2">
            <a href="nuevo_profesor" class="btn btn-primary"><i class="fas fa-plus"></i> &nbsp; Nuevo Profesor</a>
        </div>
    </div>

    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <table id="tablaProfes" class="table table-striped">
                        <thead>
                            <tr>
                                <th></th>
                                <th>Profesor</th>
                                <th>DNI</th>
                                <th>Telefono</th>
                                <th>Email</th>
                                <th>Especialidades</th>
                                <th>Fecha de contratacion</th>
                                <th>Estado</th>
                                <th>Acciones</th>
                        </thead>
                        <tbody>
                            <?php
                            $entrenador = ControladorProfesores::crtMostrarProfesor();
                            //print_r($profesore);
                            foreach ($entrenador as $key => $value) {
                            ?>
                                <tr>
                                    <td class="dt-control"></td>   
                                    <td> <?php echo $value["apellido"] . ", " . $value["nombre"]  ?></td>
                                    <td> <?php echo $value["dni"] ?></td>
                                    <td> <?php echo $value["telefono"] ?></td>
                                    <td> <?php echo $value["email"] ?></td>
                                    <td> <?php echo $value["especialidades"] ?></td>
                                    <td> <?php echo Funciones::cambiaFormatoFecha($value["fechaContratacion"]) ?></td>
                                    <td> <?php 
                                        if ($value["estadoEntrenador"]){
                                            ?>
                                                <h5><span class="badge rounded-pill bg-success text-light">
                                                    <i class="fa-solid fa-check"></i><?php echo " Activo"; ?>
                                                </span></h5>
                                            <?php 
                                        }else{
                                            ?>
                                                <h5><span class="badge rounded-pill bg-danger text-light">
                                                <i class="fa-solid fa-xmark"></i><?php echo " Inactivo"; ?>
                                                </span></h5>
                                            <?php 
                                        }
                                    ?></td>
                                    <td><a href="editar_profesor" class="btn btn-warning btn-sm"><i class="fas fa-edit"></i></a>
                                    <a href="eliminar_profesor" class="btn btn-danger btn-sm"><i class="fas fa-trash"></i></a></td>
                                </tr>

                            <?php } ?>

                        </tbody>
                    </table>

                </div>

            </div>
        </div>
    </div>

</div>

<script>
    // Función de formato para los detalles de la tabla
    function format(d) {
        return (
            '<div><b>Teléfono: </b> ' + d[3] + 
            '<br> <b>Email: </b> ' + d[4] +  
            '<br /><br /><b>Fecha de Contratación: </b>' + d[6] +
            '</div>'
        );
    }


    $(document).ready(function() {

        
        // Inicialización de DataTable
        let table = $('#tablaProfes').DataTable({
            scrollX: true,
            pagingType:"full_numbers",
            "language": window.espanol,
            columnDefs: [
            {
                target: 3,
                visible: false
            },
            {   
                target: 4,
                visible: false
            },
            {
                target: 6,
                visible: false
            }            
            ]
        });

        // Evento para mostrar y ocultar detalles
        $('#tablaProfes tbody').on('click', 'td.dt-control', function () {
            let tr = $(this).closest('tr');
            let row = table.row(tr);

            if (row.child.isShown()) {
                // Esta fila ya está abierta, la cierra
                row.child.hide();
                                
            } else {
                // Abre la fila y muestra detalles
                
                row.child(format(row.data())).show();
            }
        });
    });
</script>