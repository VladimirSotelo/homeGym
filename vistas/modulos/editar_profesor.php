<?php
$especialidad = controladorEspecialidades::crtMostrarEspecialidades(NULL, NULL);
$idProfesor = "p.id_Profesor";
$valor = $rutas[1];

$profesor_selec = ControladorProfesores::crtMostrarProfesor($idProfesor, $valor);

if ($profesor_selec) {
?>

<div class="container-xxl">

    <div class="py-3 d-flex align-items-sm-center flex-sm-row flex-column">
        <div class="flex-grow-1">
            <h4 class="fs-22 fw-bold m-0">Editar Profesor</h4>
        </div>
    </div>
    <form method="POST">
        <div class="row"> <!-- Floating Labels -->
            <div class="col-12">
                <div class="card">

                    <div class="card-header">
                        <h5 class="card-title mb-0">Datos del Profesor</h5>
                    </div><!-- end card header -->

                    <div class="card-body">
                        <div class="row">
                            <div class="col-lg-3">
                                <!-- <h6 class="fs-15 mb-3">DNI</h6> -->
                                <div class="form-floating mb-3">
                                    <input type="number" class="form-control" id="dni" name="dni" placeholder="DNI" value="<?php echo $profesor_selec["dni"]; ?>" required>
                                    <label for="dni">Número de DNI sin puntos</label>
                                </div>

                            </div>
                            <div class="col-lg-4">
                                <!-- <h6 class="fs-15 mb-3">Apellido</h6> -->

                                <div class="form-floating mb-3">
                                    <input type="text" class="form-control" id="apellido" name="apellido" placeholder="Apellido" value="<?php echo $profesor_selec["apellido"]; ?>" required>
                                    <label for="apellido">Apellido completo</label>
                                </div>
                            </div>

                            <div class="col-lg-5">
                                <!-- <h6 class="fs-15 mb-3">Nombre</h6> -->
                                <div class="form-floating mb-3">
                                    <input type="text" class="form-control" id="nombre" name="nombre" placeholder="Nombre" value="<?php echo $profesor_selec["nombre"]; ?>" required>
                                    <label for="nombre">Nombre completo</label>
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-lg-6">
                                <!-- <h6 class="fs-15 mb-3">Email</h6>  -->
                                <div class="form-floating mb-3">
                                    <input type="email" class="form-control" id="email" name="email" placeholder="nombre@ejemplo.com" value="<?php echo $profesor_selec["email"]; ?>" required>
                                    <label for="email">Email</label>
                                </div>
                            </div>

                            <div class="col-lg-6">
                                <!-- <h6 class="fs-15 mb-3">Teléfono</h6> -->
                                <div class="form-floating mb-3">
                                    <input type="tel" class="form-control" id="telefono" name="telefono" placeholder="Telefono" value="<?php echo $profesor_selec["telefono"]; ?>">
                                    <label for="telefono">Teléfono sin 0 ni 15</label>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="card">

                    <div class="card-header">
                        <h5 class="card-title mb-0">Acceso al Sistema</h5>
                    </div><!-- end card header -->

                    <div class="card-body">
                        <div class="row">

                            <div class="card-body">
                                <div class="row">                                 

                                    <div class="col-lg-12">
                                        <h6 class="fs-15 mb-3">Usuario y Contraseña</h6>
                                        <div class="row g-2">
                                            <div class="col-md">
                                                <div class="form-floating mb-3">
                                                    <input type="text" class="form-control" id="usuario" name="usuario" disabled="" placeholder="usuario" value="<?php echo $profesor_selec["email"]; ?>" required>
                                                    <label for="usuario">Usuario: correo electrónico</label>
                                                </div>
                                            </div>
                                            <div class="col-md">
                                                <div class="form-floating mb-3">
                                                    <input type="password" class="form-control" id="contrasena" name="contrasena" placeholder="Contraseña" value="Sin cambios" required>
                                                    <label for="contrasena">Contraseña</label>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="card">

                    <div class="card-header">
                        <h5 class="card-title mb-0">Contratación</h5>
                    </div><!-- end card header -->

                    <div class="card-body">
                        <div class="row">

                            <div class="card-body">
                                <div class="row">
                                    <div class="col-lg-6">
                                        <h6 class="fs-15 mb-3">Fecha de Contratación</h6>
                                        <div class="form-floating mb-3">
                                        <?php   
                                        $fechaOriginal = $profesor_selec["fechaContratacion"]; // Fecha en formato Y-m-d
                                        $fechaConvertida = DateTime::createFromFormat('Y-m-d', $fechaOriginal)->format('d-m-Y');
                                        ?>
                                        <input type="text" class="form-control AR-datepicker" id="fechaContratacion" name="fechaContratacion" placeholder="Fecha de Contratacion" value= "<?php echo $fechaConvertida; ?>">
                                        <label for="fechaContratacion">Fecha</label>    
                                        </div>
                                    </div>  
                                    <div class="col-lg-6">
                                        <h6 class="fs-15 mb-3">Estado</h6>
                                        <div class="form-floating mb-3">
                                            <select class="form-select" id="estado" name="estado" aria-label="estado" required>
                                                <?php 
                                                if ($value["estadoEntrenador"]){
                                                ?>
                                                    <option >Activo</option>
                                                    <option selected>Inactivo</option>
                                                    
                                                <?php 
                                                }else{
                                                ?>
                                                    <option selected>Activo</option>
                                                    <option >Inactivo</option>                                                    
                                                <?php 
                                                }
                                                ?>
                                                                                                    
                                            </select>
                                            <label for="estado">Elegir estado</label>
                                        </div>
                                    </div>                         
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="card">
                    <div class="card-header">
                        <h5 class="card-title mb-0">Especialidades</h5>
                    </div><!-- end card header -->
                    <div class="card-body">
                        <div class="row">
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-lg-12">
                                        <h6 class="fs-15 mb-3">Seleccione las especialidades</h6>
                                        <!-- Tabla de especialidades multi select  -->
                                        <table id="tablaSelectMultiES" class="table table-striped dt-responsive nowrap w-100 tablaSelectMultiES">
                                            <thead>
                                                <tr>
                                                    <th>ID</th>
                                                    <th>Especialidad</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php
                                                $especialidadesProfesor = ControladorProfesores::ctrObtenerEspecialidadesProfesor($rutas[1]);
                                                $especialidadesAsignadas = array_column($especialidadesProfesor, "id_Especialidad");
                                                // print_r($especialidadesAsignadas);
                                                $especialidades = controladorEspecialidades::crtMostrarEspecialidades(NULL, NULL);
                                                foreach ($especialidades as $key => $value) {
                                                    echo "<tr>
                                                            <td>{$value['Id_Especialidad']}</td>
                                                            <td>{$value['especialidad']}</td>
                                                          </tr>";
                                                }
                                                
                                                ?>
                                            </tbody>
                                        </table>
                                    </div>                                    
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- campo oculto para las especialidades seleccionadas -->
                <input type="hidden" id="especialidadesSeleccionadas" name="especialidadesSeleccionadas">
                <!-- campo oculto para el id -->
                <input type="hidden" name="id_Profesor" value="<?php echo $profesor_selec["id_Profesor"]; ?>">



                <?php
                $guardar = new ControladorProfesores();
                $guardar->ctrEditarProfesor();
                ?>
                <div class="row">
                    <div class="col-lg-6">
                        <div class="px-2 py-2 d-flex align-items-sm-center flex-sm-row flex-column">
                            <div class="d-flex flex-wrap gap-2">
                                <button type="button" class="btn btn-outline-dark btnVolver" pag="profesores"><i class="fa-solid fa-caret-left"></i> &nbsp; Cancelar</button>
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
    <h3>Profesor no disponible</h3>

<?php } ?>

<script>
    // Pasar el array PHP como un objeto JavaScript para que seleccione las especialidades
    const especialidadesSeleccionadas = <?php echo json_encode($especialidadesAsignadas); ?>;
</script>