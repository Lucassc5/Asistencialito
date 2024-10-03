<?php

class Alumno extends Persona {

    private $materia;

    public function __construct($nombre, $apellido, $fecha_nacimiento, $materia) {
        parent::__construct($nombre, $apellido, $fecha_nacimiento);
        $this->materia = $materia;
    }

    public function getMateria() {
        return $this->materia;
    }

    public function setMateria($materia) {
        $this->materia = $materia;
    }

    function createAlumno($nombre, $apellido, $fecha_nacimiento, $materia) {
        $alumno = new Alumno($nombre, $apellido, $fecha_nacimiento, $materia);
        $sql = "INSERT INTO alumnos (nombre, apellido, fecha_nacimiento, $materia) 
        
        VALUES (:nombre, :apellido, :fecha_nacimiento, :materia)";   

        $stmt = $conn->prepare($sql);

        $stmt->bindParam(':nombre', $nombre);
        $stmt->bindParam(':apellido', $apellido);
        $stmt->bindParam(':fecha_nacimiento', $fecha_nacimiento);
        $stmt->bindParam(':materia', $materia);

        if($stmt->execute()){
            echo "Registrado con exito";
        } else {
            echo "Error al registrar";
        }
    }

    function getAlumnoById($id) {
        $pdo = connectDB();
        $sql = "SELECT * FROM alumnos WHERE id = :id";
        $stmt = $pdo->prepare($sql);
        $stmt->bindParam(':id', $id);
        $stmt->execute();
    
        $alumno = $stmt->fetch(PDO::FETCH_ASSOC);
    
        if ($alumno) {
            return new Alumno($alumno['nombre'], $alumno['apellido'], $alumno['fecha_nacimiento'], $alumno['materia']);
        } else {
            echo "Alumno no encontrado.";
            return null;
        }
    }

    function updateAlumno($id, $nombre, $apellido, $fecha_nacimiento, $materia) {
        $pdo = connectDB();
        $sql = "UPDATE alumnos SET nombre = :nombre, apellido = :apellido, fecha_nacimiento = :fecha_nacimiento, materia = :materia WHERE id = :id";
        $stmt = $pdo->prepare($sql);
        
        $stmt->bindParam(':nombre', $nombre);
        $stmt->bindParam(':apellido', $apellido);
        $stmt->bindParam(':fecha_nacimiento', $fecha_nacimiento);
        $stmt->bindParam(':materia', $materia);
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