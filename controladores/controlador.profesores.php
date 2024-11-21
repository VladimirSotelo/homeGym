<?php


class ControladorProfesores{
    // ==============================================================
    // Mostrar Profesores
    // ==============================================================
    static public function crtMostrarProfesor($campo, $valor){
        $respuesta= ModeloProfesores::mdlMostrarProfesores($campo, $valor);
        return $respuesta;
    }

    // ==============================================================
    // Agregar Profesor
    // ==============================================================
    public function ctrAgregarProfesor()
    {
        if (isset($_POST["dni"])) {
            $fechaOriginal = $_POST['fechaContratacion']; // Fecha en formato dd-mm-aaaa
            $fechaConvertida = DateTime::createFromFormat('d-m-Y', $fechaOriginal)->format('Y-m-d');

            // Insertar en usuarios y profesores
            $datos = array(
                "dni" => htmlspecialchars($_POST["dni"]),
                "nombre" => htmlspecialchars($_POST["nombre"]),
                "apellido" => htmlspecialchars($_POST["apellido"]),
                "email" => htmlspecialchars($_POST["email"]),
                "telefono" => htmlspecialchars($_POST["telefono"]),
                "contrasena" => htmlspecialchars($_POST["contrasena"]),
                "fechaContratacion" => $fechaConvertida,
                "estado" => 1,
                "tipo" => "Profesor"            
            );
            

            //podemos volver a la página de datos

            $url = ControladorPlantilla::url() . "profesores";
            $respuesta = ModeloProfesores::mdlAgregarProfesor($datos);

            if ($respuesta == "ok") {
                // Obtener el último id_Profesor registrado
                $idProfesor = Conexion::conectar()->query("SELECT MAX(id_Profesor) AS id FROM profesores")->fetch(PDO::FETCH_ASSOC)['id'];
                // $idProfesor = Conexion::conectar()->lastInsertId();
                // print_r("ID profe: " . $idProfesor);

                // Insertar las especialidades seleccionadas
                $especialidades = explode(",", $_POST["especialidadesSeleccionadas"]);
                foreach ($especialidades as $idEspecialidad) {
                    print_r("Id Profe: ". $idProfesor);
                    print_r("Id esp: ". $idEspecialidad);
                }

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
