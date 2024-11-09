<?php
require_once 'conexion.php';
require_once "Clases/Alumno.php";

    $_POST['id_alumno'];
    
    $idAlumno = $_POST['id_alumno'];
    $alumno = new Alumno();
    $datosAlumno = $alumno->obtenerAlumnoId($idAlumno, $conn);


if (!$datosAlumno) {
    echo "Alumno no encontrado";
    exit();
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="Resources\Styles\editarAlumno.css">
</head>
<body>

        <h2>Editar Alumno</h2>

    <form action="../Guardar/guardarAlumnoEditado.php" method="POST">

        <input type="hidden" name="id_alumno" value="<?php echo htmlspecialchars($datosAlumno['id_alumno']); ?>">
        <br>
        Nombre: <input type="text" name="nombre_alumno" value="<?php echo htmlspecialchars($datosAlumno['nombre_alumno']); ?>" >
        <br>
        Apellido: <input type="text" name="apellido_alumno" value="<?php echo htmlspecialchars($datosAlumno['apellido_alumno']); ?>" >
        <br>
        Fecha de Nacimiento: <input type="date" name="fecha_nacimiento_alumno" value="<?php echo htmlspecialchars($datosAlumno['fecha_nacimiento_alumno']); ?>">
        <br>
        DNI: <input type="text" name="dni_alumno" value="<?php echo htmlspecialchars($datosAlumno['dni_alumno']); ?>" >
        <br>
        <button type="submit">Guardar Cambios</button>
        
    </form>
</body>
</html>
