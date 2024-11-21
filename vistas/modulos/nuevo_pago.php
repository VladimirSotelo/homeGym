<form method="POST">

    <div class="py-3 d-flex align-item-sm-center flex-sm-ron flex-columm">
        <h5 class="flex-grow-1">Nuevo Pago</h5>
    </div>
    <div class="row">
        <div class="col-lg-6">
            <div class="card">

                <div class="card-header">
                    <h5 class="card-title mb-0">Datos del Pago</h5>
                </div><!-- end card header -->

                <div class="card-body">
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="row g-2">

                                <div class="md-3">
                                    <label for="fechaPago" class="form-label">Fecha de Pago</label>
                                    <input type="date" id="fechaPago" class="form-control" name="fechaPago" value="<?= $_POST["fechaPago"] ?? '' ?>" required>
                                </div>
                                <div class="md-3">
                                    <label for="montoPago" class="form-label">Monto del Pago</label>
                                    <input type="number" id="montoPago" class="form-control" name="montoPago" value="<?= $_POST["montoPago"] ?? '' ?>" required>
                                </div>
                                <div class="md-3">
                                    <label for="metodoPago" class="form-label">Metodo de Pago</label>
                                    <select class="form-select" id="metodoPago" name="metodoPago">
                                        <option value="1">Efectivo</option>
                                        <option value="2">Tarjeta de Credito</option>
                                        <option value="3">Transferencia Bancaria</option>
                                        <option value="4">Cheque</option>
                                    </select>

                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-lg-6">
            <div class="card">

                <div class="card-header">
                    <h5 class="card-title mb-0">Datos del Cliente</h5>
                </div><!-- end card header -->

                <div class="card-body">
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="row g-2">

                                <div class="col-md">
                                    <label for="cliente" class="form-label">Cliente</label>
                                    <select class="form-select" name="id_Cliente" id="cliente">
                                        <?php
                                        $cliente = controladorCliente::crtMostrarCliente(null, null);
                                        foreach ($cliente as $key => $value) { ?>
                                            <option value="<?php echo $value["id_Cliente"] ?>"> <?php echo $value["apellido"] . ' ' . $value["nombre"]; ?></option>

                                        <?php } ?>
                                    </select>
                                </div>

                                <div class="md-3">
                                    <label for="Plan" class="form-label">Plan de entrenamiento</label>
                                    
                                    <select class="form-select" name="id_PlanEntrenamineto" id="plan">

                                        <?php $plan = controladorPlanes::crtMostrarPlanes(null, null);
                                        foreach ($plan as $key => $value) { ?>
                                            <option value="<?php echo $value["id_PlanEntrenamiento"] ?>"><?php echo $value["nombrePlan"]; ?></option>
                                        <input type="hidden" id="plan" value="<?php echo $value["id_PlanEntrenamiento"]; ?>">
                                        <?php } ?>
                                    </select>
                                </div>

                                <div class="md-3">
                                    <label class="form-label" for="estado">estado</label>
                                    <select class="form-select" id="estadoPago" name="estadoPago">
                                        <?php $estado = ControladorPagos::crtMostrarPagos(NULL, NULL);
                                        foreach ($estado as $key => $value) { ?>
                                            <?php if ($value["estadoPago"]) { ?>
                                                <option value="1">activo</option>
                                            <?php } else { ?>
                                                <option value="0">inactivo</option>
                                            <?php } ?>

                                        <?php } ?>

                                    </select>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <?php
        $pago = new ControladorPagos();
        $pago->ctrAgregarPago();
        ?>
        <div class="col-12">
            <div class="row">
                <div class="col-lg-6">
                    <div class="px-2 py-2 d-flex align-items-sm-center flex-sm-row flex-column">
                        <div class="d-flex flex-wrap gap-2">

                            <form action="<?php echo $url; ?>pagos">
                                <button type="button" class="btn btn-outline-dark btnVolver" pag="<?php echo $url; ?>pagos"><i class="fa-solid fa-caret-left"></i> &nbsp; Cancelar</button>
                                <button type="button" class="btn btn-primary btnGuardar"><i class="fa-solid fa-floppy-disk"></i> &nbsp; Guardar</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>
</form>