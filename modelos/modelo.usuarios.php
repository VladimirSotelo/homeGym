<?php
//MOSTRAR DATOS*/
require_once 'conexion.php';
class ModeloUsuarios{

    static public function mdlMostrarUsuarios()
    {
        
        try {
            $usuarios = conexion::conectar()->prepare("SELECT * FROM usuarios AS u INNER JOIN clientes as C ON C.id_usuario = U.id_usuarios 
                INNER JOIN planentrenamiento AS pe on pe.id_planEntrenamiento = c.id_planEntrenamiento");
            $usuarios->execute();

            return $usuarios->fetchAll(PDO::FETCH_ASSOC);
        } catch (Exception $e) {
            return "Error: " . $e->getMessage();
        }
       
    }
    


    static public function mdlBuscarUsuario($usuario, $valor)
    {
        try {
            $stmt = Conexion::conectar()->prepare("SELECT * FROM usuarios,clientes  WHERE usuarios.id_Usuario = clientes.id_Usuario  and $usuario = :$usuario;");
            $stmt->bindParam(":" . $usuario, $valor, PDO::PARAM_INT);
            $stmt->execute();
            return $stmt->fetchAll(PDO::FETCH_ASSOC);
        } catch (Exception $e) {
            return "Error: " . $e->getMessage();
        }
    }
}
