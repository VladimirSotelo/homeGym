<?php
//MOSTRAR DATOS*/

class ControladorPagos
{

    static public function crtMostrarPagos($pago,$valor)
    {
        $respuesta = ModeloPago::mdlMostrarPagos($pago,$valor);
        return $respuesta;
    }

    public function ctrAgregarPago()
    {
        if (isset($_POST["id_Cliente"])) {


            $datos = array(

                "id_Cliente" => intval($_POST["id_Cliente"]),
                "montoPago"=> intval($_POST["montoPago"]),
                "metodoPago" => htmlspecialchars($_POST["metodoPago"]),
                "estadoPago" => intval($_POST["estadoPago"]),
                "fechaPago" => htmlspecialchars($_POST["fechaPago"])
                


            );

            $url = ControladorPlantilla::url() . "pagos";
            $respuesta = ModeloPago::mdlAgregarPago($datos);

            if ($respuesta == "ok") {
                echo '<script>
                    fncSweetAlert(
                    "success",
                    "El pago de' . htmlspecialchars($_POST["montoPago"])  . ' se agregó correctamente",
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

    public function ctrEditarPago()
    {
        if (isset($_POST["id_Pago"])) {
            $datos = array(

                "id_Pago"=>intval($_POST["id_Pago"]),
                "id_Cliente" => intval($_POST["id_Cliente"]),
                "montoPago" => intval($_POST["montoPago"]),
                "metodoPago" => htmlspecialchars($_POST["metodoPago"]),
                "estadoPago" => intval($_POST["estadoPago"]),
                "fechaPago" => htmlspecialchars($_POST["fechaPago"])
            );

            $url = ControladorPlantilla::url() . "pagos";
            $respuesta = ModeloPlanes::mdlEditarPlan($datos);

            if ($respuesta == "ok") {
                echo '<script>
                    fncSweetAlert(
                    "success",
                    "El Plan de' . htmlspecialchars($_POST["montoPago"]) .  ' se actualizó correctamente",
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
