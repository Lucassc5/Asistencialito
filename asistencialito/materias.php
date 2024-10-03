<?php
require_once 'conexion.php';

    $database = new Database();
    $conn = $database->connect();

    $sql = "SELECT id_institucion, nombre FROM institucion";
    $resultado = $conn->query($sql);
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

    <div>
    <?php
        if ($resultado->num_rows > 0) {
            while($row = $resultado->fetch_assoc()){
                echo "<li>" . $row['nombre_materia'] . "</li>"; 
            }
        } else {
            echo "<li>No hay materias disponibles para esta institución.</li>"; 
        }
    ?>
    </div>

</body>
</html>