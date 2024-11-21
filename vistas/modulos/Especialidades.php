<div class="container-xxl">
    <div class="py-3 d-flex align-items-sm-center flex-sm-row flex-column">
        <div class="flex-grow-1">
            <h4 class="fs-22 fw-bold m-0">Especialidades</h4>
        </div>
    </div>
    <div class="py-2 d-flex align-items-sm-center flex-sm-row flex-column">
        <div class="d-flex flex-wrap gap-2">
            <a href="nuevo_especialidad" class="btn btn-primary"><i class="fas fa-plus"></i> &nbsp; Nueva especialidad</a>
        </div>
    </div>

    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <table id="tablaES" class="table table-striped dt-responsive nowrap w-100">
                        <thead>
                            <tr>
                                <th>Especialidad</th>
                                <th>Acciones</th>

                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            $especialidades = controladorEspecialidades::crtMostrarEspecialidades();
                            /*print_r($profesore);*/
                            foreach ($especialidades as $key => $value) {
                            ?>
                                <tr>
                                    <td> <?php echo $value["especialidad"] ?></td>
                                    <td><a href="editar_especialidad/<?php echo $value["Id_Especialidad"] ?>" class="btn btn-warning btn-sm"><i class="fas fa-edit"></i></a> 
                                    <a href="eliminar_especialidad" class="btn btn-danger btn-sm btnEliminar" id_Especialidad = <?php echo $value["Id_Especialidad"] ?> pag= "especialidades" categoria = "Especialidad" valorElim = "<?php echo $value["especialidad"] ?>"><i class="fas fa-trash"></i></a></td>
                                </tr>

                            <?php } ?>

                        </tbody>
                    </table>

                </div>

            </div>
        </div>
    </div>

</div>