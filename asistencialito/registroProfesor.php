<?php

require_once 'conexion.php';

$database = new Database();
$conn = $database->connect();

if ($_SERVER["REQUEST_METHOD"] == 'POST'){

    $email = ($_POST["email"]);
    $contrasena = ($_POST["contrasena"]);
    $nombre = ($_POST["nombre"]);
    $apellido = ($_POST["apellido"]);
    $fecha_nacimiento = ($_POST["fecha_nacimiento"]);
    $legajo = ($_POST["legajo"]);
    

    $sql = "INSERT INTO profesores (email, contrasena, nombre, apellido, fecha_nacimiento, legajo) 
    VALUES (:email, :contrasena, :nombre, :apellido, :fecha_nacimiento, :legajo)";   

    $stmt = $conn->prepare($sql);

    $stmt->bindParam(':email', $email);
    $stmt->bindParam(':contrasena', $contrasena);
    $stmt->bindParam(':nombre', $nombre);
    $stmt->bindParam(':apellido', $apellido);
    $stmt->bindParam(':fecha_nacimiento', $fecha_nacimiento);
    $stmt->bindParam(':legajo', $legajo);

    if($stmt->execute()){
        echo "Registrado con exito";
    } else {
        echo "Error al registrar";
    }

}