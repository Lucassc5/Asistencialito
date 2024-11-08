<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="Resources/Styles/paginaMain.css">
</head>
<body>
    <div id="container_titulo">
        <marquee><h3>Asistencialito Alumnos</h3></marquee>
    </div>


    <div id="container_asistencia">
     <a href="#" class="alumnos" onclick="mostrarAlumnos()">Tomar Asistencia Alumnos</a>
    </div>
    <div id="mostrar_alumnos">
    </div>


    <div id="container_alumnos">
        <a href="#" class="mostrarAlumnos" onclick="alumnos()"> Alumnos </a>
    </div>
    <div id="alumnos_mostrar" >
    </div>


    <div id="container_crear">
        <a href="crearAlumno.php" class='crear'> Crear Alumnos </a>
    </div>


    <div id="container_notas">
        <a href="#" class="notasAlumnos" onclick="notasAlumnos()">Notas Alumnos</a>
    </div>
    <div id="notas_alumnos" >
    </div>


    <div id="container_estado">
        <form action="mostrarEstado.php" method="post">
            <input type="number" id="diasTotales" name="diasTotales" placeholder="Ingresar Dias Total de Clases" required>
            <input type="submit" id="estado" class="estado" value="Mostrar Estado">
        </form>
    </div>
    <div id="mostrar_estado">
    </div>

    <div id="container_salir">
    <a href="seleccionInstitucion.php" class="salir">Salir</a>
    </div>

    <script src="Resources\fn\fn.js"></script>
   
</body>
</html>