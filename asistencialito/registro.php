<?php
require_once 'conexion.php';

$database = new Database();
$conn = $database->connect();

$stmt_institucion = $conn->prepare('SELECT id_institucion, nombre_institucion FROM institucion');
$stmt_institucion->execute();
$resultado = $stmt_institucion->fetchAll(PDO::FETCH_ASSOC);

?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Seleccionar Instituciones</title>
</head>

<body>
    
    <h2>Seleccionar Instituciones</h2>

    <form action="materias.php" method="post">
        <select name="instituciones" id="">
            <option value="">Seleccione una institucion</option>
            
            <?php

            if (count($resultado) > 0) {
                foreach ($resultado as $row) {
                    echo "<option value='" . $row['id_institucion'] . "'>" . $row['nombre_institucion'] . "</option>";
                }
            } else {
                echo "<option value=''>No hay instituciones registradas</option>";
            }
            ?>
        </select>

        <input type="submit" value="Seleccionar Institución">
    </form>

    <br>
    <a href="registrarInstitucion.php">Registrar Nueva Institución</a>
    <br>
    <a href="index.php">Salir</a>

</body>
</html>