<?php

require_once 'conexion.php';

class Profesor{

    private $email_profesor;
    private $contrasena_profesor;
    private $nombre_profesor;
    private $apellido_profesor;
    private $fecha_nacimiento_profesor;
    private $legajo;


    function createProfesor($email_profesor, $contrasena_profesor, $nombre_profesor, $apellido_profesor, $fecha_nacimiento_profesor, $legajo) {
        
        $sql = "INSERT INTO profesores (email_profesor, contrasena_profesor, nombre_profesor, apellido_profesor, fecha_nacimiento_profesor, legajo) 
        VALUES (:email_profesor, :contrasena_profesor, :nombre_profesor, :apellido_profesor, :fecha_nacimiento_profesor, :legajo)";
        $stmt = $conn->prepare($sql);
    
        $stmt->bindParam(':email_profesor', $email_profesor);
        $stmt->bindParam(':contrasena_profesor', $contrasena_profesor);
        $stmt->bindParam(':nombre_profesor', $nombre_profesor);
        $stmt->bindParam(':apellido_profesor', $apellido_profesor);
        $stmt->bindParam(':fecha_nacimiento_profesor', $fecha_nacimiento_profesor);
        $stmt->bindParam(':legajo', $legajo);

        if ($stmt->execute()) {
            echo "Profesor creado exitosamente.";
        } else {
            echo "Error al crear el profesor.";
        }
    }
    

    function updateProfesor($id, $nombre, $apellido, $fecha_nacimiento, $legajo) {
        $pdo = connectDB();
        $sql = "UPDATE profesores SET email_profesor = :email_profesor, contrasena_profesor = :contrasena_profesor, nombre_profesor = nombre:profesor, apellido_profesor = :apellido_profesor, fecha_nacimiento_profesor = :fecha_nacimiento_profesor, legajo = :legajo WHERE id = :id";
        $stmt = $conn->prepare($sql);
    
        $stmt->bindParam(':email_profesor', $email_profesor);
        $stmt->bindParam(':contrasena_profesor', $contrasena_profesor);
        $stmt->bindParam(':nombre_profesor', $nombre_profesor);
        $stmt->bindParam(':apellido_profesor', $apellido_profesor);
        $stmt->bindParam(':fecha_nacimiento_profesor', $fecha_nacimiento_profesor);
        $stmt->bindParam(':legajo', $legajo);
    
        if ($stmt->execute()) {
            echo "Profesor actualizado exitosamente.";
        } else {
            echo "Error al actualizar el profesor.";
        }
    }
    
    function deleteProfesor($id) {
        $pdo = connectDB();
        $sql = "DELETE FROM profesores WHERE id = :id";
        $stmt = $conn->prepare($sql);
        $stmt->bindParam(':id', $id);
    
        if ($stmt->execute()) {
            echo "Profesor eliminado exitosamente.";
        } else {
            echo "Error al eliminar el profesor.";
        }
    }

    public function obtenerProfesor($email_profesor, $conn){
        global $conn;

        $query = "SELECT * FROM profesores WHERE email_profesor = :email_profesor";

        $stmt = $conn->prepare($query);
        $stmt->bindParam(":email_profesor", $email_profesor, PDO::PARAM_STR);
        $stmt->execute();
        
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }
        

}