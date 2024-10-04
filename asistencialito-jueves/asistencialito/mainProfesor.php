<?php

require_once 'conexion.php';

    $database = new Database();
    $conn = $database->connect();

if ($_SERVER["REQUEST_METHOD"] == "POST"){

    $email_profesor = ($_POST["email_profesor"]);
    $contrasena_profesor = ($_POST["contrasena_profesor"]);

    try {

        $stmt = $conn->prepare('SELECT * FROM profesores WHERE email_profesor = :email_profesor');
        $stmt->bindParam(':email_profesor', $email_profesor, PDO::PARAM_STR);
        $stmt->execute();

        $usuario_db = $stmt->fetch(PDO::FETCH_ASSOC);
    
        if($usuario_db['email_profesor'] == $email_profesor ){
            
            //echo "Login echo correctamente";

            //header("Location: registroAlumno.php");
            //exit();
            header("Location: registro.php");
            exit();
        } else{
            echo "Error: contraseña o email inválidos";
        }
    } catch (PDOException $e){
        echo "Error de conexion: ". $e->getMessage();
    }

} else {
    echo "Error al recibir valores por POST.";
}

?>