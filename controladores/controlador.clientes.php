<?php

class controladorCliente{
    static public function crtMostrarCliente($clientes,$valor){
        $respuesta = ModeloClientes::mdlMostrarClientes($clientes, $valor);
        return $respuesta;
    }


    public function ctrAgregarCliente()
    {
        if (isset($_POST["nombre"])) {

          
            $datos = array(
                "dni" => htmlspecialchars($_POST["dni"]),
                "apellido" => htmlspecialchars($_POST["apellido"]),
                "nombre" => htmlspecialchars($_POST["nombre"]),
                "fechaNacimiento" => htmlspecialchars($_POST["fechaNacimiento"]),
                "direccion" => htmlspecialchars($_POST["direccion"]),
                "telefono" => htmlspecialchars($_POST["telefono"]),
                
                "email" => htmlspecialchars($_POST["email"]),
                "usuario" => htmlspecialchars($_POST["usuario"]),
                "fechaInscripcion" => htmlspecialchars($_POST["fechaInscripcion"])
                

            );

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

    public function ctrEditarCliente()
    {
        if (isset($_POST["id_Cliente"])) {
            $datos = array(
                "dni" => htmlspecialchars($_POST["dni"]),
                "apellido" => htmlspecialchars($_POST["apellido"]),
                "nombre" => htmlspecialchars($_POST["nombre"]),
                "fechaNacimiento" => htmlspecialchars($_POST["fechaNacimiento"]),
                "direccion" => htmlspecialchars($_POST["direccion"]),
                "telefono" => htmlspecialchars($_POST["telefono"]),

                "email" => htmlspecialchars($_POST["email"]),
                "usuario" => htmlspecialchars($_POST["usuario"]),
                "fechaInscripcion" => htmlspecialchars($_POST["fechaInscripcion"]),
                
            );

            $url = ControladorPlantilla::url() . "clientes";
            $respuesta = ModeloClientes::mdlEditarClientes($datos);

            if ($respuesta == "ok") {
                echo '<script>
                    fncSweetAlert(
                    "success",
                    "El agente ' . htmlspecialchars($_POST["apellido"]) . ', ' . htmlspecialchars($_POST["nombre"]) . ' se actualizó correctamente",
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