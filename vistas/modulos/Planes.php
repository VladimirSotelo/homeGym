<div class="container-xxl">
    <div class="py-3 d-flex align-items-sm-center flex-sm-row flex-column">
        <div class="flex-grow-1">
            <h4 class="fs-22 fw-bold m-0">Planes de Entrenamiento</h4>
        </div>
    </div>
    <div class="py-2 d-flex align-items-sm-center flex-sm-row flex-column">
        <div class="d-flex flex-wrap gap-2">
            <a href="nuevo_plan" class="btn btn-primary"><i class="fas fa-plus"></i> &nbsp; Nuevo Plan</a>
        </div>
    </div>

    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <table id="tablaES" class="table table-striped dt-responsive nowrap w-100">
                        <thead>
                            <tr>
                                <th>Planes</th>
                                <th>Codigo</th>
                                <th>Descripcion</th>
                                <th>Duracion en semanas</th>
                                <th>Sesiones por semana</th>
                                <th>Profesor</th>
                                <th>Acciones</th>

                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            
                            $plan = controladorPlanes::crtMostrarPlanes(null,null);

                            foreach ($plan as $key => $value) {
                                
                                $profesor = ControladorProfesores::crtMostrarProfesor(null,null);
                                foreach ($profesor as $key => $profe) {?>
                                <tr>
                                    <td> <?php echo $value["nombrePlan"];?></td>
                                    <td><?php echo $value["id_PlanEntrenamiento"]; ?></td>
                                    <td><?php echo $value["descripcion"]; ?></td>
                                    <td> <?php echo $value["duracion"]; ?></td>
                                    <td> <?php echo $value["cantSesionesSemanales"]; ?></td>
                             
                                    
                                    <td> <?php echo $profe["apellido"] .' '. $profe["nombre"]; ?></td>
                                    
                                    <td><a href="editar_plan/<?php echo $value["id_PlanEntrenamiento"]; ?>" class="btn btn-warning btn-sm"><i class="fas fa-edit"></i></a>
                                    <a href="eliminar_plan" class="btn btn-danger btn-sm"><i class="fas fa-trash"></i></a></td>
                                </tr><?php }?>

                            <?php  } ?>

                        </tbody>
                    </table>

                </div>

            </div>
        </div>
    </div>

</div>