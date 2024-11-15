<?php
//MOSTRAR DATOS*/

class ControladorUsuarios{
    
    static public function crtMostrarUsuarios(){
        $respuesta= ModeloUsuarios::mdlMostrarUsuarios();
        return $respuesta;
    }

    static public function ctrIngresoUsuario()
    {
        if (isset($_POST["email"])) {

            if (preg_match('/^[^0-9][a-zA-Z0-9_]+([.][a-zA-Z0-9_]+)*[@][a-zA-Z0-9_]+([.][azA-Z0-9_]+)*[.][a-zAZ]{2,4}$/', $_POST["email"])) {

                $encriptar = crypt(trim($_POST["contrasena"]), '$2a$07$tawfdgyaufiusdgopfhgjxerctyuniexrcvrdtfyg$');
                print_r($encriptar);
                // return;
                $item = "email";

                $valor = $_POST["email"];
                $respuesta = ModeloUsuarios::mdlBuscarUsuario($item, $valor);
                foreach ($respuesta as $key => $value) {
                    if (is_array($value) && ($value["email"] ==
                        $_POST["email"] && $value["contrasena"] == $encriptar)) {

                        echo '<script>
                            fncSweetAlert("loading", "Ingresando..", "")
                            </script>';

                        $_SESSION["iniciarSesion"] = "ok";
                        $_SESSION["id_Usuario"] = $value["id_Usuario"];
                        $_SESSION["usuario"] = $value["usuario"];

                        echo '<script>
                        window.location = "inicio";
                        </script>';
                    } else {
                        echo "<script>
                            Swal.fire({
                                title: 'Error',
                                text: 'Error de credenciales. Intente nuevamente',
                                icon: 'error'
                            });
                            </script>";
                    }
                }
            }
        }
    }

}
