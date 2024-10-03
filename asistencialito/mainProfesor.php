<?php

require_once 'conexion.php';

    $database = new Database();
    $conn = $database->connect();

if ($_SERVER["REQUEST_METHOD"] == "POST"){

    $email = ($_POST["email"]);
    $contrasena = ($_POST["contrasena"]);

    try {

        $stmt = $conn->prepare('SELECT * FROM profesores WHERE email = :email');
        $stmt->bindParam(':email', $email, PDO::PARAM_STR);
        $stmt->execute();

        $usuario_db = $stmt->fetch(PDO::FETCH_ASSOC);
    
        if($usuario_db['email'] == $email ){
            
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