<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title> Sistema do Assistenciao </title>
</head>

<body>

    <form action="mainProfesor.php" method="post" id="formulario">

    <h1> Asistencialito </h1>
    <input type="text" name="email" id="email" placeholder="Email">
    <br>
    <input type="password" name="contrasena" id="contrasena" placeholder="Contraseña">
    <br>
    <div class="mt-3" id="respuesta">
    
    </div>
    <input type="submit" name="submit" value="Ingresar">
    <p>¿No estas registado?</p>
    <a href="formularioRegistro.php">Registrar</a>

    </form>

    <script src="Resources\Fn\fn.js"></script>

</body>
</html>