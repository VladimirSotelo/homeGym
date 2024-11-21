<?php
require_once 'conexion.php';
class ModeloProfesores{
    // ==============================================================   
    // Mostrar Profesores
    // ==============================================================
    static public function mdlMostrarProfesores($campo, $valor)
    {
        if ($campo != null) {
            try {
                $stmt = conexion::conectar()->prepare("SELECT 
                    p.id_Profesor,
                    u.nombre,
                    u.apellido,
                    u.dni,
                    u.telefono,
                    u.email,
                    p.fechaContratacion,
                    p.estado as estadoEntrenador,
                    GROUP_CONCAT(e.especialidad SEPARATOR ', ') AS especialidades
                FROM 
                    profesores AS p
                JOIN 
                    usuarios AS u ON p.id_Usuario = u.id_Usuario
                JOIN 
                    especialidades_profesores AS ep ON p.id_Profesor = ep.id_Profesor
                JOIN 
                    especialidades AS e ON ep.id_Especialidad = e.id_Especialidad
                GROUP BY 
                    p.id_Profesor, p.fechaContratacion, p.estado
                WHERE
                     $campo = :$campo;
                ");
                $stmt->bindParam(":" . $campo, $valor, PDO::PARAM_INT);
                $stmt->execute();
                return $stmt->fetch(PDO::FETCH_ASSOC);

                // return $stmt->fetchAll(PDO::FETCH_ASSOC);
            } catch (Exception $e) {
                return "Error: " . $e->getMessage();
            }
        } else {
            try {
                $profesor = conexion::conectar()->prepare("SELECT 
                    p.id_Profesor,
                    u.nombre,
                    u.apellido,
                    u.dni,
                    u.telefono,
                    u.email,
                    p.fechaContratacion,
                    p.estado as estadoEntrenador,
                    GROUP_CONCAT(e.especialidad SEPARATOR ', ') AS especialidades
                FROM 
                    profesores AS p
                JOIN 
                    usuarios AS u ON p.id_Usuario = u.id_Usuario
                JOIN 
                    especialidades_profesores AS ep ON p.id_Profesor = ep.id_Profesor
                JOIN 
                    especialidades AS e ON ep.id_Especialidad = e.id_Especialidad
                GROUP BY 
                    p.id_Profesor, p.fechaContratacion, p.estado;");
                $profesor->execute();

                return $profesor->fetchAll(PDO::FETCH_ASSOC);
            } catch (Exception $e) {
                return "Error: " . $e->getMessage();
            }
        }
    }

    // ==============================================================
    // Agregar Profesor
    // ==============================================================
    static public function mdlAgregarProfesor($datos)
    {
        try {
            $stmtUsuarios = Conexion::conectar()->prepare("INSERT INTO usuarios (usuario, contrasena, dni, nombre, apellido, telefono, email, tipo)
                 VALUES (:usuario, :contrasena, :dni, :nombre, :apellido, :telefono, :email, :tipo)"
            );

            $stmtUsuarios->bindParam(":usuario", $datos["email"], PDO::PARAM_STR); // Usuario = email
            $stmtUsuarios->bindParam(":contrasena",  crypt($datos["password"], '$2a$07$tawfdgyaufiusdgopfhgjxerctyuniexrcvrdtfyg$'), PDO::PARAM_STR);
            $stmtUsuarios->bindParam(":dni", $datos["dni"], PDO::PARAM_INT);
            $stmtUsuarios->bindParam(":nombre", $datos["nombre"], PDO::PARAM_STR);
            $stmtUsuarios->bindParam(":apellido", $datos["apellido"], PDO::PARAM_STR);
            $stmtUsuarios->bindParam(":telefono", $datos["telefono"], PDO::PARAM_STR);
            $stmtUsuarios->bindParam(":email", $datos["email"], PDO::PARAM_STR);
            $stmtUsuarios->bindParam(":tipo", $datos["tipo"], PDO::PARAM_STR);

            if (!$stmtUsuarios->execute()) {
                return "error_usuarios";
            }

            // Obtener el último id_Usuario insertado
            $idUsuario = Conexion::conectar()->query("SELECT MAX(id_Usuario) AS id FROM usuarios")->fetch(PDO::FETCH_ASSOC)['id'];
            // print_r("ID usuario: " . $idUsuario);
            // Insertar en la tabla profesores
            $stmtProfesores = Conexion::conectar()->prepare(
                "INSERT INTO profesores (fechaContratacion, estado, id_Usuario)
                VALUES (:fechaContratacion, :estado, :id_Usuario)"
            );

            $stmtProfesores->bindParam(":fechaContratacion", $datos["fechaContratacion"], PDO::PARAM_STR);
            $stmtProfesores->bindParam(":estado", $datos["estado"], PDO::PARAM_STR);
            $stmtProfesores->bindParam(":id_Usuario", $idUsuario, PDO::PARAM_INT);

            if ($stmtProfesores->execute()) {
                return "ok";
            } else {
                return "error_profesores";
            }
        } catch (PDOException $e) {
            return "Error: " . $e->getMessage();
        }
    }

    // ==============================================================
    // Editar Profesor
    // ==============================================================
    static public function mdlEditarProfesor($datos)
    {
        try {

        if ($datos["password"] = "Sin cambios"){
            $stmt = Conexion::conectar()->prepare("UPDATE usuarios u
            JOIN profesores p ON u.id_Usuario = p.id_Usuario
            SET u.dni = :dni, u.nombre = :nombre, u.apellido = :apellido, 
                u.email = :email, u.telefono = :telefono, 
                p.fechaContratacion = :fechaContratacion, 
                p.estado = :estado
            WHERE p.id_Profesor = :id_Profesor");

            $stmt->bindParam(":dni", $datos["dni"], PDO::PARAM_INT);
            $stmt->bindParam(":nombre", $datos["nombre"], PDO::PARAM_STR);
            $stmt->bindParam(":apellido", $datos["apellido"], PDO::PARAM_STR);
            $stmt->bindParam(":email", $datos["email"], PDO::PARAM_STR);
            $stmt->bindParam(":telefono", $datos["telefono"], PDO::PARAM_STR);
            $stmt->bindParam(":fechaContratacion", $datos["fechaContratacion"], PDO::PARAM_STR);
            $stmt->bindParam(":estado", $datos["estado"], PDO::PARAM_STR);
            $stmt->bindParam(":id_Profesor", $datos["id_Profesor"], PDO::PARAM_INT);
        }else{
            $stmt = Conexion::conectar()->prepare("UPDATE usuarios u
                JOIN profesores p ON u.id_Usuario = p.id_Usuario
                SET u.dni = :dni, u.nombre = :nombre, u.apellido = :apellido, 
                    u.email = :email, u.telefono = :telefono, 
                    u.contrasena = :contrasena, 
                    p.fechaContratacion = :fechaContratacion, 
                    p.estado = :estado
                WHERE p.id_Profesor = :id_Profesor");

            $stmt->bindParam(":dni", $datos["dni"], PDO::PARAM_INT);
            $stmt->bindParam(":nombre", $datos["nombre"], PDO::PARAM_STR);
            $stmt->bindParam(":apellido", $datos["apellido"], PDO::PARAM_STR);
            $stmt->bindParam(":email", $datos["email"], PDO::PARAM_STR);
            $stmt->bindParam(":telefono", $datos["telefono"], PDO::PARAM_STR);
            $stmt->bindParam(":contrasena", crypt($datos["password"], '$2a$07$tawfdgyaufiusdgopfhgjxerctyuniexrcvrdtfyg$'), PDO::PARAM_STR);
            $stmt->bindParam(":fechaContratacion", $datos["fechaContratacion"], PDO::PARAM_STR);
            $stmt->bindParam(":estado", $datos["estado"], PDO::PARAM_STR);
            $stmt->bindParam(":id_Profesor", $datos["id_Profesor"], PDO::PARAM_INT);
        }

            if ($stmt->execute()) {
                return "ok";
            } else {
                return "error";
            }
        } catch (PDOException $e) {
            return "Error: " . $e->getMessage();
        }
    }

    static public function mdlInsertarEspecialidadesProfesor($tabla, $idProfesor, $especialidades) {
        try {
            $conexion = Conexion::conectar();
            $stmt = $conexion->prepare("INSERT INTO $tabla (id_Profesor, id_Especialidad) VALUES (:id_Profesor, :id_Especialidad)");
            print_r("Id Profe: ". $idProfesor);
            print_r("Id esp: ". $especialidades[0] . " " . $especialidades[1]);
            print_r("tabla: ". $tabla);
            foreach ($especialidades as $idEspecialidad) {
                $stmt->bindParam(":id_Profesor", $idProfesor, PDO::PARAM_INT);
                $stmt->bindParam(":id_Especialidad", $idEspecialidad, PDO::PARAM_INT);
                $stmt->execute();
                
            }
    
            return "ok";
        } catch (Exception $e) {
            return $e->getMessage();
        }
    }


}


