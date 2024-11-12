<?php
//MOSTRAR DATOS*/

class ControladorPagos
{

    static public function crtMostrarPagos()
    {
        $respuesta = ModeloPago::mdlMostrasPagos();
        return $respuesta;
    }
}
