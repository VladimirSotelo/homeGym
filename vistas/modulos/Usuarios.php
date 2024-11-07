<div class="container-xxl">
    <div class="py-3 d-flex align-items-sm-center flex-sm-row flex-column">
        <div class="flex-grow-1">
            <h4 class="fs-22 fw-bold m-0">Profesores</h4>
        </div>
    </div>
    <div class="py-2 d-flex align-items-sm-center flex-sm-row flex-column">
        <div class="d-flex flex-wrap gap-2">    
            <a href="nuevo_profesores" class="btn btn-primary"><i class="fas fa-plus" ></i > &nbsp; Nuevo Profesor</a>
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
                                <th>Telefono</th>
                                <th>Email</th>
                                <th>Plan</th>
                                <th>Acciones</th>
                                
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                                $profesore = ControladorProfesores::crtMostrarProfesores();
                                //print_r($profesore);
                                foreach ($profesore as $key => $value){                       
                            ?>
                            <tr >
                                <td> <?php echo $value["nombreP"] ?></td>    
                                <td> <?php echo $value["apellidop"] ?></td>
                                <td> <?php echo $value["telefonoP"] ?></td>
                                <td> <?php echo Funciones::cambiaFormatoFecha($value["fechacontratacionP"]) ?></td>
                                <td> <?php echo $value["nombreEspecialida"] ?></td>
                                <td><a href="editar_profesor" class="btn btn-warning btn-sm"><i class="fas fa-edit"></i></a> <a href="eliminar_profesor" class="btn btn-danger btn-sm"><i class="fas fa-trash"></i></a></td>
                            </tr>

                            <?php } ?>
                            
                        </tbody>
                    </table>
                    
                </div>

            </div>
        </div>
    </div>
    
</div>