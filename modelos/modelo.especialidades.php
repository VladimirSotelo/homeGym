<?php
require_once 'conexion.php';
class ModeloEspecialidades{
    static public function mdlMostrarEspecialidad($campo, $valor){
        if ($campo != null) {
            try {
                $especialidad = conexion::conectar()->prepare("SELECT * FROM especialidades WHERE $campo = :$campo");
                $especialidad->bindParam(":" . $campo, $valor, PDO::PARAM_INT);
                $especialidad->execute();
                
                return $especialidad->fetchAll(PDO::FETCH_ASSOC);
            } catch (Exception $e) {
                return "Error: " . $e->getMessage();
            }
        } else {
            try {
                $especialidad = conexion::conectar()->prepare("SELECT * FROM especialidades");
                $especialidad->execute();

                return $especialidad->fetchAll(PDO::FETCH_ASSOC);
            } catch (Exception $e) {
                return "Error: " . $e->getMessage();
            }
        }
        
    }
    
    // ==============================================================
    // Agregar Especialidad
    // ==============================================================
    static public function mdlAgregarEspecialidad($datos)
    {
        try {
            $stmt = Conexion::conectar()->prepare("INSERT INTO especialidades 
            (especialidad) VALUES (:especialidad)");

            $stmt->bindParam(":especialidad", $datos["apellido"], PDO::PARAM_STR);

            if ($stmt->execute()) {
                return "ok";
            } else {
                return "error";
            }
        } catch (PDOException $e) {
            return "Error: " . $e->getMessage();
        }
    }

    // ==============================================================
    // Editar Especialidad
    // ==============================================================
    static public function mdlEditarEspecialidad($datos)
    {
        try {

            $stmt = Conexion::conectar()->prepare("UPDATE especialidades SET 
            especialidad = :especialidad
            WHERE Id_Especialidad = :Id_Especialidad");

            $stmt->bindParam(":especialidad", $datos["apellido"], PDO::PARAM_STR);
                            

            if ($stmt->execute()) {
                return "ok";
            } else {
                return print_r(Conexion::conectar()->errorInfo());
            }
        } catch (Exception $e) {
            return "Error: " . $e->getMessage();
        }
    }  

    // ==============================================================
    // Eliminar Especialidad
    // ==============================================================
    static public function mdlEliminarEspecialidad($tabla, $dato)
    {
        try {
            $stmt = Conexion::conectar()->prepare("DELETE FROM $tabla WHERE Id_Especialidad = :Id_Especialidad");
            
            $stmt->bindParam(":Id_Especialidad", $dato, PDO::PARAM_INT);
            
            if ($stmt->execute()) {
                return "ok";
            } else {
                return "error";
            }
        } catch (Exception $e) {
            return "Error: " . $e->getMessage();
        }
    }      

}



//