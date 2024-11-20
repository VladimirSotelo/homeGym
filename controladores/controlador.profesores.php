<?php


class ControladorProfesores{
    // ==============================================================
    // Mostrar Profesores
    // ==============================================================
    static public function crtMostrarProfesor(){
        $respuesta= ModeloProfesores::mdlMostrarProfesores();
        return $respuesta;
    }

    // ==============================================================
    // Agregar Profesor
    // ==============================================================
    public function ctrAgregarProfesor()
    {
        if (isset($_POST["dni"])) {
            // Insertar en usuarios y profesores
            $datos = array(
                "dni" => htmlspecialchars($_POST["dni"]),
                "nombre" => htmlspecialchars($_POST["nombre"]),
                "apellido" => htmlspecialchars($_POST["apellido"]),
                "email" => htmlspecialchars($_POST["email"]),
                "telefono" => htmlspecialchars($_POST["telefono"]),
                "contrasena" => htmlspecialchars($_POST["contrasena"]),
                "fechaContratacion" => $_POST["fechaContratacion"],
                "estado" => 1,
                "tipo" => "Profesor"            
            );


            $url = ControladorPlantilla::url() . "profesores";
            $respuesta = ModeloProfesores::mdlAgregarProfesor($datos);

            if ($respuesta == "ok") {
                // Obtener el último id_Profesor registrado
                $idProfesor = Conexion::conectar()->lastInsertId();

                // Insertar las especialidades seleccionadas
                $especialidades = explode(",", $_POST["especialidadesSeleccionadas"]);

                if (!empty($especialidades)) {
                    $respuestaEspecialidades = ModeloProfesores::mdlInsertarEspecialidadesProfesor("especialidades_profesores", $idProfesor, $especialidades);

                    if ($respuestaEspecialidades == "ok") {
                        echo '<script>
                            fncSweetAlert(
                            "success",
                            "El profesor ' . htmlspecialchars($_POST["apellido"]) . ', ' . htmlspecialchars($_POST["nombre"]) . ' y sus especialidades se agregaron correctamente",
                            "' . $url . '"
                            );
                            </script>';

                    } else {
                        echo "<script>
                            Swal.fire({
                                title: 'Error',
                                text: 'No se pudieron agregar las especialidades.',
                                icon: 'error'
                            });
                            </script>";
                        }
                }


                
                
            }
            else{
                echo "<script>
                Swal.fire({
                    title: 'Error',
                    text: 'No se pudieron agregar los datos del profesor.',
                    icon: 'error'
                });
                </script>";
            }
        } else{ /*print_r("not post");*/ }
    }

    // ==============================================================
    // Editar Profesor
    // ==============================================================
    public function ctrEditarProfesor()
    {
        if (isset($_POST["dni"])) {
          
            $datos = array(
                "dni" => htmlspecialchars($_POST["dni"]),
                "nombre" => htmlspecialchars($_POST["nombre"]),
                "apellido" => htmlspecialchars($_POST["apellido"]),
                "email" => htmlspecialchars($_POST["email"]),
                "telefono" => htmlspecialchars($_POST["telefono"]),
                "contrasena" => htmlspecialchars($_POST["contrasena"]),
                "fechaContratacion" => htmlspecialchars($_POST["fechaContratacion"]),
                "estado" => htmlspecialchars($_POST["estado"]),
                "id_Profesor" => htmlspecialchars($_POST["id_Profesor"])
            );
            
            // print_r($datos);

            // return;

            //podemos volver a la página de datos

            $url = ControladorPlantilla::url() . "profesores";
            $respuesta = ModeloProfesores::mdlEditarProfesor($datos);

            if ($respuesta == "ok") {
                echo '<script>
                    fncSweetAlert(
                    "success",
                    "El profesor ' . htmlspecialchars($_POST["apellido"]) . ', ' . htmlspecialchars($_POST["nombre"]) . ' se actualizó correctamente",
                    "' . $url . '"
                    );
                    </script>';
            }
            else{
                echo "<script>
                Swal.fire({
                    title: 'Error',
                    text: 'No se pudieron agregar los datos del profesor.',
                    icon: 'error'
                });
                </script>";
            }
        } else{ /*print_r("not post");*/ }
    }
}
