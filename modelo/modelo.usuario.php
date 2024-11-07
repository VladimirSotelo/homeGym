<?php
//MOSTRAR DATOS*/
require_once 'conexion.php';
class ModeloUsuarios{

    static public function mdlMostrarUsuarios()
    {
        
        try {
            $usuarios = conexion::conectar()->prepare("SELECT ");
            $usuarios->execute();

            return $usuarios->fetchAll(PDO::FETCH_ASSOC);
        } catch (Exception $e) {
            return "Error: " . $e->getMessage();
        }
       
    }
}
