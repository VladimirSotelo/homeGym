<?php

class controladorPlanes
{
    static public function crtMostrarPlanes($plan,$valor)
    {
        $respuesta = ModeloPlanes::mdlMostrarPlanes($plan,$valor);
        return $respuesta;
    }

    public function ctrAgregarPlan()
    {
        if (isset($_POST["nombrePlan"])) {

            
            $datos = array(
                
                "nombrePlan" => htmlspecialchars($_POST["nombrePlan"]),
                //"id_PlanEntrenamiento"=> htmlspecialchars($_POST["id_PlanEntrenamiento"]),
                "descripcion" => htmlspecialchars($_POST["descripcion"]),
                "duracion" => intval($_POST["duracion"]),
                "cantSesionesSemanales" => intval($_POST["cantSesionesSemanales"]),
                "id_Profesor" => intval($_POST["id_Profesor"])
                

            );

            $url = ControladorPlantilla::url() . "planes";
            $respuesta = ModeloPlanes::mdlAgregarPlan($datos);

            if ($respuesta == "ok") {
                echo '<script>
                    fncSweetAlert(
                    "success",
                    "El plan ' . htmlspecialchars($_POST["nombrePlan"])  . ' se agregó correctamente",
                    "' . $url . '"
                    );
                    </script>';
            } else {
                echo "<script>
                Swal.fire({
                    title: 'Error',
                    text: 'No se pudieron agregar los datos del Plan.',
                    icon: 'error'
                });
                </script>";
            }
        } else { /*print_r("not post");*/
        }
    }

    public function ctrEditarPlan()
    {
        if (isset($_POST["id_PlanEntrenamiento"])) {
            $datos = array(

                "id_PlanEntrenamiento" => intval($_POST["id_PlanEntrenamiento"]),
                "nombrePlan" => htmlspecialchars($_POST["nombrePlan"]),
                "descripcion" => htmlspecialchars($_POST["descripcion"]),
                "duracion" => intval($_POST["duracion"]),
                "cantSesionesSemanales" => intval($_POST["cantSesionesSemanales"]),
                "id_Profesor" => intval($_POST["id_Profesor"]),
            );

            $url = ControladorPlantilla::url() . "planes";
            $respuesta = ModeloPlanes::mdlEditarPlan($datos);

            if ($respuesta == "ok") {
                echo '<script>
                    fncSweetAlert(
                    "success",
                    "El Plan ' . htmlspecialchars($_POST["nombrePlan"]) .  ' se actualizó correctamente",
                    "' . $url . '"
                    );
                    </script>';
            } else {
                echo "<script>
                Swal.fire({
                    title: 'Error',
                    text: 'No se pudieron actualizar los datos del Plan.',
                    icon: 'error'
                });
                </script>";
            }
        }
    }
}
