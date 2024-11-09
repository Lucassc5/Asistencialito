<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Asistencialito</title>
    <link rel="stylesheet" href="Resources\Styles\crearAlumno.css">
</head>
<body>
    
    <h3> Registrar Alumnos </h3>

    <form action="Guardar/guardarAlumno.php" method="post">

        <input type="text" name="nombre_alumno" id="nombre_alumno" placeholder="Nombre" maxlength="15" required>
        <br>
        <input type="text" name="apellido_alumno" id="apellido_alumno" placeholder="Apellido" maxlength="15" required>
        <br>
        <input type="date" name="fecha_nacimiento_alumno" id="fecha_nacimiento_alumno" placeholder="Fecha de nacimiento" required>
        <br>
        <input type="number" name="dni_alumno" id="dni_alumno" placeholder="DNI" maxlength="8" required>
        <br>
        <input type="submit" name="submit" value="Registrarse">
        <br>
        <a href="paginaMain.php">Alumno Ya Registrado </a>
    </form>

</body>
</html>