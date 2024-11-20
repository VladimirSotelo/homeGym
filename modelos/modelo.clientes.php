<?php
require_once 'conexion.php';

class ModeloClientes
{

    static public function mdlMostrarClientes($clientes, $valor)
    {

        if ($clientes != null) {

            try {
                $stmt = Conexion::conectar()->prepare("SELECT * FROM plan_entrenamiento as pe, clientes as c INNER JOIN usuarios as u on u.id_Usuario=c.id_Usuario and $clientes = :$clientes;");
           
                $stmt->bindParam(":" . $clientes, $valor, PDO::PARAM_INT);
                $stmt->execute();
                return $stmt->fetch(PDO::FETCH_ASSOC);
            } catch (Exception $e) {
                return "Error: " . $e->getMessage();
            }
        } else {
            try {
                $agentes = Conexion::conectar()->prepare("SELECT * FROM plan_entrenamiento as pe, clientes as c INNER JOIN usuarios as u on u.id_Usuario=c.id_Usuario;");
                $agentes->execute();
                return $agentes->fetchAll(PDO::FETCH_ASSOC);
            } catch (Exception $e) {
                return "Error: " . $e->getMessage();
            }
        }
    }

    static public function mdlAgregarCliente($datos)
    {
        try {
            
            $stmt = Conexion::conectar()->prepare("INSERT INTO clientes (dni,nombre, apellio,fechaNacimiento , direccion,telefono , email, usuario, fechaInscripcion, ) VALUES (:dni,:nombre, :apellio,:fechaNacimiento , :direccion,:telefono , :email, :usuario, :fechaInscripcion,)");

            $stmt->bindParam(":dni", $datos["dni"], PDO::PARAM_INT);
            $stmt->bindParam(":nombre", $datos["nombre"], PDO::PARAM_STR);
            $stmt->bindParam(":apellido", $datos["apellido"], PDO::PARAM_STR);

            $stmt->bindParam(":fechaNacimiento", $datos["fechaNacimiento"], PDO::PARAM_INT);

            $stmt->bindParam(":direccion", $datos["direccion"], PDO::PARAM_STR);
            $stmt->bindParam(":telefono", $datos["telefono"], PDO::PARAM_STR);
            $stmt->bindParam(":email", $datos["email"], PDO::PARAM_STR);
            $stmt->bindParam(":usuario", $datos["usuario"], PDO::PARAM_STR);
            $stmt->bindParam(":fechaInscripcion", $datos["fechaInscripcin"], PDO::PARAM_STR);

            if ($stmt->execute()) {
                return "ok";
            } else {
                return "error";
            }
        } catch (PDOException $e) {
            return "Error: " . $e->getMessage();
        }
    }

    static public function mdlEditarClientes($datos)
    {
        try {
            $stmt = Conexion::conectar()->prepare("UPDATE cliente SET 
            apellido = :apellido, nombre = :nombre, dni = :dni, telefono = :telefono, 
            direccion = :direccion, email = :email, id_Usuario = :id_Usuario, 
            fechaNacimiento = :fechaNacimiento, id_PlanEntrenamiento =:id_PlanEntrenamiento , id_EstadoMembresia = :id_EstadoMembresia
            WHERE id_Cliente = :id_Cliente");

            $stmt->bindParam(":dni", $datos["dni"], PDO::PARAM_INT);
            $stmt->bindParam(":nombre", $datos["nombre"], PDO::PARAM_STR);
            $stmt->bindParam(":apellido", $datos["apellido"], PDO::PARAM_STR);

            $stmt->bindParam(":fechaNacimiento", $datos["fechaNacimiento"], PDO::PARAM_INT);

            $stmt->bindParam(":direccion", $datos["direccion"], PDO::PARAM_STR);
            $stmt->bindParam(":telefono", $datos["telefono"], PDO::PARAM_STR);
            $stmt->bindParam(":email", $datos["email"], PDO::PARAM_STR);
            $stmt->bindParam(":id_Usuario", $datos["id_Usuario"], PDO::PARAM_STR);
            $stmt->bindParam(":fechaInscripcion", $datos["fechaInscripcin"], PDO::PARAM_STR);
            $stmt->bindParam(":id_PlanEntrenamineto", $datos["id_PlanEntrenamiento"], PDO::PARAM_STR);
            $stmt->bindParam(":id_EstadoMembresia", $datos["id_EstadoMembresia"], PDO::PARAM_STR);
            $stmt->bindParam("id_Cliente", $datos["id_Cliente"], PDO::PARAM_STR);

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
