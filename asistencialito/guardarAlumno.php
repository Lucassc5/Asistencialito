<?php

require_once 'conexion.php';

$database = new Database();
$conn = $database->connect();

if ($_SERVER["REQUEST_METHOD"] == 'POST'){

    $nombre = ($_POST["nombre"]);
    $apellido = ($_POST["apellido"]);
    $fecha_nacimiento = ($_POST["fecha_nacimiento"]);

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