<?php
require_once 'conexion.php';
class ModeloEspecialidades{
    static public function mdlMostrarEspecialidad(){
        try {
            $especialidad = conexion::conectar()->prepare("SELECT * FROM especialidades");
            $especialidad->execute();

            return $especialidad->fetchAll(PDO::FETCH_ASSOC);
        } catch (Exception $e) {
            return "Error: " . $e->getMessage();
        }
        
    }
}


//