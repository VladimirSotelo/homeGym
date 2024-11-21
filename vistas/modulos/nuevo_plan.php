<form method="POST">

    <div class="py-3 d-flex align-item-sm-center flex-sm-ron flex-columm">
        <h5 class="flex-grow-1">Nuevo Plan</h5>
    </div>
    <div class="row">
        <div class="col-lg-6">
            <div class="card">

                <div class="card-header">
                    <h5 class="card-title mb-0">Datos del Plan</h5>
                </div><!-- end card header -->

                <div class="card-body">
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="row g-2">

                                <div class="md-3">
                                    <label for="nombrePlan" class="form-label">Nombre del plan</label>
                                    <input type="text" id="nombrePlan" class="form-control" name="nombrePlan" value="<?= $_POST["nombrePlan"] ?? '' ?>" required>
                                </div>
                                <div class="md-3">
                                    <label for="descripcion" class="form-label">Descripcion del plan </label>
                                    <input type="text" id="descripcion" class="form-control" name="descripcion" value="<?= $_POST["descripcion"] ?? '' ?>" required>
                                </div>
                                <div class="col-md">
                                    <label for="duracion" class="form-label">Duracion del plan en semanas</label>
                                    <input type="number" id="duracion" class="form-control" name="duracion" value="<?= $_POST["duracion"] ?? '' ?>" required>
                                </div>
                                <div class="col-md">
                                    <label for="cantSesionesSemanales" class="form-label">Sesiones por semanas</label>
                                    <input type="number" id="cantSesionesSemanales" class="form-control" name="cantSesionesSemanales" value="<?= $_POST["cantSesionesSemanales"] ?? '' ?>" required>
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
                    <h5 class="card-title mb-0">Datos del Profesor a Cargo</h5>
                </div><!-- end card header -->

                <div class="card-body">
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="row g-2">

                                <div class="col-md">
                                    <label for="Profesor" class="form-label">Nombre y Apellido del profesor</label>
                                    <select class="form-select" id="Profesor" name="id_Profesor">

                                        <?php
                                        $profe = ControladorProfesores::crtMostrarProfesor(null, null);
                                        foreach ($profe as $key => $value) { ?>
                                            <option value="<?php echo $value["id_Profesor"] ?>"><?php echo  $value["apellido"] . ' ' . $value["nombre"] ?></option>

                                        <?php } ?>
                                    </select>

                                    <div class="md-3">
                                        <label for="fechaContratacion" class="form-label">Fecha de contratacion</label>
                                        <input type="date" id="fechaContratacion" class="form-control" name="fechaContratacion" value="<?= $_POST["fechaContratacion"] ?? '' ?>" required>
                                    </div>

                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <?php
            $plan = new controladorPlanes();
            $plan->ctrAgregarPlan();
            ?>
            <div class="col-12">
                <div class="row">
                    <div class="col-lg-6">
                        <div class="px-2 py-2 d-flex align-items-sm-center flex-sm-row flex-column">
                            <div class="d-flex flex-wrap gap-2">

                                <form action="<?php echo $url; ?>planes">
                                    <button type="button" class="btn btn-outline-dark btnVolver" pag="<?php echo $url; ?>planes"><i class="fa-solid fa-caret-left"></i> &nbsp; Cancelar</button>
                                    <button type="button" class="btn btn-primary btnGuardar"><i class="fa-solid fa-floppy-disk"></i> &nbsp; Guardar</button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>
</form>