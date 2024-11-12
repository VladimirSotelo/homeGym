<?php
//MOSTRAR DATOS*/
require_once 'conexion.php';
class ModeloUsuarios{

    static public function mdlMostrarUsuarios()
    {
        
        try {
            $usuarios = conexion::conectar()->prepare("SELECT * FROM usuarios AS u INNER JOIN clientes as C ON C.id_cliente = U.id_cliente 
                INNER JOIN planentrenamiento AS pe on pe.id_planEntrenamiento = c.id_planEntrenamiento
                INNER JOIN estadomempresia As EM on EM.id_estadoMempresia = c.id_estadoMempresia ");
            $usuarios->execute();

            return $usuarios->fetchAll(PDO::FETCH_ASSOC);
        } catch (Exception $e) {
            return "Error: " . $e->getMessage();
        }
       
    }
}
