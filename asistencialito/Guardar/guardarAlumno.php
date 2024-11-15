<?php

require_once '../conexion.php';
require_once "../Clases/Alumno.php";


// Cierra sesiones existentes
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

if (!isset($_SESSION['materias_id'])) {
    echo "No se ha seleccionado ninguna materia.";
    exit();
}

$idMateria = $_SESSION['materias_id'];


    $nombre = $_POST['nombre_alumno'];
    $apellido = $_POST['apellido_alumno'];
    $fechaNacimiento = $_POST['fecha_nacimiento_alumno'];
    $dni = $_POST['dni_alumno'];

    $alumno = new Alumno();
    $nuevoAlumno = $alumno->crearAlumno($nombre, $apellido, $fechaNacimiento, $dni, $idMateria, $conn);

    header("Location: ../paginaMain.php");
