<?php
$cliente = "id_Cliente";
$valor = $rutas[1];

$cliente_selec = controladorCliente::crtMostrarCliente($cliente, $valor);

//print_r($valor);    
//

if ($cliente_selec) {
?>
    <div class="container-xxl">
        <form method="POST">

            <div class="py-3 d-flex align-item-sm-center flex-sm-ron flex-columm">
                <h5 class="flex-grow-1">Editar Cliente</h5>
            </div>
            <div class="row">
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
                                            <label for="nombre" class="form-label">Nombre</label>
                                            <input type="text" id="nombre" class="form-control" name="nombre" value="<?php echo $cliente_selec["nombre"]; ?>" required>
                                        </div>
                                        <div class="col-md">
                                            <label for="apellido" class="form-label">Apellido</label>
                                            <input type="text" id="apellido" class="form-control" name="apellido" value="<?php echo $cliente_selec["apellido"]; ?>" required>
                                        </div>
                                        <div class="col-md">
                                            <label for="dni" class="form-label">Dni</label>
                                            <input type="number" id="dni" class="form-control" name="dni" value="<?= $cliente_selec["dni"]  ?>" required>
                                        </div>
                                        <div class="md-3">
                                            <label for="fechaNacimiento" class="form-label">Fecha de Nacimiento</label>
                                            <input type="date" id="fechaNacimiento" class="form-control" name="fechaNacimiento" value="<?php echo $cliente_selec["fechaNacimiento"]  ?>" required>
                                        </div>
                                        <div class="md-3">
                                            <label for="direccion" class="form-label">Direccion</label>
                                            <input type="text" id="direccion" class="form-control" name="direccion" value="<?= $cliente_selec["direccion"]  ?>" required>
                                        </div>
                                        <div class="col-md">
                                            <label for="email" class="form-label">Email</label>
                                            <input type="email" id="email" name="email" class="form-control" placeholder="Email" value="<?php echo $cliente_selec["email"]  ?>" required>
                                        </div>
                                        <div class="col-md">
                                            <label for="telefono" class="form-label">Telefono</label>
                                            <input type="number" id="telefono" name="telefono" class="form-control" placeholder="telefono" value="<?php echo $cliente_selec["telefono"]  ?>" required>
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
                            <h5 class="card-title mb-0">Datos de Membresia</h5>
                        </div>

                        <div class="card-body">
                            <div class="row">
                                <div class="col-lg-12">
                                    <div class="mb-3">
                                        <label for="fechaInscripcion" class="form-label">Fecha de Inscripcion</label>
                                        <input type="date" id="fechaInscripcion" class="form-control" name="fechaInscripcion" value="<?php echo $cliente_selec["fechaInscripcion"]; ?>">
                                    </div>
                                    <div class="md-3">
                                        <label for="usuario" class="form-label">Usuario</label>

                                        <input type="text" list="usuario" id="<?php echo $cliente_selec["id_Usuario"] ?>" class="form-control" name="usuario" value="<?php echo $cliente_selec["usuario"] ?>" placeholder="nombre de ususario ">
                                    </div>
                                    <div class="mb-3">
                                        <label for="example-date" class="form-label">Estado de la Membresia</label>
                                        <select class="form-select" id="estado">
                                            <?php $estado = controladorCliente::crtMostrarCliente(NULL, NULL);
                                            foreach ($estado as $key => $value) { ?>

                                                <?php if ($value["id_EstadoMembresia"] == $cliente_selec["id_EstadoMembresia"]) { ?>
                                                    <option value="activo">activo</option>
                                                <?php } else { ?>
                                                    <option value="inactivo">inactivo</option>
                                                <?php } ?>

                                            <?php } ?>
                                            <option value="inactivo">inactivo</option>
                                        </select>

                                    </div>
                                    <div class="col-md" -->

                                        <label for="" class="form-label">Plan de Entrenamiento</label>
                                        <select class="form-select" id="planes" name="id_PlanEntrenamiento">
                                            <?php
                                            $planes = controladorPlanes::crtMostrarPlanes(null, null);
                                            foreach ($planes as $key => $nombre) { ?>
                                                <option value="<?php echo $nombre["id_Profesor"] ?>"><?php echo  $nombre["nombrePlan"]  ?></option>

                                            <?php } ?>
                                        </select>

                                        <?php

                                        ?>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <?php
                        $editar = new controladorCliente();
                        $editar->ctrEditarCliente();
                        ?>
                    </div>
                </div>
                <div class="col-12">
                    <div class="row">
                        <div class="col-lg-6">
                            <div class="px-2 py-2 d-flex align-items-sm-center flex-sm-row flex-column">
                                <div class="d-flex flex-wrap gap-2">
                                    <input type="hidden" name="id_Cliente" value="<?php echo $cliente_selec["id_Cliente"]; ?>"></input>
                                    <form action="clientes">

                                        <button type="button" class="btn btn-outline-dark btnVolver" pag="<?php echo $url; ?>clientes"><i class="fa-solid fa-caret-left"></i> &nbsp; Cancelar</button>
                                        <button type="button" class="btn btn-primary btnGuardar"><i class="fa-solid fa-floppy-disk"></i> &nbsp; Guardar</button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>



        </form>
    </div>
<?php } else { ?>
    <h3>Cliente no disponible</h3>

<?php } ?>