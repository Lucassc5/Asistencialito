<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="Resources\Styles\registroAlumnos.css">
</head>

<body>
    <div id="container_titulo">
        <h3>Asistencialito Alumnos</h3>
    </div>


    <div id="container_asistencia">
     <a href="#" class="alumnos" onclick="mostrarAlumnos()">Tomar Asistencia Alumnos</a>
    </div>
    <div id="mostrar_alumnos">
    </div>


    <div id="container_alumnos">
        <a href="#" class="mostrarAlumnos" onclick="alumnos()"> Alumnos </a>
    </div>
    <div id="alumnos_mostrar">
    </div>


    <div id="container_crear">
        <a href="Crear/crearAlumno.php" class='crear'> Crear Alumnos </a>
    </div>


    <div id="container_notas">
     <a href="#" class="notasAlumnos" onclick="notasAlumnos()">Notas Alumnos</a>
    </div>
    <div id="notas_alumnos">
    </div>


        <div id="container_estado">
     <a href="#" class="estado" onclick="mostrarEstado()">Estado Alumnos</a>
    </div>
    <div id="mostrar_estado">
    </div>


    <div id="container_salir">
    <a href="seleccionInstitucion.php" class="salir">Salir</a>
    </div>

    <script src="Resources\Fn\mostrarAlumnos.js"></script>
    <script src="Resources\Fn\notasAlumnos.js"></script>
    <script src="Resources\Fn\alumnos.js"></script>
    <script src="Resources\Fn\mostrarNotas.js"></script>
    <script src="Resources\Fn\mostrarEstado.js"></script>

</body>
</html>