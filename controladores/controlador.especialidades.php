<?php

class controladorEspecialidades
{
    static public function crtMostrarEspecialidades()
    {
        $respuesta = ModeloEspecialidades::mdlMostrarEspecialidad();
        return $respuesta;
    }
}
