<?php
$plan = "id_PlanEntrenamiento";
$valor = $rutas[1];

$plan_selec = controladorPlanes::crtMostrarPlanes($plan, $valor);
print_r($plan_selec);
if ($plan_selec) {
?>
    <form method="POST">

        <div class="py-3 d-flex align-item-sm-center flex-sm-ron flex-columm">
            <h5 class="flex-grow-1">Editar Plan</h5>
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
                                        <input type="text" id="nombrePlan" class="form-control" name="nombrePlan" value="<?php echo $plan_selec["nombrePlan"]; ?>" >
                                    </div>
                                    <div class="md-3">
                                        <label for="descripcion" class="form-label">Descripcion del plan </label>
                                        <input type="text" id="descripcion" class="form-control" name="descripcion" value="<?php echo $plan_selec["descripcion"]; ?>" required>
                                    </div>
                                    <div class="col-md">
                                        <label for="duracion" class="form-label">Duracion del plan en semanas</label>
                                        <input type="number" id="duracion" class="form-control" name="duracion" value="<?php echo $plan_selec["duracion"]; ?>" required>
                                    </div>
                                    <div class="col-md">
                                        <label for="cantSesionesSemanales" class="form-label">Sesiones por semanas</label>
                                        <input type="number" id="cantSesionesSemanales" class="form-control" name="cantSesionesSemanales" value="<?php echo  $plan_selec["cantSesionesSemanales"]; ?>" required>
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
                                    <label for="Profesor">Nombre y Apellido Profesor</label>
                                    <select class="form-select" id="Profesor">

                                        <?php $profe = ControladorProfesores::crtMostrarProfesor(null, null);

                                        foreach ($profe as $key => $value) { ?>
                                            <option id="<?php echo $plan_selec["id_Profesor"] ?>"><?php echo $value["apellido"] . ' ' . $value["nombre"]; ?></option>
                                        <?php } ?>
                                    </select>





                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <input type="hidden" name="id_Profesor" value="<?php echo $plan_selec["id_Profesor"]; ?>">
                <input type="hidden" name="id_PlanEntrenamiento" value="<?php echo $plan_selec["id_PlanEntrenamiento"]; ?>">
                <?php
                $plan = new controladorPlanes();
                $plan->ctrEditarPlan();
                ?>
            </div>

        </div>
        <div class="col-12">
            <div class="row">
                <div class="col-lg-6">
                    <div class="px-2 py-2 d-flex align-items-sm-center flex-sm-row flex-column">
                        <div class="d-flex flex-wrap gap-2">

                            <form action="planes">
                                <button type="button" class="btn btn-outline-dark btnVolver" pag="<?php echo $url; ?>planes"><i class="fa-solid fa-caret-left"></i> &nbsp; Cancelar</button>
                                <button type="button" class="btn btn-primary btnGuardar"><i class="fa-solid fa-floppy-disk"></i> &nbsp; Guardar</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </form>
<?php } else { ?>
    <h3>Plan no disponible</h3>

<?php } ?>