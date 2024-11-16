<?php
require_once 'conexion.php';
class ModeloEspecialidades{
    static public function mdlMostrarEspecialidad(){
        try {
            $especialidad = conexion::conectar()->prepare("SELECT GROUP_CONCAT(e.especialidad) as especialidad, p.* FROM especialidades as e INNER JOIN especialidades_entrenadores as Ep on Ep.id_Especialidad = e.Id_Especialidad INNER JOIN profesores as p on p.id_Profesor = Ep.id_Profesor Group by p.id_Profesor");
            $especialidad->execute();

            return $especialidad->fetchAll(PDO::FETCH_ASSOC);
        } catch (Exception $e) {
            return "Error: " . $e->getMessage();
        }
        
    }
}


//