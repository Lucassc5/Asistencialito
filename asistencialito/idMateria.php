<?php
    require_once 'conexion.php';

    session_start();
    
    if (isset($_POST['materias_id'])) { 
        $materias_id = $_POST['materias_id'];
        $_SESSION['materias_id'] = $materias_id; 
       
        header("location: paginaMain.php");
        exit();
    } else {
        echo "ID no enviado.";
    }
?>