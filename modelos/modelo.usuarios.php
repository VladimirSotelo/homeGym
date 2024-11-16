<?php
//MOSTRAR DATOS*/
require_once 'conexion.php';
class ModeloUsuarios{

    static public function mdlMostrarUsuarios()
    {
        
        try {
<<<<<<< HEAD
            $usuarios = conexion::conectar()->prepare("SELECT * FROM usuarios AS u INNER JOIN clientes as C ON C.id_usuario = U.id_Usuario
                INNER JOIN plan_entrenamiento AS pe on pe.id_planEntrenamiento = c.id_planEntrenamiento;");
=======
            $usuarios = conexion::conectar()->prepare("SELECT * from clientes as c, usuarios as u, profesores as p where c.id_Usuario = u.id_Usuario or p.id_Usuario = u.id_Usuario");
>>>>>>> a360b2a45f390a963827d16e17436417aa6e7e97
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
