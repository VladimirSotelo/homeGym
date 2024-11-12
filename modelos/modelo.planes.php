<?php
require_once 'conexion.php';
class ModeloPlanes
{
    static public function mdlMostrarPlanes()
    {
        try {
            $plan = conexion::conectar()->prepare("SELECT p.*,CONCAT(e.apellidoEntrenador,' ',e.nombreEntrenador) as entrenador FROM planentrenamiento as p INNER JOIN entrenadores as e on e.id_entrenador=p.id_entrenador");
            $plan->execute();

            return $plan->fetchAll(PDO::FETCH_ASSOC);
        } catch (Exception $e) {
            return "Error: " . $e->getMessage();
        }
    }
}
