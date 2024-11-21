<?php
require_once 'conexion.php';
class ModeloPlanes
{
    static public function mdlMostrarPlanes($plan, $valor)
    {

        if ($plan != null) {

            try {
                $stmt = Conexion::conectar()->prepare("SELECT *  FROM plan_entrenamiento as pe  where $plan = :$plan;");

                $stmt->bindParam(":" . $plan, $valor, PDO::PARAM_INT);
                $stmt->execute();
                return $stmt->fetch(PDO::FETCH_ASSOC);
            } catch (Exception $e) {
                return "Error: " . $e->getMessage();
            }
        } else {
            try {
                $agentes = Conexion::conectar()->prepare("SELECT * FROM plan_entrenamiento as pe");
                $agentes->execute();
                return $agentes->fetchAll(PDO::FETCH_ASSOC);
            } catch (Exception $e) {
                return "Error: " . $e->getMessage();
            }
        }
    }
    
    //SELECT pe.*, p.*, CONCAT(u.apellido,' ',u.nombre) as profesor FROM plan_entrenamiento as pe, profesores as p INNER JOIN usuarios as u on u.id_Usuario = p.id_Usuario
    
   

    static public function mdlAgregarPlan($datos)
    {
        try {


            $stmt = Conexion::conectar()->prepare("INSERT INTO plan_entrenamiento (nombrePlan,descripcion,duracion,cantSesionesSemanales,id_Profesor ) VALUES (:nombrePlan,:descripcion,:duracion,:cantSesionesSemanales,:id_Profesor)");

            
            $stmt->bindParam(":nombrePlan", $datos["nombrePlan"], PDO::PARAM_STR);
            $stmt->bindParam(":descripcion", $datos["descripcion"], PDO::PARAM_STR);
            $stmt->bindParam(":duracion", $datos["duracion"], PDO::PARAM_INT);
            $stmt->bindParam(":cantSesionesSemanales", $datos["cantSesionesSemanales"], PDO::PARAM_INT);
            $stmt->bindParam(":id_Profesor", $datos["id_Profesor"], PDO::PARAM_INT);

            if ($stmt->execute()) {
                return "ok";
            } else {
                return "error";
            }
        } catch (PDOException $e) {
            return "Error: " . $e->getMessage();
        }
    }

    static public function mdlEditarPlan($datos)
    {
        try {
            $stmt = Conexion::conectar()->prepare("UPDATE plan_entrenamiento SET 
            nombrePlan = :nombrePlan, descripcion = :descripcion, duracion = :duracion, cantSesionesSemanales = :cantSesionesSemanales, 
            id_Profesor = :id_Profesor
            WHERE id_PlanEntrenamiento = :id_PlanEntrenamiento");

            $stmt->bindParam(":id_PlanEntrenamiento", $datos["id_PlanEntrenamiento"], PDO::PARAM_INT);
            $stmt->bindParam(":nombrePlan", $datos["nombrePlan"], PDO::PARAM_STR);
            $stmt->bindParam(":descripcion", $datos["descripcion"], PDO::PARAM_STR);
            $stmt->bindParam(":duracion", $datos["duracion"], PDO::PARAM_INT);
            $stmt->bindParam(":cantSesionesSemanales", $datos["cantSesionesSemanales"], PDO::PARAM_INT); 
            $stmt->bindParam(":id_Profesor", $datos["id_Profesor"], PDO::PARAM_INT);

            if ($stmt->execute()) {
                return "ok";
            } else {
                return print_r(Conexion::conectar()->errorInfo());
            }
        } catch (Exception $e) {
            return "Error: " . $e->getMessage();
        }
    }
}
