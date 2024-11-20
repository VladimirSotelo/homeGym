<div class="container-xxl">
    <div class="py-3 d-flex align-items-sm-center flex-sm-row flex-column">
        <div class="flex-grow-1">
            <h4 class="fs-22 fw-bold m-0">Usuarios</h4>
        </div>
    </div>
    <div class="py-2 d-flex align-items-sm-center flex-sm-row flex-column">
        <div class="d-flex flex-wrap gap-2">
            <a href="nuevo_usuario" class="btn btn-primary"><i class="fas fa-plus"></i> &nbsp; Nuevo Usuario</a>
        </div>
    </div>

    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <table id="tablaES" class="table table-striped dt-responsive nowrap w-100">
                        <thead>
                            <tr>

                                <th>Nombre usuario</th>
                                <th>Nombre </th>
                                <th>Apellido</th>
                                <th>Email</th>
                                <th>Estado</th>
                                <th>Acciones</th>
                                <th>Nº</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            $usuario = ControladorUsuarios::crtMostrarUsuarios();
                            //print_r($profesore);
                            foreach ($usuario as $key => $value) {
                            ?>
                                <tr>

                                    <td> <?php echo $value["usuario"] ?></td>
                                    <td> <?php echo $value["nombre"] ?></td>
                                    <td> <?php echo $value["apellido"] ?></td>
                                    <td><?php echo $value["email"] ?></td>

                                    <?php if ($value["id_EstadoMembresia"] == 1) { ?>
                                        <td><?php echo "Activo"; ?></td>
                                    <?php } else { ?>
                                        <td><?php echo "Inactivo";
                                        } ?></td>

                                        <td><a href="editar_usuario" class="btn btn-warning btn-sm" pag="usuarios"><i class="fas fa-edit"></i></a>
                                            <a href="eliminar_usuario" class="btn btn-danger btn-sm"><i class="fas fa-trash"></i></a>
                                        </td>
                                        <td> <?php echo $value["id_Usuario"] ?></td>
                                </tr>

                            <?php } ?>

                        </tbody>
                    </table>

                </div>

            </div>
        </div>
    </div>

    

</div>