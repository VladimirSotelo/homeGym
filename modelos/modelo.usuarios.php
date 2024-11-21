<?php
//MOSTRAR DATOS*/
require_once 'conexion.php';
class ModeloUsuarios{

    static public function mdlMostrarUsuarios()
    {
        
        try {
            $usuarios = conexion::conectar()->prepare("SELECT * from clientes as c, usuarios as u, profesores as p where c.id_Usuario = u.id_Usuario or p.id_Usuario = u.id_Usuario");
            $usuarios->execute();

            return $usuarios->fetchAll(PDO::FETCH_ASSOC);
        } catch (Exception $e) {
            return "Error: " . $e->getMessage();
        }
        
    }

    static public function mdlBuscarUsuario($usuario, $valor)
    {
        try {
            $stmt = Conexion::conectar()->prepare("SELECT * FROM usuarios  WHERE $usuario = :$usuario;");
            $stmt->bindParam(":" . $usuario, $valor, PDO::PARAM_INT);
            $stmt->execute();
            return $stmt->fetchAll(PDO::FETCH_ASSOC);
        } catch (Exception $e) {
            return "Error: " . $e->getMessage();
        }
    }
}
