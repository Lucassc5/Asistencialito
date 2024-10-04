<?php

require_once 'conexion.php';

$database = new Database();
$conn = $database->connect();

if ($_SERVER["REQUEST_METHOD"] == 'POST'){

    $nombre_alumno = ($_POST["nombre_alumno"]);
    $apellido_alumno = ($_POST["apellido_alumno"]);
    $fecha_nacimiento_alumno = ($_POST["fecha_nacimiento_alumno"]);
    $email_alumno = ($_POST["email_alumno"]);

    $sql = "INSERT INTO alumnos (nombre_alumno, apellido_alumno, fecha_nacimiento_alumno, email_alumno) 
    VALUES (:nombre_alumno, :apellido_alumno, :fecha_nacimiento_alumno, :email_alumno)";   

    $stmt = $conn->prepare($sql);

    $stmt->bindParam(':nombre_alumno', $nombre_alumno);
    $stmt->bindParam(':apellido_alumno', $apellido_alumno);
    $stmt->bindParam(':fecha_nacimiento_alumno', $fecha_nacimiento_alumno);
    $stmt->bindParam(':email_alumno', $email_alumno);
    
    if($stmt->execute()){
        //echo "Registrado con exito";
    
    header("Location: registrarAlumno.php");

    } else {
        echo "Error al registrar";
    }

}