<?php
require_once 'conexion.php';

class ModeloClientes{

    static public function mdlMostrarClientes(){
        try {
            $clientes = conexion::conectar()->prepare("SELECT * FROM clientes as c INNER JOIN planentrenamiento as Pe ON Pe.id_planEntrenamiento=c.id_planEntrenamiento
                INNER JOIN pagos as p on p.id_planEntrenamiento = Pe.id_planEntrenamiento 
                INNER JOIN entrenadores as e on e.id_entrenador = Pe.id_entrenador
                INNER JOIN estadomempresia as me ON me.id_estadoMempresia =c.id_estadoMempresia");
            $clientes->execute();

            return $clientes->fetchAll(PDO::FETCH_ASSOC);
        } catch (Exception $e) {
            return "Error: " . $e->getMessage();
        }
    }

}