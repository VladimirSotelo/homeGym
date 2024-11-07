<div class="container-xxl">
    <div class="py-3 d-flex align-items-sm-center flex-sm-row flex-column">
        <div class="flex-grow-1">
            <h4 class="fs-22 fw-bold m-0">Profesores</h4>
        </div>
    </div>
    <div class="py-2 d-flex align-items-sm-center flex-sm-row flex-column">
        <div class="d-flex flex-wrap gap-2">    
            <a href="nuevo_agente" class="btn btn-primary"><i class="fas fa-plus" ></i > &nbsp; Nuevo Profesor</a>
        </div> 
    </div>
    
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <table id="tablaES" class="table table-striped dt-responsive nowrap w-100">
                        <thead>
                            <tr>
                                <th>Nombre</th>    
                                <th>Apellido</th>
                                <th>Telefon</th>
                                <th>Email</th>
                                <th>Fechacontratacion</th>
                                <th>Especialidades</th>
                                
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                                $profesor = ControladorProfesores::crtMostrarProfesores();
                                foreach ($profesor as $key => $value) {                         
                            ?>
                            <tr >
                                <td> <?php echo $value["nombre"] ?></td>    
                                <td> <?php echo $value["apellido"] ?></td>
                                <td> <?php echo $value["telefono"] ?></td>
                                <td> <?php echo $value["email"] ?></td>
                                <td> <?php echo $value["fechaContratacion"] ?></td>
                                <td> <?php echo $value["especialidades"] ?></td>
                                <td><a href="editar_agente" class="btn btn-warning btn-sm"><i class="fas fa-edit"></i></a> <a href="eliminar_agente" class="btn btn-danger btn-sm"><i class="fas fa-trash"></i></a></td>
                            </tr>

                            <?php } ?>
                            
                        </tbody>
                    </table>
                    
                </div>

            </div>
        </div>
    </div>
    
</div>