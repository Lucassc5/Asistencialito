<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <h2>Bienvenido Profesor</h2>
    <h3> Registrar Alumnos </h3>

    <form action="guardarAlumno.php" method="post">

    <input type="text" name="nombre_alumno" id="nombre_alumno" placeholder="Nombre">
    <br>
    <input type="text" name="apellido_alumno" id="apellido_alumno" placeholder="Apellido">
    <br>
    <input type="date" name="fecha_nacimiento_alumno" id="fecha_nacimiento_alumno" placeholder="Fecha de nacimiento">
    <br>
    <input type="submit" name="submit" value="Registrarse">
    </form>

</body>
</html>
