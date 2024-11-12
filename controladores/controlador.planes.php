<?php

class controladorPlanes
{
    static public function crtMostrarPlanes()
    {
        $respuesta = ModeloPlanes::mdlMostrarPlanes();
        return $respuesta;
    }
}
