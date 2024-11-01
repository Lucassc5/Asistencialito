<?php

require_once "conexion.php";

    $database = new Database();
    $conn = $database->connect();

    $totalDias = 20;

    $stmt_asistencia = $conn->prepare('SELECT id_asistencia, id_alumno, id_materia FROM asistencias');
    $stmt_asistencia->execute();
    $resultado_asistencia = $stmt_asistencia->fetchAll(PDO::FETCH_ASSOC);


    $stmt_ram = $conn->prepare('SELECT nota_regular, nota_promocion, asistencia_regular, asistencia_promocion FROM ram');
    $stmt_ram->execute();
    $resultado_ram = $stmt_ram->fetchAll(PDO::FETCH_ASSOC);

    foreach($asistencias as $asistencia){

        

    }