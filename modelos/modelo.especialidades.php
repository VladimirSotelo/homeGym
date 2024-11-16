<?php
require_once 'conexion.php';
class ModeloEspecialidades{
    static public function mdlMostrarEspecialidad(){
        try {
            $especialidad = conexion::conectar()->prepare("SELECT * FROM especialidades as e, profesores as p, especialidades_profesores as ep WHERE ep.id_Profesor = p.id_Profesor and ep.id_Especialidad = e.id_Especialidad;");
            $especialidad->execute();

            return $especialidad->fetchAll(PDO::FETCH_ASSOC);
        } catch (Exception $e) {
            return "Error: " . $e->getMessage();
        }
        
    }
}