<div class="container-xxl">
    <div class="py-3 d-flex align-items-sm-center flex-sm-row flex-column">
        <div class="flex-grow-1">
            <h4 class="fs-22 fw-bold m-0">Pagos</h4>
        </div>
    </div>
    <div class="py-2 d-flex align-items-sm-center flex-sm-row flex-column">
        <div class="d-flex flex-wrap gap-2">
            <a href="nuevo_pago" class="btn btn-primary"><i class="fas fa-plus"></i> &nbsp; Nuevo Pago</a>
        </div>
    </div>

    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <table id="tablaES" class="table table-striped dt-responsive nowrap w-100">
                        <thead>
                            <tr>
                                <th>Cliente</th>
                                <th>Fecha de Pago</th>
                                <th>Monto</th>
                                <th>Plan</th>
                                <th>Metodo de pago</th>
                                <th>Estado del pago</th>
                                <th>acciones</th>

                            </tr>
                        </thead>
                        <!--los pagos de la membresía mensual deben ser registrados con la información del cliente,
                        fecha de pago, monto pagado, método de pago (efectivo, tarjeta de crédito, transferencia bancaria), a
                        que clase pertenece, y el estado del pago (completado = 1 o pendiente = 0).-->
                        <tbody>
                            <?php
                            $pagos = ControladorPagos::crtMostrarPagos(null, null);

                            //print_r($pagos);
                            foreach ($pagos as $key => $value) {
                                $idCliente = "id_Cliente";
                                $valor = $value["id_Cliente"];
                                $cliente = controladorCliente::crtMostrarCliente($idCliente, $valor);
                                $plan = controladorPlanes::crtMostrarPlanes("id_PlanEntrenamiento",$cliente["id_PlanEntrenamiento"]);


                            ?>
                                <tr>
                                    <td> <?php echo $cliente["apellido"] . ' ' . $cliente["nombre"]; ?></td>
                                    <td> <?php echo Funciones::cambiaFormatoFecha($value["fechaPago"]) ?></td>
                                    <td> <?php echo '$ ' . $value["montoPago"] ?></td>
                                    <td> <?php echo $plan["nombrePlan"] ?></td>

                                    <?php if ($value["metodoPago"] == 1) {
                                    ?><td><?php echo "Efectivo"; ?></td>
                                        <?php } elseif ($value["metodoPago"] == 2) { ?>
                                            <td><?php echo "Tarjeta de Credito"; ?></td>
                                            <?php } elseif ($value["metodoPago"] == 3) { ?>
                                                <td><?php echo "Tarjeta de Credito"; ?></td>
                                                <?php } else { ?>
                                                    <td><?php echo "Tarjeta de Credito";
                                                    } ?></td>


                                        <?php if ($value["estadoPago"] == 1) {
                                            ?><td><?php echo "Activo"; ?></td>
                                                <?php } else { ?>
                                                    <td><?php echo "Inactivo";
                                                    } ?></td>
                                            <td><a href="editar_pago/<?php echo $value["id_Pago"]?>" class="btn btn-warning btn-sm"><i class="fas fa-edit"></i></a>
                                                <a href="eliminar_pago" class="btn btn-danger btn-sm"><i class="fas fa-trash"></i></a>
                                            </td>
                                </tr>

                            <?php } ?>

                        </tbody>
                    </table>

                </div>

            </div>
        </div>
    </div>

</div>