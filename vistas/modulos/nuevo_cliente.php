<?php
$cliente = ControladorUsuarios::crtMostrarUsuarios();

?>

<form method="POST">

    <div class="py-3 d-flex align-item-sm-center flex-sm-ron flex-columm">
        <h5 class="flex-grow-1">Nuevo Cliente</h5>
    </div>
    <div class="row">
        <div class="col-12">
            <div class="card">

                <div class="card-header">
                    <h5 class="card-title mb-0">Datos del Cliente</h5>
                </div><!-- end card header -->

                <div class="card-body">
                    <div class="row">
                        <div class="col-lg-4">
                            <div class="row g-2">
                                <form>
                                    <div class="col-md">
                                        <label for="" class="form-label">Nombre</label>
                                        <input type="text" id="" class="form-control" value="<?php $_POST["nombre"] ?? '' ?>" required>
                                    </div>
                                    <div class="col-md">
                                        <label for="" class="form-label">Apellido</label>
                                        <input type="text" id="" class="form-control" value="<?php $_POST["apellido"] ?? '' ?>" required>
                                    </div>

                                    <div class="md-3">
                                        <label for="example-date" class="form-label">Fecha de Nacimiento</label>
                                        <input type="date" id="example-date" class="form-control" name="date" value="<?php $_POST["fechaNacimiento"] ?? '' ?>" required>
                                    </div>
                                    <div class="col-md">
                                        <label for="example-email" class="form-label">Email</label>
                                        <input type="email" id="example-email" name="example-email" class="form-control" placeholder="Email" value="<?php $_POST["email"] ?? '' ?>" required>
                                    </div>
                                    <div class="col-md">
                                        <label for="example-email" class="form-label">Telefono</label>
                                        <input type="text" id="example-email" name="example-email" class="form-control" placeholder="telefono" value="<?php $_POST["telefono"] ?? ''  ?>" required>
                                    </div>
                                </form>
                            </div>

                        </div>
                    </div>
                </div>
            </div>

            <div class="card">
                <div class="card-header">
                    <h5 class="card-title mb-0">Datos de Mempresia</h5>
                </div>

                <div class="card-body">
                    <div class="row">
                        <div class="col-lg-4">

                            <form>
                                <div class="mb-3">
                                    <label for="example-date" class="form-label">Fecha de Inscripcion</label>
                                    <input type="date" id="example-date" class="form-control" name="date" value="<?php $_POST["fechaInscripcion"] ?? '' ?>">
                                </div>
                                <div class="col-md" -->

                                    <label for="" class="form-label">Plan de Entrenamiento</label>
                                    <input type="text" id="" class="form-control" value="<?php $_POST["nombrePlan"] ?? '' ?>">

                                </div>
                            
                        
                        
                                <div class="mb-3">
                                    <select name="planes" id="planes" required>
                                        <option selected></option>
                                        <?php foreach ($cliente as $key => $value) { ?>

                                            <option value="<?php echo $value["id_PlanEntrenamiento"] ?>"><?php echo $value["nombrePlan"] ?></option>
                                        <?php } ?>
                                    </select>
                                    <label for="planes">Elija un plan</label>
                                </div>
                            </form>

                        </div>
                    </div>

                    <?php
                    $cliente = new controladorCliente();
                    $cliente->ctrAgregarCliente();
                    ?>
                    <div class="row">
                        <div class="col-lg-6">
                            <div class="px-2 py-2 d-flex align-items-sm-center flex-sm-row flex-column">
                                <div class="d-flex flex-wrap gap-2">
                                    <button type="button" class="btn btn-outline-dark btnVolver" pag="clientes"><i class="fa-solid fa-caret-left"></i> &nbsp; Cancelar</button>
                                    <button type="button" class="btn btn-primary btnGuardar"><i class="fa-solid fa-floppy-disk"></i> &nbsp; Guardar</button>
                                </div>
                            </div>
                        </div>
                    </div>

</form>