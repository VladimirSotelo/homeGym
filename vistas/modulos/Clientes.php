<div class="container-xxl">
    <div class="py-3 d-flex align-items-sm-center flex-sm-row flex-column">
        <div class="flex-grow-1">
            <h4 class="fs-22 fw-bold m-0">Clientes</h4>
        </div>
    </div>
    <div class="py-2 d-flex align-items-sm-center flex-sm-row flex-column">
        <div class="d-flex flex-wrap gap-2">
            <a href="<?php echo $url; ?>nuevo_cliente" class="btn btn-primary"><i class="fas fa-plus"></i> &nbsp; Nuevo Clientes</a>
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
                                <th>Plan de Entrenaminto</th>
                                <th>Fecha de inscripcion</th>
                                <th>telefono</th>
                                <th>Estado</th>
                                <th>Direccion</th>
                                <th>Nº Usuario</th>
                                <th>Fecha Nacimiento</th>
                                <th>Email</th>
                                <th>Acciones</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            
                            $cliente = controladorCliente::crtMostrarCliente(null,null);
                            

                            foreach ($cliente as $key => $value) {
                                $plan="id_PlanEntrenamiento";
                                $valor=$value["id_PlanEntrenamiento"];
                                $planes=controladorPlanes::crtMostrarPlanes($plan,$valor);
                                //print_r($planes["nombrePlan"]);?>
                                
                                <tr>
                                    <td><?php echo $value["nombre"]; ?></td>
                                    <td><?php echo $value["apellido"]; ?></td>
                                    <td><?php echo $value["dni"]; ?> </td>
                                    <td><?php echo $planes["nombrePlan"] ?></td>
                                    
                                    
                                    <td><?php echo Funciones::cambiaFormatoFecha($value["fechaInscripcion"]); ?></td>
                                    <td><?php echo $value["telefono"]; ?> </td>

                                    <?php if ($value["id_EstadoMembresia"] == 1) {
                                    ?><td><?php echo "Activo"; ?></td>
                                    <?php } else { ?>
                                        <td><?php echo "Inactivo";
                                        } ?></td>

                                        <td><?php echo $value["direccion"]; ?> </td>

                                        <td><?php echo $value["id_Usuario"] ?></td>
                                        <td><?php echo Funciones::cambiaFormatoFecha($value["fechaNacimiento"]); ?></td>
                                        <td><?php echo $value["email"]; ?> </td>
                                        <td><a href="editar_cliente/<?php echo $value["id_Cliente"] ?>" class="btn btn-warning btn-sm"><i class="fas fa-edit"></i></a>
                                            <a href="eliminar_cliente" class="btn btn-danger btn-sm"><i class="fas fa-trash"></i></a>
                                        </td>
                                </tr>

                            <?php } ?>

                        </tbody>
                    </table>
                    <input type="hidden" id="url" value="<?php echo $url; ?>">
                </div>

            </div>
        </div>
    </div>

</div>