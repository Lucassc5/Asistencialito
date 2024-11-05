<?php

require_once 'conexion.php';
require_once "Clases/Alumno.php";


$_POST['id_alumno'];
$idAlumno = $_POST['id_alumno'];
$alumno = new Alumno();

    if ($alumno->borrarAlumno($idAlumno, $conn)) {
        header("Location: registrarAlumno.php");
        exit();
    } else {
        echo "Error al eliminar el alumno";
    }
    