<?php
require_once 'conexion.php';

    $database = new Database();
    $conn = $database->connect();

    $stmt_materia = $conn->prepare('SELECT id_materia, nombre_materia FROM materias');
    $stmt_materia->execute();
    $resultado = $stmt_materia->fetchAll(PDO::FETCH_ASSOC);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    
    <h2>Seleccionar Materias</h2>

    <form action="registrarAlumno.php" method="post">

    <select name="materias" id="">
    <?php

    if(count($resultado) > 0){
        foreach ($resultado as $row){
            echo "<option value='" . $row['id_materia'] . "'>" . $row['nombre_materia'] . "</option>"; 
        }
    }else {
        echo "<option value=''>No hay materias registradas</option>";
        }
    ?>
    </select>
    <input type="submit" value="Seleccionar Materia">
    <br>
    <a href="registro.php">Salir</a>
    </form>
</body>
</html>