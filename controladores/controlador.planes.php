<?php

class controladorPlanes
{
    static public function crtMostrarPlanes($plan,$valor)
    {
        $respuesta = ModeloPlanes::mdlMostrarPlanes($plan,$valor);
        return $respuesta;
    }

    public function ctrAgregarCliente()
    {
        if (isset($_POST["nombrePlan"])) {

            /*if (isset($_POST["descripcion"])) {
                $id = "";
            } else {
                if (isset($_POST["duracion"])) {
                    $id = "";
                } else {
                    if (htmlspecialchars($_POST["email"]) == "") {
                        $id = "";
                    }
                }
            }*/
            $datos = array(
                "nombrePlan" => htmlspecialchars($_POST["nombrePlan"]),
                "descripcion" => htmlspecialchars($_POST["descripcion"]),
                "duracion" => htmlspecialchars($_POST["duracion"]),
                "cantSesionesSemanales" => htmlspecialchars($_POST["cantSesionesSemanales"]),
                "id_Profesor" => htmlspecialchars($_POST["id_Profesor"]),
                


            );


            // print_r($datos);

            // return;

            //podemos volver a la página de datos

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
                "nombrePlan" => htmlspecialchars($_POST["nombrePlan"]),
                "descripcion" => htmlspecialchars($_POST["descripcion"]),
                "duracion" => htmlspecialchars($_POST["duracion"]),
                "cantSesionesSemanales" => htmlspecialchars($_POST["cantSesionesSemanales"]),
                "id_Profesor" => htmlspecialchars($_POST["id_Profesor"]),
                "id_PlanEntrenamiento" =>htmlspecialchars($_POST["id_PlanEntrenamiento"])
            );

            $url = ControladorPlantilla::url() . "planes";
            $respuesta = ModeloPlanes::mdlEditarPlan($datos);

            if ($respuesta == "ok") {
                echo '<script>
                    fncSweetAlert(
                    "success",
                    "El PLan ' . htmlspecialchars($_POST["nombrePlan"]) .  ' se actualizó correctamente",
                    "' . $url . '"
                    );
                    </script>';
            } else {
                echo "<script>
                Swal.fire({
                    title: 'Error',
                    text: 'No se pudieron actualizar los datos del agente.',
                    icon: 'error'
                });
                </script>";
            }
        }
    }
}
