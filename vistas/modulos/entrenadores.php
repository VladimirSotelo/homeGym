<div class="container-xxl">
    <div class="py-3 d-flex align-items-sm-center flex-sm-row flex-column">
        <div class="flex-grow-1">
            <h4 class="fs-22 fw-bold m-0">Entrenadores</h4>
        </div>
    </div>
    <div class="py-2 d-flex align-items-sm-center flex-sm-row flex-column">
        <div class="d-flex flex-wrap gap-2">
            <a href="nuevo_profesores" class="btn btn-primary"><i class="fas fa-plus"></i> &nbsp; Nuevo Profesor</a>
        </div>
    </div>

    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <table id="tablaES" class="table table-striped dt-responsive nowrap w-100">
                        <thead>
                            <tr>
                                <th>Entrenador</th>
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
                            $entrenador = ControladorEntrenador::crtMostrarEntrenador();
                            //print_r($profesore);
                            foreach ($entrenador as $key => $value) {
                            ?>
                                <tr>
                                    <td> <?php echo $value["entrenador"] ?></td>
                                    <td> <?php echo $value["dni"] ?></td>
                                    <td> <?php echo $value["telefono"] ?></td>
                                    <td> <?php echo $value["email"] ?></td>
                                    <td> <?php echo $value["especialidades"] ?></td>
                                    <td> <?php echo Funciones::cambiaFormatoFecha($value["fechaContratacion"]) ?></td>
                                    <td> <?php echo $value["estadoEntrenador"] ?></td>
                                    <td><a href="editar_profesor" class="btn btn-warning btn-sm"><i class="fas fa-edit"></i></a> <a href="eliminar_profesor" class="btn btn-danger btn-sm"><i class="fas fa-trash"></i></a></td>
                                </tr>

                            <?php } ?>

                        </tbody>
                    </table>

                </div>

            </div>
        </div>
    </div>

</div>