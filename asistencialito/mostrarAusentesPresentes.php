<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<style>
    a {
        display: block;
        padding: 10px 10px;
        text-decoration: none;
        color: #ffffff;
        text-align: center;
        border-radius: 5px;
        font-weight: bold;
        margin: 10px 0;
    }

    #container_presentes {
        width: 99%;
        padding: 10px;
        text-align: center;
        background-color: #0288d1;
        border-radius: 10px;
    }

    #container_ausentes {
        width: 99%;
        padding: 10px;
        text-align: center;
        background-color: #0288d1;
        border-radius: 10px;
    }

    .salir {
        background-color: #d32f2f; 
    }

    #container_salir {
        width: 70px;
        bottom: 20px;
        left: 20px;
    }

    .enviarAsistencia {
        display: inline-block;
        padding: 8px 8px;
        background-color: #1eadff; 
        color: #ffffff; 
        text-decoration: none; /* Saca el subrayado del enlace */
        border-radius: 5px;
        font-size: 13px;
        transition: background-color 0.3s ease; /* Transición para el efecto hover */
    }
        /* Estilo general para las tablas */
    table {
        width: 100%;
        border-collapse: collapse;
        margin: 20px 0;
        background-color: #ffffff; /* Fondo blanco para la tabla */
        box-shadow: 0px 4px 6px rgba(0, 0, 0, 0.1); /* Sombra ligera */
    }

    /* Estilo para los encabezados de la tabla */
    th {
        background-color: #0288d1; /* Azul medio */
        color: white;
        padding: 12px;
        text-align: left;
        font-weight: bold;
    }

    /* Estilo para las celdas de la tabla */
    td {
        padding: 12px;
        text-align: left;
        border-bottom: 1px solid #ddd; /* Línea divisoria */
    }

    /* Efecto hover para las filas de la tabla */
    tr:hover {
        background-color: #f1f1f1; /* Color de fondo cuando el mouse pasa sobre la fila */
    }

    /* Estilo para las filas pares */
    tr:nth-child(even) {
        background-color: #f9f9f9; /* Fondo claro para filas pares */
    }

    /* Bordes de la tabla */
    table, th, td {
        border: 1px solid #0288d1; /* Borde azul */
    }

    /* Estilo para las celdas que contienen botones u otras interacciones */
    td button {
        background-color: #00796b; /* Azul oscuro */
        color: white;
        border: none;
        padding: 8px 16px;
        border-radius: 4px;
        cursor: pointer;
    }

    /* Cambio de color en botones al hacer hover */
    td button:hover {
        background-color: #004d40; /* Cambio a un azul aún más oscuro */
    }

</style>
<body>

    <div id="container_presentes">
        <h2> Alumnos Presentes <style></style></h2>
    </div>
    <table>
        <tr> 
            <th>Id</th>
            <th>Nombre</th>
            <th>Apellido</th>
            <th>Fecha de Nacimiento</th>
            <th>DNI</th>
        </tr>
            <?php
            require_once "conexion.php";
            require_once "Clases/Alumno.php";

            if (session_status() === PHP_SESSION_NONE) {
                session_start();
            }

            $idMateria = $_SESSION['materias_id'];
            $fecha_asistencia = date('Y-m-d');
            $alumno = new Alumno();
            $nuevoAlumno = $alumno->obtenerAlumnoMateria($idMateria, $conn);
                
                foreach ($nuevoAlumno as $alumnoTotal) {
                    $id_alumno = $alumnoTotal['id_alumno'];
                    $presentes = $alumno->obtenerAlumnosPresentes($id_alumno, $conn, $fecha_asistencia);
                    
                    if ($presentes['COUNT(*)'] === 1) {
                        echo "<tr>";
                        echo "<td>" . htmlspecialchars($alumnoTotal['id_alumno']) . "</td>";
                        echo "<td>" . htmlspecialchars($alumnoTotal['nombre_alumno']) . "</td>";
                        echo "<td>" . htmlspecialchars($alumnoTotal['apellido_alumno']) . "</td>";
                        echo "<td>" . htmlspecialchars($alumnoTotal['fecha_nacimiento_alumno']) . "</td>";
                        echo "<td>" . htmlspecialchars($alumnoTotal['dni_alumno']) . "</td>";
                        echo "</tr>";
                    }
                }
            ?>
    </table>


    <div id="container_ausentes">
        <h2> Alumnos Ausentes </h2>
    </div>
    <table>
        <tr> 
            <th>Id</th>
            <th>Nombre</th>
            <th>Apellido</th>
            <th>Fecha de Nacimiento</th>
            <th>DNI</th>
        </tr>
            <?php
            require_once "conexion.php";
            require_once "Clases/Alumno.php";

            if (session_status() === PHP_SESSION_NONE) {
                session_start();
            }

            $idMateria = $_SESSION['materias_id'];
            $fecha_asistencia = date('Y-m-d');
            $alumno = new Alumno();
            $nuevoAlumno = $alumno->obtenerAlumnoMateria($idMateria, $conn);
                
                foreach ($nuevoAlumno as $alumnoTotal) {
                    $id_alumno = $alumnoTotal['id_alumno'];
                    $presentes = $alumno->obtenerAlumnosPresentes($id_alumno, $conn, $fecha_asistencia);
                    
                    if ($presentes['COUNT(*)'] === 0) {
                        echo "<tr>";
                        echo "<td>" . htmlspecialchars($alumnoTotal['id_alumno']) . "</td>";
                        echo "<td>" . htmlspecialchars($alumnoTotal['nombre_alumno']) . "</td>";
                        echo "<td>" . htmlspecialchars($alumnoTotal['apellido_alumno']) . "</td>";
                        echo "<td>" . htmlspecialchars($alumnoTotal['fecha_nacimiento_alumno']) . "</td>";
                        echo "<td>" . htmlspecialchars($alumnoTotal['dni_alumno']) . "</td>";
                        echo "</tr>";
                    }
                }
            ?>
    </table>
    <div id="container_salir">
        <a href="paginaMain.php" class="salir">Salir</a>
    </div>
</body>
</html>