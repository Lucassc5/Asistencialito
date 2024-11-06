<?php
    require_once '../conexion.php';
    require_once "../Clases/Alumno.php";

    $idAlumno = $_POST['id_alumno'];
    $alumno = new Alumno();
    $alumno->borrarAlumno($idAlumno, $conn);

    header("Location: ../paginaMain.php");
    exit();