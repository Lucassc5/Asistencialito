<?php
    require_once 'conexion.php';
    require_once "Clases/Alumno.php";

    $idAlumno = $_POST['id_alumno'];
    $alumno = new Alumno();
  

    if ($alumno->borrarAlumno($idAlumno) == true) {
        header("Location: ../paginaMain.php");
        exit();
    } else {
        echo "Error al eliminar el alumno.";
    }
    header("Location: paginaMain.php");
    exit();
    