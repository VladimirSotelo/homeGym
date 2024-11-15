<?php

class controladorCliente{
    static public function crtMostrarCliente(){
        $respuesta = ModeloClientes::mdlMostrarClientes();
        return $respuesta;
    }


    public function ctrAgregarCliente()
    {
        if (isset($_POST["nombre"])) {

            if (isset($_POST["apellido"])) {
                $id = "";
            } else {
                if (isset($_POST["fechaNacimiento"])) {
                    $id = "";
                } else {
                    if (htmlspecialchars($_POST["email"]) == "") {
                        $id = "";
                    }
                }
            }
            $datos = array(
                "apellido" => htmlspecialchars($_POST["apellido"]),
                "nombre" => htmlspecialchars($_POST["nombre"]),
                "dni" => htmlspecialchars($_POST["fechaNacimiento"]),
                "telefono" => htmlspecialchars($_POST["email"]),
                "direccion" => htmlspecialchars($_POST["telefono"]),
                "email" => htmlspecialchars($_POST["fechaInscripcion"]),
                "usuario" => htmlspecialchars($_POST["nombrePlan"])

            );

            // print_r($datos);

            // return;

            //podemos volver a la página de datos

            $url = ControladorPlantilla::url() . "clientes";
            $respuesta = ModeloClientes::mdlAgregarCliente($datos);

            if ($respuesta == "ok") {
                echo '<script>
                    fncSweetAlert(
                    "success",
                    "El cliente ' . htmlspecialchars($_POST["apellido"]) . ', ' . htmlspecialchars($_POST["nombre"]) . ' se agregó correctamente",
                    "' . $url . '"
                    );
                    </script>';
            } else {
                echo "<script>
                Swal.fire({
                    title: 'Error',
                    text: 'No se pudieron agregar los datos del cliente.',
                    icon: 'error'
                });
                </script>";
            }
        } else { /*print_r("not post");*/
        }
    }
}