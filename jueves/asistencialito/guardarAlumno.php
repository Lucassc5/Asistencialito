<?php

require_once 'conexion.php';

$database = new Database();
$conn = $database->connect();

if ($_SERVER["REQUEST_METHOD"] == 'POST'){

    $nombre_alumno = ($_POST["nombre_alumno"]);
    $apellido_alumno = ($_POST["apellido_alumno"]);
    $fecha_nacimiento_alumno = ($_POST["fecha_nacimiento_alumno"]);
    
    
    $sql = "INSERT INTO alumnos (nombre_alumno, apellido_alumno, fecha_nacimiento_alumno, id_materia) 
    VALUES (:nombre_alumno, :apellido_alumno, :fecha_nacimiento_alumno, id_materia)";

    $stmt = $conn->prepare($sql);

    $stmt->bindParam(':id_alumno', $id_alumno);
    $stmt->bindParam(':nombre_alumno', $nombre_alumno);
    $stmt->bindParam(':apellido_alumno', $apellido_alumno);
    $stmt->bindParam(':fecha_nacimiento_alumno', $fecha_nacimiento_alumno);
    $stmt->bindParam(':id_materia', $id_materia);
    
    if($stmt->execute()){
        //echo "Registrado con exito";
    
    header("Location: registrarAlumno.php");

    } else {
        echo "Error al registrar";
    }
}