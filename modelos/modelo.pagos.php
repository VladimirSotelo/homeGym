<?php
require_once 'conexion.php';

class ModeloPago{

    static public function mdlMostrarPagos($pago,$valor) {

        if ($pago != null) {

            try {
                $stmt = Conexion::conectar()->prepare("SELECT *  FROM pagos as p  where $pago = :$pago;");

                $stmt->bindParam(":" . $pago, $valor, PDO::PARAM_INT);
                $stmt->execute();
                return $stmt->fetch(PDO::FETCH_ASSOC);
            } catch (Exception $e) {
                return "Error: " . $e->getMessage();
            }
        } else {
            try {
                $pagos = Conexion::conectar()->prepare("SELECT * FROM pagos as p");
                $pagos->execute();
                return $pagos->fetchAll(PDO::FETCH_ASSOC);
            } catch (Exception $e) {
                return "Error: " . $e->getMessage();
            }
        }

        
        
    }

    static public function mdlAgregarPago($datos)
    {
        try {


            $stmt = Conexion::conectar()->prepare("INSERT INTO pagos (id_cliente,fechaPago,montoPago,metodoPago,estadoPago ) VALUES (:id_Cliente,:fechaPago,:montoPago,:metodoPago,:estadoPago)");


            $stmt->bindParam(":id_Cliente", $datos["id_Cliente"], PDO::PARAM_INT);
            $stmt->bindParam(":fechaPago", $datos["fechaPago"], PDO::PARAM_STR);
            $stmt->bindParam(":montoPago", $datos["montoPago"], PDO::PARAM_INT);
            $stmt->bindParam(":metodoPago", $datos["metodoPago"], PDO::PARAM_STR);
            $stmt->bindParam(":estadoPago", $datos["estadoPago"], PDO::PARAM_INT);

            if ($stmt->execute()) {
                return "ok";
            } else {
                return "error";
            }
        } catch (PDOException $e) {
            return "Error: " . $e->getMessage();
        }
    }

    static public function mdlEditarPago($datos)
    {
        try {
            $stmt = Conexion::conectar()->prepare("UPDATE pagos SET 
            id_Cliente = :id_Cliente, fechaPago = :fechaPago, montoPago = :montoPago, metodoPago = :metodoPago, 
            estadoPago = :estadoPago
            WHERE id_Pago = :id_Pago");

            $stmt->bindParam(":id_Pago", $datos["id_Pago"], PDO::PARAM_INT);
            $stmt->bindParam(":id_Cliente", $datos["id_Cliente"], PDO::PARAM_STR);
            $stmt->bindParam(":fechaPago", $datos["fechaPago"], PDO::PARAM_STR);
            $stmt->bindParam(":montoPago", $datos["montoPago"], PDO::PARAM_INT);
            $stmt->bindParam(":metodoPago", $datos["metodoPago"], PDO::PARAM_INT);
            $stmt->bindParam(":estadoPago", $datos["estadoPago"], PDO::PARAM_INT);

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