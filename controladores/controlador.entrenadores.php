<?php
//MOSTRAR DATOS*/

class ControladorEntrenador{
    
    static public function crtMostrarEntrenador(){
        $respuesta= ModeloEntrenadores::mdlMostrarEntrenadores();
        return $respuesta;
    }



}
