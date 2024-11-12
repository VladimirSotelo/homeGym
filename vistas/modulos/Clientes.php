<div class="container-xxl">
    <div class="py-3 d-flex align-items-sm-center flex-sm-row flex-column">
        <div class="flex-grow-1">
            <h4 class="fs-22 fw-bold m-0">Clientes</h4>
        </div>
    </div>
    <div class="py-2 d-flex align-items-sm-center flex-sm-row flex-column">
        <div class="d-flex flex-wrap gap-2">
            <a href="nuevo_cliente" class="btn btn-primary"><i class="fas fa-plus"></i> &nbsp; Nuevo Clientes</a>
        </div>
    </div>

    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <table id="tablaES" class="table table-striped dt-responsive nowrap w-100">
                        <thead>
                            <tr>
                                <th>Nombre</th>
                                <th>Apellido</th>
                                <th>DNI</th>
                                <th>Fecha Nacimiento</th>
                                <th>Plan de Entrenaminto</th>
                                <th>Direccion</th>
                                <th>telefono</th>
                                <th>Email</th>
                                <th>Fecha de inscripcion</th>
                                <th>Estado de Mempresia </th>
                                <th>Acciones</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            $cliente = controladorCliente::crtMostrarCliente();
                            //print_r($profesore);
                            foreach ($cliente as $key => $value) {
                            ?>
                                <tr>
                                    <td><?php echo $value["nombreCliente"]; ?></td>
                                    <td><?php echo $value["apellidoCliente"]; ?></td>
                                    <td><?php echo $value["dni"]; ?></td>
                                    <td><?php echo Funciones::cambiaFormatoFecha($value["fechaNacimiento"]); ?></td>
                                    <td><?php echo $value["nombrePlan"]; ?> </td>
                                    <td><?php echo $value["direccion"]; ?> </td>
                                    <td><?php echo $value["telefono"]; ?> </td>
                                    <td><?php echo $value["email"]; ?> </td>
                                    <td><?php echo Funciones::cambiaFormatoFecha($value["fechaInscripcion"]); ?></td>
                                    <td><?php echo $value["estadoMempresia"]; ?></td>
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