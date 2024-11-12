<?php
//MOSTRAR DATOS*/

class ControladorUsuarios{
    
    static public function crtMostrarUsuarios(){
        $respuesta= Modelousuarios::mdlMostrarUsuarios();
        return $respuesta;
    }



}
