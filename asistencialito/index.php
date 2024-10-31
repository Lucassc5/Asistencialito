<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title> Sistema do Assistenciao </title>
<link rel="stylesheet" href="Resources\Styles\index.css">
</head>


<body>

    <form action="mainProfesor.php" method="post" id="formulario">

    <h1> Asistencialito </h1>
    <input type="text" name="email_profesor" id="email_profesor" placeholder="Email">
    <br>
    <input type="password" name="contrasena_profesor" id="contrasena_profesor" placeholder="Contraseña">
    <br>
    <div id="respuesta">
    
    </div>
    <input type="submit" name="submit" value="Ingresar">
    <p>¿No estas registado?</p>
    <a href="formularioRegistro.php">Registrar</a>

    </form>


</body>
</html>