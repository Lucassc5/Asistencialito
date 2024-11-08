<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<style>
        /* Estilos generales */
    body {
        font-family: Arial, sans-serif;
        background-color: #e0f7fa; /* Azul claro */
        margin: 0;
        padding: 0;
        display: flex;
        flex-direction: column;
        align-items: center;
    }

    /* Contenedor principal del título */
    #container_titulo {
        width: 100%;
        background-color: #00796b; /* Azul oscuro */
        color: #ffffff;
        padding: 10px;
        text-align: center;
    }

    h3 {
        margin: 0;
        font-size: 24px;
    }

    /* Botones */
    a {
        display: block;
        padding: 10px 20px;
        text-decoration: none;
        color: #ffffff;
        text-align: center;
        border-radius: 5px;
        font-weight: bold;
        margin: 10px 0;
    }

    .mostrarAlumnos{
        background-color: #0288d1;
    }

    
    /* Estilos de botones */
    .alumnos, .crear, .notasAlumnos, .estado {
        background-color: #0288d1; /* Azul medio */
    }

    .salir {
        background-color: #d32f2f; /* Rojo para botón salir */
    }

    /* Posicionamiento de los botones */
    #container_alumnos,
    #container_crear {
        width: 200px;
        position: absolute;
        left: 20px;
    }

    #container_alumnos {
        top: 100px;
    }

    #container_crear {
        top: 160px;
    }

    #container_asistencia,
    #container_notas,
    #container_estado {
        width: 200px;
        position: absolute;
        right: 20px;
    }

    #container_asistencia {
        top: 100px;
    }

    #container_notas {
        top: 160px;
    }

    #container_estado {
        top: 220px;
    }

    /* Posicionamiento del botón Salir */
    #container_salir {
        width: 100px;
        position: absolute;
        bottom: 20px;
        left: 20px;
    }

</style>
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
            <input type="submit" id="estado" value="Mostrar Estado">
        </form>
    </div>
    <div id="mostrar_estado">
    </div>

    <div id="container_salir">
    <a href="seleccionInstitucion.php" class="salir">Salir</a>
    </div>

    <script src="Resources\Fn\mostrarAlumnos.js"></script>
    <script src="Resources\Fn\alumnos.js"></script>
    <script src="Resources\Fn\notasAlumnos.js"></script>
    <script src="Resources\Fn\mostrarEstado.js"></script>
    <script src="Resources\Fn\mostrarAusentes.js"></script>
   
</body>
</html>