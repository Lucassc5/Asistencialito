<?php

require_once 'conexion.php';
require_once 'Clases/Profesor.php';

    $database = new Database();
    $conn = $database->connect();

    $email_profesor = ($_POST["email_profesor"]);
    $contrasena_profesor = ($_POST["contrasena_profesor"]);

        $profesor = new Profesor();
        $nuevoProfesor = $profesor->obtenerProfesor($email_profesor, $conn);

                if($nuevoProfesor && $nuevoProfesor['email_profesor'] == $email_profesor && $nuevoProfesor['contrasena_profesor'] == $contrasena_profesor){
                    
                    header("Location: seleccionInstitucion.php");
                    exit();
                } else{
                    echo "Error: contraseña o email inválidos";
                }
?>