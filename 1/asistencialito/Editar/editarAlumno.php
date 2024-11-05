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

<form action="guardarAlumnoEditado.php" method="POST">
    <input type="hidden" name="id_alumno" value="<?php echo htmlspecialchars($datosAlumno['id_alumno']); ?>">
    Nombre: <input type="text" name="nombre_alumno" value="<?php echo htmlspecialchars($datosAlumno['nombre_alumno']); ?>"><br>
    Apellido: <input type="text" name="apellido_alumno" value="<?php echo htmlspecialchars($datosAlumno['apellido_alumno']); ?>"><br>
    Fecha de Nacimiento: <input type="date" name="fecha_nacimiento_alumno" value="<?php echo htmlspecialchars($datosAlumno['fecha_nacimiento_alumno']); ?>"><br>
    DNI: <input type="text" name="dni_alumno" value="<?php echo htmlspecialchars($datosAlumno['dni_alumno']); ?>"><br>
    <button type="submit">Guardar Cambios</button>
</form>