<?php
require_once 'conexion.php';
require_once 'Clases/Materia.php';

    
    $idInstitucion = $_POST['instituciones_id'];
    $materia = new Materia();
    $materiaInstitucion = $materia->obtenerMateriaInsitucion($idInstitucion, $conn);
    
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

    <form action="idMateria.php" method="post">
    <select name="materias_id">
    <option value="">Seleccione una Materia</option>
    <?php

    if(count($materiaInstitucion) > 0){
        foreach ($materiaInstitucion as $materia){ ?>
           <option value="<?php echo $materia['id_materia'];?>"> <?php echo $materia['nombre_materia'] ?> </option>
        <?php
        }
    }else {
        ?>
        <option value=''>No hay materias registradas</option>
        <?php } ?>
    </select>
    <input type="submit" value="Seleccionar Materia">
    <br>
    <a href="registro.php">Salir</a>
    </form>
</body>
</html>