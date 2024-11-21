<?php
$especialidad = controladorEspecialidades::crtMostrarEspecialidades(NULL, NULL);

$idEspec = "Id_Especialidad";
$valor = $rutas[1];

$especialidad_selec = controladorEspecialidades::crtMostrarEspecialidades($idEspec, $valor);

if ($especialidad_selec) {
?>

<div class="container-xxl">

    <div class="py-3 d-flex align-items-sm-center flex-sm-row flex-column">
        <div class="flex-grow-1">
            <h4 class="fs-22 fw-bold m-0">Editar Especialidad</h4>
        </div>
    </div>
    <form method="POST">
        <div class="row"> <!-- Floating Labels -->
            <div class="col-12">
                <div class="card">

                    <div class="card-header">
                        <h5 class="card-title mb-0">Ingrese los Datos</h5>
                    </div><!-- end card header -->

                    <div class="card-body">
                        <div class="row">
                            <div class="col-lg-12">
                                <!-- <h6 class="fs-15 mb-3">Apellido</h6> -->

                                <div class="form-floating mb-3">
                                    <input type="text" class="form-control" id="especialidad" name="especialidad" placeholder="Especialidad" value="<?php echo $especialidad_selec["especialidad"]; ?>" required>
                                    <label for="apellido">Especialidad</label>
                                </div>
                            </div>                           
                        </div>                        
                    </div>
                </div>

                <!-- campo oculto para el id -->
                <input type="hidden" name="Id_Especialidad" value="<?php echo $especialidad_selec["Id_Especialidad"]; ?>">

                <?php
                $guardar = new controladorEspecialidades();
                $guardar->ctrEditarEspecialidad();
                ?>
                <div class="row">
                    <div class="col-lg-6">
                        <div class="px-2 py-2 d-flex align-items-sm-center flex-sm-row flex-column">
                            <div class="d-flex flex-wrap gap-2">
                                <button type="button" class="btn btn-outline-dark btnVolver" pag="especialidades"><i class="fa-solid fa-caret-left"></i> &nbsp; Cancelar</button>
                                <button type="button" class="btn btn-primary btnGuardar"><i class="fa-solid fa-floppy-disk"></i> &nbsp; Guardar</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>            
        </div>
    </form>
</div> <!-- container-fluid -->
<?php } else { ?>
    <h3>Especialidad no disponible</h3>

<?php } ?>