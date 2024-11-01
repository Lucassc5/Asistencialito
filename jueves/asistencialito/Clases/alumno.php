<?php

class Alumno extends Persona {

    function createAlumno($nombre, $apellido, $fecha_nacimiento) {
        $alumno = new Alumno($nombre, $apellido, $fecha_nacimiento);
        $sql = "INSERT INTO alumnos (nombre, apellido, fecha_nacimiento) 
        
        VALUES (:nombre, :apellido, :fecha_nacimiento)";   

        $stmt = $conn->prepare($sql);

        $stmt->bindParam(':nombre', $nombre);
        $stmt->bindParam(':apellido', $apellido);
        $stmt->bindParam(':fecha_nacimiento', $fecha_nacimiento);

        if($stmt->execute()){
            echo "Registrado con exito";
        } else {
            echo "Error al registrar";
        }
    }

    function getAlumno($id) {
        $pdo = connectDB();
        $sql = "SELECT * FROM alumnos WHERE id = :id";
        $stmt = $pdo->prepare($sql);
        $stmt->bindParam(':id', $id);
        $stmt->execute();
    
        $alumno = $stmt->fetch(PDO::FETCH_ASSOC);
    
        if ($alumno) {
            return new Alumno($alumno['nombre'], $alumno['apellido'], $alumno['fecha_nacimiento']);
        } else {
            echo "Alumno no encontrado.";
            return null;
        }
    }

    function updateAlumno($id, $nombre, $apellido, $fecha_nacimiento) {
        $pdo = connectDB();
        $sql = "UPDATE alumnos SET nombre = :nombre, apellido = :apellido, fecha_nacimiento = :fecha_nacimiento WHERE id = :id";
        $stmt = $pdo->prepare($sql);
        
        $stmt->bindParam(':nombre', $nombre);
        $stmt->bindParam(':apellido', $apellido);
        $stmt->bindParam(':fecha_nacimiento', $fecha_nacimiento);
        $stmt->bindParam(':id', $id);
    
        if ($stmt->execute()) {
            echo "Alumno actualizado exitosamente.";
        } else {
            echo "Error al actualizar el alumno.";
        }
    }
    
    function deleteAlumno($id) {
        $pdo = connectDB();
        $sql = "DELETE FROM alumnos WHERE id = :id";
        $stmt = $pdo->prepare($sql);
        $stmt->bindParam(':id', $id);
    
        if ($stmt->execute()) {
            echo "Alumno eliminado exitosamente.";
        } else {
            echo "Error al eliminar el alumno.";
        }
    }
    


}