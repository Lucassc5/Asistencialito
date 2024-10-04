<?php

require_once 'conexion.php';

$database = new Database();
$conn = $database->connect();

if ($_SERVER["REQUEST_METHOD"] == 'POST'){

    $email_profesor = ($_POST["email_profesor"]);
    $contrasena_profesor = ($_POST["contrasena_profesor"]);
    $nombre_profesor = ($_POST["nombre_profesor"]);
    $apellido_profesor = ($_POST["apellido_profesor"]);
    $fecha_nacimiento_profesor = ($_POST["fecha_nacimiento_profesor"]);
    $legajo = ($_POST["legajo"]);
    

    $sql = "INSERT INTO profesores (email_profesor, contrasena_profesor, nombre_profesor, apellido_profesor, fecha_nacimiento_profesor, legajo) 
    VALUES (:email_profesor, :contrasena_profesor, :nombre_profesor, :apellido_profesor, :fecha_nacimiento_profesor, :legajo)";   

    $stmt = $conn->prepare($sql);

    $stmt->bindParam(':email_profesor', $email_profesor);
    $stmt->bindParam(':contrasena_profesor', $contrasena_profesor);
    $stmt->bindParam(':nombre_profesor', $nombre_profesor);
    $stmt->bindParam(':apellido_profesor', $apellido_profesor);
    $stmt->bindParam(':fecha_nacimiento_profesor', $fecha_nacimiento_profesor);
    $stmt->bindParam(':legajo', $legajo);

    if($stmt->execute()){
        echo "Registrado con exito";
    } else {
        echo "Error al registrar";
    }

}