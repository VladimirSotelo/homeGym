<?php
require_once 'conexion.php';
class ModeloEspecialidades{
    static public function mdlMostrarEspecialidad(){
        try {
<<<<<<< HEAD
            $especialidad = conexion::conectar()->prepare("SELECT GROUP_CONCAT(e.especialidad) as especialidad, p.* FROM especialidades as e INNER JOIN especialidades_entrenadores as Ep on Ep.id_Especialidad = e.Id_Especialidad INNER JOIN profesores as p on p.id_Profesor = Ep.id_Profesor Group by p.id_Profesor");
=======
            $especialidad = conexion::conectar()->prepare("SELECT * FROM especialidades as e, profesores as p, especialidades_profesores as ep WHERE ep.id_Profesor = p.id_Profesor and ep.id_Especialidad = e.id_Especialidad;");
>>>>>>> a360b2a45f390a963827d16e17436417aa6e7e97
            $especialidad->execute();

            return $especialidad->fetchAll(PDO::FETCH_ASSOC);
        } catch (Exception $e) {
            return "Error: " . $e->getMessage();
        }
        
    }
}


//