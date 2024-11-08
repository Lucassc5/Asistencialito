<?php
    require_once "../conexion.php";
    require_once "../Clases/Alumno.php";


  
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $id_alumno = $_POST['id_alumno'];
    $nombre = $_POST['nombre_alumno'];
    $apellido = $_POST['apellido_alumno'];
    $fecha_nacimiento = $_POST['fecha_nacimiento_alumno'];
    $dni = $_POST['dni_alumno'];

    $alumno = new Alumno();

    
    if ($alumno->editarAlumno($id_alumno, $nombre, $apellido, $fecha_nacimiento, $dni, $conn)) {
        header("Location: ../paginaMain.php");
        exit();
    } else {
        echo "Error al editar el alumno.";
    }
}
