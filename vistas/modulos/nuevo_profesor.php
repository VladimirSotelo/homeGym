<?php
$especialidad = controladorEspecialidades::crtMostrarEspecialidades()
?>

<div class="container-xxl">

    <div class="py-3 d-flex align-items-sm-center flex-sm-row flex-column">
        <div class="flex-grow-1">
            <h4 class="fs-22 fw-bold m-0">Nuevo Profesor</h4>
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
                                    <input type="number" class="form-control" id="dni" name="dni" placeholder="DNI" value="<?= $_POST["dni"] ?? '' ?>" required>
                                    <label for="dni">Número de DNI sin puntos</label>
                                </div>

                            </div>
                            <div class="col-lg-4">
                                <!-- <h6 class="fs-15 mb-3">Apellido</h6> -->

                                <div class="form-floating mb-3">
                                    <input type="text" class="form-control" id="apellido" name="apellido" placeholder="Apellido" value="<?= $_POST["apellido"] ?? '' ?>" required>
                                    <label for="apellido">Apellido completo</label>
                                </div>
                            </div>

                            <div class="col-lg-5">
                                <!-- <h6 class="fs-15 mb-3">Nombre</h6> -->
                                <div class="form-floating mb-3">
                                    <input type="text" class="form-control" id="nombre" name="nombre" placeholder="Nombre" value="<?= $_POST["nombre"] ?? '' ?>" required>
                                    <label for="nombre">Nombre completo</label>
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-lg-6">
                                <!-- <h6 class="fs-15 mb-3">Email</h6>  -->
                                <div class="form-floating mb-3">
                                    <input type="email" class="form-control" id="email" name="email" placeholder="nombre@ejemplo.com" value="<?= $_POST["email"] ?? '' ?>" required>
                                    <label for="email">Email</label>
                                </div>
                            </div>

                            <div class="col-lg-6">
                                <!-- <h6 class="fs-15 mb-3">Teléfono</h6> -->
                                <div class="form-floating mb-3">
                                    <input type="tel" class="form-control" id="telefono" name="telefono" placeholder="Telefono" value="<?= $_POST["telefono"] ?? '' ?>">
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
                                                    <input type="text" class="form-control" id="usuario" name="usuario" disabled="" placeholder="DNI" value="<?= $_POST["email"] ?? '' ?>" required>
                                                    <label for="usuario">Usuario: correo electrónico</label>
                                                </div>
                                            </div>
                                            <div class="col-md">
                                                <div class="form-floating mb-3">
                                                    <input type="password" class="form-control" id="contrasena" name="contrasena" placeholder="Contraseña" value="<?= $_POST["contraseña"] ?? '' ?>" required>
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
                                        <input type="text" class="form-control AR-datepicker" id="fechaContratacion" name="fechaContratacion" placeholder="Fecha de Contratacion">
                                        <label for="fechaContratacion">Fecha</label>    
                                        </div>
                                    </div>  
                                    <div class="col-lg-6">
                                        <h6 class="fs-15 mb-3">Estado</h6>
                                        <div class="form-floating mb-3">
                                            <select class="form-select" id="estado" name="estado" aria-label="estado" required>
                                                <option selected>Activo</option>
                                                <option >Inactivo</option>                                                    
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
                                        <table id="tablaSelectMultiES" class="table table-striped dt-responsive nowrap w-100">
                                            <thead>
                                                <tr>
                                                    <th>ID</th>
                                                    <th>Especialidad</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php
                                                $especialidades = controladorEspecialidades::crtMostrarEspecialidades();
                                                foreach ($especialidades as $key => $value) {
                                                ?>
                                                    <tr>
                                                        <td><?php echo $value["Id_Especialidad"]; ?></td>    
                                                        <td> <?php echo $value["especialidad"] ?></td>                                                        
                                                    </tr>

                                                <?php } ?>

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

                <?php
                $guardar = new ControladorProfesores();
                $guardar->ctrAgregarProfesor();
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
