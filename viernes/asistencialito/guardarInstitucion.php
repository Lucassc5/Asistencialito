<?php

require_once 'conexion.php';

$database = new Database();
$conn = $database->connect();

if ($_SERVER["REQUEST_METHOD"] == 'POST'){

    $nombre_institucion = ($_POST["nombre_institucion"]);
    $direccion_institucion = ($_POST["direccion_institucion"]);
    $cue = ($_POST["cue"]);

    $sql = "INSERT INTO institucion (nombre_institucion, direccion_institucion, cue) 
    VALUES (:nombre_institucion, :direccion_institucion, :cue)";   

    $stmt = $conn->prepare($sql);

    $stmt->bindParam(':nombre_institucion', $nombre_institucion);
    $stmt->bindParam(':direccion_institucion', $direccion_institucion);
    $stmt->bindParam(':cue', $cue);
    
    if($stmt->execute()){
        echo "Registrado con exito";
    } else {
        echo "Error al registrar";
    }

}