<?php
//MOSTRAR DATOS*/

class ControladorProfesores{
    
    static public function crtMostrarProfesor(){
        $respuesta= ModeloProfesores::mdlMostrarProfesores();
        return $respuesta;
    }



}
