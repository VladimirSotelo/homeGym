<?php
require_once 'conexion.php';

class ModeloClientes{

    static public function mdlMostrarClientes(){
        try {
            $clientes = conexion::conectar()->prepare("SELECT * FROM clientes as c 
            INNER JOIN plan_entrenamiento as pe on pe.id_PlanEntrenamiento=c.id_PlanEntrenamiento
            INNER JOIN usuarios as u on u.id_Usuario= c.id_Usuario ");
            $clientes->execute();

            return $clientes->fetchAll(PDO::FETCH_ASSOC);
        } catch (Exception $e) {
            return "Error: " . $e->getMessage();
        }
    }

    static public function mdlAgregarCliente($datos)
    {
        try {
            // SELECT * FROM `agentes`, `roles`  WHERE agentes.id_Rol = roles.id_Rol;
            $stmt = Conexion::conectar()->prepare("INSERT INTO clientes (dni,nombre, apellio,fechaNacimiento , direccion,telefono , email, usuario, fechaInscripcion, ) VALUES (:dni,:nombre, :apellio,:fechaNacimiento , :direccion,:telefono , :email, :usuario, :fechaInscripcion,)");
            
            $stmt->bindParam(":dni", $datos["dni"], PDO::PARAM_INT);
            $stmt->bindParam(":nombre", $datos["nombre"], PDO::PARAM_STR);
            $stmt->bindParam(":apellido", $datos["apellido"], PDO::PARAM_STR);
           
            $stmt->bindParam(":fechaNacimiento", $datos["fechaNacimiento"], PDO::PARAM_INT);
            
            $stmt->bindParam(":direccion", $datos["direccion"], PDO::PARAM_STR);
            $stmt->bindParam(":telefono", $datos["telefono"], PDO::PARAM_STR);
            $stmt->bindParam(":email", $datos["email"], PDO::PARAM_STR);
            $stmt->bindParam(":usuario", $datos["usuario"], PDO::PARAM_STR);
            $stmt->bindParam(":fechaInscripcion",$datos["fechaInscripcin"], PDO::PARAM_STR);

            if ($stmt->execute()) {
                return "ok";
            } else {
                return "error";
            }
        } catch (PDOException $e) {
            return "Error: " . $e->getMessage();
        }
    }
}