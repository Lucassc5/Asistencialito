<?php

require_once 'conexion.php';

$database = new Database();
$conn = $database->connect();

if ($_SERVER["REQUEST_METHOD"] == 'POST'){

    $nombre = ($_POST["nombre"]);
    $direccion = ($_POST["direccion"]);
    $cue = ($_POST["cue"]);

    $sql = "INSERT INTO institucion (nombre, direccion, cue) 
    VALUES (:nombre, :direccion, :cue)";   

    $stmt = $conn->prepare($sql);

    $stmt->bindParam(':nombre', $nombre);
    $stmt->bindParam(':direccion', $direccion);
    $stmt->bindParam(':cue', $cue);
    
    if($stmt->execute()){
        echo "Registrado con exito";
    } else {
        echo "Error al registrar";
    }

}