<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title> Asistencialito </title>
<link rel="stylesheet" href="Resources\Styles\index.css">
</head>
<body>

    <form action="mainProfesor.php" method="post" id="formulario">

        <h1> Asistencialito </h1>
        <input type="email" name="email_profesor" id="email_profesor" placeholder="Email"  required>
        <br>
        <input type="password" name="contrasena_profesor" id="contrasena_profesor" placeholder="Contraseña" required>
        <br>
        <div id="respuesta">
        </div>
        <input type="submit" name="submit" value="Ingresar">

    </form>

</body>
</html>