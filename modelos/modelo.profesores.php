<?php
//MOSTRAR DATOS*/
require_once 'conexion.php';
class ModeloProfesores{

    static public function mdlMostrarProfesores()
    {
        
        try {
            $profesor = conexion::conectar()->prepare("SELECT *
            from profesores as p, usuarios as u, especialidades as e, especialidades_profesores as ep 
            where p.id_Usuario = u.id_Usuario and e.id_Especialidad = ep.id_Especialidad and p.id_Profesor = ep.id_Profesor");
            $profesor->execute();

            return $profesor->fetchAll(PDO::FETCH_ASSOC);
        } catch (Exception $e) {
            return "Error: " . $e->getMessage();
        }
       
    }
}


//agregar registro 

// class agregar{

//     static public function mdlAgregarDatos($tabla, $datos)
//     {
//         try {
//             $stmt = Conexion::conectar()->prepare("INSERT INTO $tabla(datos1, dato2, …..) VALUES
//     (:dato1, :dato2, ….)");
//             // UN ENLACE POR CADA DATO, TENER EN CUENTA EL TIPO DE DATO STR O INT
//             $stmt->bindParam(":dato1", $datos["dato1"], PDO::PARAM_STR);
//             $stmt->bindParam(":dato2", $datos["dato2"], PDO::PARAM_STR);
//             if ($stmt->execute()) {
//                 return "ok";
//             } else {
//                 return "error";
//             }
//         } catch (Exception $e) {
//             return "Error: " . $e->getMessage();
//         }
//     }
// }

// //actualizar registro
// class actualizar{

//     static public function mdlActualizarDatos($tabla, $datos)
//     {
//         try {
//             $stmt = Conexion::conectar()->prepare("UPDATE $tabla SET dato1 = :dato1, …. WHERE
//     id_dato = :id_dato");
//             //UN ENLACE DE PARAMETRO POR DATO, IGUAL A INSERTAR, IMPORTANTE SEGUIR EL
//             //ORDEN
//             $stmt->bindParam(":dato1", $datos["dato1"], PDO::PARAM_STR);
//             //…………………………………………………………………………………
//             $stmt->bindParam(":id_dato", $datos["id_dato"], PDO::PARAM_INT);
//             if ($stmt->execute()) {
//                 return "ok";
//             } else {
//                 return print_r(Conexion::conectar()->errorInfo());
//             }
//         } catch (Exception $e) {
//             return "Error: " . $e->getMessage();
//         }
//     }
// }

// //ELIMINAR DATO
// class eliminar{

//     static public function mdlEliminarDato($tabla, $dato)
//     {
//         try {
//             $stmt = Conexion::conectar()->prepare("DELETE FROM $tabla WHERE id_dato = :id_dato");
//             $stmt->bindParam(":id_dato", $dato, PDO::PARAM_INT);
//             if ($stmt->execute()) {
//                 return "ok";
//             } else {
//                 return "error";
//             }
//         } catch (Exception $e) {
//             return "Error: " . $e->getMessage();
//         }
//     }
// }
//"SELECT profesores.*, especialidades.especialidades FROM  `profesores`  INNER JOIN `especialidades` ON profesores.id_especialidad = especialidades.id_especialidad; "

