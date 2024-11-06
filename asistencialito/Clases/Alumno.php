<?php

        $database = new Database();
        $conn = $database->connect();   

class Alumno {
        
        public $nombre_alumno;
        public $apellido_alumno;
        public $fecha_nacimiento_alumno;
        public $dni_alumno;
        public $id_materia;
    
    function crearAlumno($nombre_alumno, $apellido_alumno, $fecha_nacimiento_alumno, $dni_alumno, $id_materia, $conn) {
        
        $sql = "INSERT INTO alumnos (nombre_alumno, apellido_alumno, fecha_nacimiento_alumno, dni_alumno,id_materia) 
                VALUES (:nombre_alumno, :apellido_alumno, :fecha_nacimiento_alumno, :dni_alumno, :id_materia)";

        $stmt = $conn->prepare($sql);
        $stmt->bindParam(':nombre_alumno', $nombre_alumno, PDO::PARAM_STR);
        $stmt->bindParam(':apellido_alumno', $apellido_alumno, PDO::PARAM_STR);
        $stmt->bindParam(':fecha_nacimiento_alumno', $fecha_nacimiento_alumno, PDO::PARAM_STR);
        $stmt->bindParam(':dni_alumno', $dni_alumno, PDO::PARAM_STR);
        $stmt->bindParam(':id_materia', $id_materia, PDO::PARAM_STR);

        return $stmt->execute();
        
    }
    

    function editarAlumno($id_alumno, $nombre_alumno, $apellido_alumno, $fecha_nacimiento_alumno, $dni_alumno, $conn) {
        
        $sql = "UPDATE alumnos SET nombre_alumno = :nombre_alumno, apellido_alumno = :apellido_alumno, fecha_nacimiento_alumno = :fecha_nacimiento_alumno, dni_alumno = :dni_alumno WHERE id_alumno = :id_alumno";
        
        $stmt = $conn->prepare($sql);
        $stmt->bindParam(':nombre_alumno', $nombre_alumno, PDO::PARAM_STR);
        $stmt->bindParam(':apellido_alumno', $apellido_alumno, PDO::PARAM_STR);
        $stmt->bindParam(':fecha_nacimiento_alumno', $fecha_nacimiento_alumno, PDO::PARAM_STR);
        $stmt->bindParam(':dni_alumno', $dni_alumno, PDO::PARAM_STR);
        $stmt->bindParam(':id_alumno', $id_alumno, PDO::PARAM_STR);

        return $stmt->execute();
    }


    public function borrarAlumno($id_alumno, $conn) {
            $query = "DELETE FROM alumnos WHERE id_alumno = :id_alumno";
            $stmt = $conn->prepare($query);
            $stmt->bindParam(':id_alumno', $id_alumno, PDO::PARAM_INT);
            return $stmt->execute();
        
    }

    public function obtenerAlumnoMateria($idMateria, $conn) {
        $query = "SELECT * FROM alumnos WHERE id_materia = :id_materia";
    
        $stmt = $conn->prepare($query); 
        $stmt->bindValue(":id_materia", $idMateria, PDO::PARAM_INT); 
        $stmt->execute(); 
        return $stmt->fetchAll(PDO::FETCH_ASSOC); 
    }

    public function obtenerAlumnoId($id_alumno, $conn) {
        $query = "SELECT * FROM alumnos WHERE id_alumno = :id_alumno";

        $stmt = $conn->prepare($query);
        $stmt->bindParam(':id_alumno', $id_alumno, PDO::PARAM_INT);
        $stmt->execute();
        
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }
    
}