<?php
    require_once 'conexion.php';

    //Guardar un "id" en una session.

    session_start();
    
    if (isset($_POST['materias_id'])) { 
        $materias_id = $_POST['materias_id'];
        $_SESSION['materias_id'] = $materias_id; // Guardar el ID en la sesión
       
        header("location: paginaMain.php");
        exit();
    } else {
        echo "ID no enviado.";
    }
?>