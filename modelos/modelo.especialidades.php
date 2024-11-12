<?php
require_once 'conexion.php';
class ModeloEspecialidades{
    static public function mdlMostrarEspecialidad(){
        try {
            $especialidad = conexion::conectar()->prepare("SELECT e.*,CONCAT(en.apellidoEntrenador,',',en.nombreEntrenador)as entrenador,Pe.* FROM especialidades as e INNER JOIN entrenadores as en on en.id_especialidades= e.id_especialidades INNER JOIN planentrenamiento as Pe ON pe.id_entrenador= en.id_entrenador");
            $especialidad->execute();

            return $especialidad->fetchAll(PDO::FETCH_ASSOC);
        } catch (Exception $e) {
            return "Error: " . $e->getMessage();
        }
        
    }
}