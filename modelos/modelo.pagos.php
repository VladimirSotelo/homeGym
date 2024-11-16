<?php
require_once 'conexion.php';

class ModeloPago{

    static public function mdlMostrarPagos() {
        
        try{
            $pagos=conexion::conectar()->prepare("SELECT * FROM pagos as p, clientes as c, usuarios as u where c.id_Usuario = u.id_Usuario");
            $pagos->execute();

            return $pagos->fetchAll(PDO::FETCH_ASSOC);
        } catch (Exception $e) {
            return "Error: " . $e->getMessage();
        }
        
    }
}