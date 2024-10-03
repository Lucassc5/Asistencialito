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

    <form action="guardarAlumno" method="post">

    <input type="text" name="nombre" id="nombre" placeholder="Nombre">
    <br>
    <input type="text" name="apellido" id="apellido" placeholder="Apellido">
    <br>
    <input type="date" name="fecha_nacimiento" id="fecha_nacimiento" placeholder="Fecha de nacimiento">
    <br>
    <input type="submit" name="submit" value="Registrarse">
    </form>

</body>
</html>
