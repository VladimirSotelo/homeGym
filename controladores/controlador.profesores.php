<?php
//MOSTRAR DATOS*/

class ControladorProfesores{
    
    static public function crtMostrarProfesores(){
        $respuesta= ModeloProfesores::mdlMostrarProfesores();
        return $respuesta;
    }



}
