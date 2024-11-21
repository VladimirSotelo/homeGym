<?php

class controladorEspecialidades
{
    static public function crtMostrarEspecialidades($campo, $valor)
    {
        $respuesta = ModeloEspecialidades::mdlMostrarEspecialidad($campo, $valor);
        return $respuesta;
    }

    // ==============================================================
    // Agregar Especialidad
    // ==============================================================
    public function ctrAgregarEspecialidad()
    {
        if (isset($_POST["dni"])) {

            if(isset($_POST["dlInstituciones"])){
                $id = "";
            } else{
                if(isset($_POST["dlZonas"])){
                    $id = "";
                } else{
                    if (htmlspecialchars($_POST["id_Rol"]) == ""){
                        $id = "";
                    }
                }
            }
            $datos = array(
                "especialidad" => htmlspecialchars($_POST["especialidad"])
                
            );
            
            // print_r($datos);

            // return;

            //podemos volver a la página de datos

            $url = ControladorPlantilla::url() . "especialidades";
            $respuesta = ModeloEspecialidades::mdlAgregarEspecialidad($datos);

            if ($respuesta == "ok") {
                echo '<script>
                    fncSweetAlert(
                    "success",
                    "La especialidad ' . htmlspecialchars($_POST["especialidad"]) . ' se agregó correctamente",
                    "' . $url . '"
                    );
                    </script>';
            }
            else{
                echo "<script>
                Swal.fire({
                    title: 'Error',
                    text: 'No se pudieron agregar los datos de la especialidad.',
                    icon: 'error'
                });
                </script>";
            }
        } else{ /*print_r("not post");*/ }
    }

    // ==============================================================
    // Editar Especialidad
    // ==============================================================
    public function ctrEditarEspecialidad()
    {
        if (isset($_POST["id_Agente"])) {
            $datos = array(
                "especialidad" => htmlspecialchars($_POST["especialidad"])                
            );

            $url = ControladorPlantilla::url() . "especialidades";
            $respuesta = ModeloEspecialidades::mdlEditarEspecialidad($datos);
            
            if ($respuesta == "ok") {                
                echo '<script>
                    fncSweetAlert(
                    "success",
                    "La especialidad ' . htmlspecialchars($_POST["especialidad"]) . ' se actualizó correctamente",
                    "' . $url . '"
                    );
                    </script>';
            }
            else{
                echo "<script>
                Swal.fire({
                    title: 'Error',
                    text: 'No se pudieron actualizar los datos de la especialidad.',
                    icon: 'error'
                });
                </script>";
            }
        } 
    }

    // ==============================================================
    // Eliminar Especialidad
    // ==============================================================
    static public function ctrEliminarEspecialidad()
    {
     
        if (isset($_GET["id_Especialidad_eliminar"])) {

            $url = ControladorPlantilla::url() . "especialidades";
            $tabla = "especialidades";
            $dato = $_GET["id_Especialidad_eliminar"];

            $respuesta = ModeloEspecialidades::mdlEliminarEspecialidad($tabla, $dato);

            if ($respuesta == "ok") {
                echo '<script>
                fncSweetAlert("success", "La especialidad se eliminó correctamente", "' . $url . '");
                </script>';
                }
            }
    }
    
}
