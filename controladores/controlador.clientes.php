<?php

class controladorCliente{
    static public function crtMostrarCliente(){
        $respuesta = ModeloClientes::mdlMostrarClientes();
        return $respuesta;
    }
}