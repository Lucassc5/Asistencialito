<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<link rel="stylesheet" href="Resources\Styles\formularioRegistro.css">

<body>

    <form action="registroProfesor.php" method="post">

    <h2> Registrar Nuevo Profesor </h2>

    <input type="text" name="email_profesor" id="email_profesor" placeholder="Email">
    <br>
    <input type="password" name="contrasena_profesor" id="contrasena_profesor" placeholder="Contraseña">
    <br>
    <input type="text" name="nombre_profesor" id="nombre_profesor" placeholder="Nombre">
    <br>
    <input type="text" name="apellido_profesor" id="apellido_profesor" placeholder="Apellido">
    <br>
    <input type="date" name="fecha_nacimiento_profesor" id="fecha_nacimiento_profesor" placeholder="Fecha de Nacimiento">
    <br>
    <input type="text" name="legajo" id="legajo" placeholder="Legajo">
    <br>
    <input type="submit" name="submit" value="Registrarse">
    <br>
    <a href="index.php">Ya estas registrado</a>

    </form>

    <script src="Traits/Validaciones/validar-profesor.php"></script>

</body>
</html>