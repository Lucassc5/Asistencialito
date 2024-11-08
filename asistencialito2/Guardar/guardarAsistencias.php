<?php
require_once "../conexion.php";
require_once "../Clases/Asistencia.php";


    if (session_status() === PHP_SESSION_NONE) {
        session_start();
    }
        $_POST['checkAsistencia'];
        $asistencia = $_POST['checkAsistencia'];
            if (isset($_SESSION['materias_id'])) {
                $idMateria = $_SESSION['materias_id'];
            } else {
                exit();
            }

            $fecha_asistencia = date('Y-M-D');

            $nuevaAsistencia = new Asistencia();
            foreach ($asistencia as $id_alumno) {
                $nuevaAsistencia->guardarAsistencia($id_alumno, $idMateria, $fecha_asistencia, true);
            }
                
            header("Location: ../mostrarAusentesPresentes.php");
            exit();
?>
