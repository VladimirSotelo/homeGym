<?php
require_once 'conexion.php';

class ModeloPago{

    static public function mdlMostrasPagos() {
        
        try{
            $pagos=conexion::conectar()->prepare("SELECT p.*,
            CONCAT(c.apellidoCliente,' ',c.nombreCliente) as cliente,mp.*,ep.*,pe.* FROM pagos as p 
                INNER JOIN clientes as c ON c.id_cliente = p.id_cliente
                INNER JOIN planentrenamiento as pe ON pe.id_planEntrenamiento = p.id_planEntrenamiento
                INNER JOIN metodospago as mp ON mp.id_metodoPago=p.id_estadoPago
                INNER JOIN estadopago as ep ON ep.id_estadoPago =p.id_estadoPago");
            $pagos->execute();

            return $pagos->fetchAll(PDO::FETCH_ASSOC);
        } catch (Exception $e) {
            return "Error: " . $e->getMessage();
        }
        
    }
}