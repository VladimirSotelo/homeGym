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
                                <th>Cliente</th>
                                <th>Fecha de Pago</th>
                                <th>Monto</th>
                                <th>Metodo de pago</th>
                                <th>Plan</th>
                                <th>Estado del pago</th>
                                <th>acciones</th>

                            </tr>
                        </thead>
                        <!--los pagos de la membresía mensual deben ser registrados con la información del cliente,
                        fecha de pago, monto pagado, método de pago (efectivo, tarjeta de crédito, transferencia bancaria), a
                        que clase pertenece, y el estado del pago (completado o pendiente).-->
                        <tbody>
                            <?php
                            $pagos = ControladorPagos::crtMostrarPagos();
                            //print_r($pagos);
                            foreach ($pagos as $key => $value) {
                            ?>
                                <tr>
                                    <td> <?php echo $value["cliente"] ?></td>
                                    <td> <?php echo Funciones::cambiaFormatoFecha($value["fechaPago"]) ?></td>
                                    <td> <?php echo '$ '.$value["montoPago"] ?></td>
                                    <td> <?php echo $value["metodoPago"] ?></td>
                                    <td> <?php echo $value["nombrePlan"] ?></td>
                                    <td> <?php echo $value["estadoPago"] ?></td>
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