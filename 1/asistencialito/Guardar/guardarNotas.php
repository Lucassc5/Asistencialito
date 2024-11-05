<?php

require_once 'conexion.php';
require_once 'Clases/Nota.php';

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    if (session_status() === PHP_SESSION_NONE) {
        session_start();
    }

    $idMateria = $_SESSION['materias_id'];

    foreach ($_POST['nota1'] as $idAlumno => $nota1) {
        $nota2 = $_POST['nota2'][$idAlumno] ?? 0;
        $nota3 = $_POST['nota3'][$idAlumno] ?? 0;

        $notas = new Notas();
        $notas->guardarNotas($idAlumno, $idMateria, $nota1, $nota2, $nota3);
    }

    header("Location: paginaMain.php");
    exit();
}