<?php
//MOSTRAR DATOS*/

class ControladorPagos
{

    static public function crtMostrarPagos()
    {
        $respuesta = ModeloPago::mdlMostrarPagos();
        return $respuesta;
    }
}
