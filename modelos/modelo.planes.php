<?php
require_once 'conexion.php';
class ModeloPlanes
{
    static public function mdlMostrarPlanes()
    {
        try {
            $plan = conexion::conectar()->prepare("SELECT * FROM plan_entrenamiento as pe, profesores as p, usuarios as u where p.id_Profesor = pe.id_Profesor and p.id_Usuario = u.id_Usuario");
            $plan->execute();

            return $plan->fetchAll(PDO::FETCH_ASSOC);
        } catch (Exception $e) {
            return "Error: " . $e->getMessage();
        }
    }
}
