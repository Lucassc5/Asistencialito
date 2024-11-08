<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title> Estado de los Alumnos </title>
</head>
<style>
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

    #container_salir {
        width: 100px;
        bottom: 20px;
        left: 20px;
    }
    
    .salir {
        background-color: #d32f2f; /* Rojo para botón salir */
    }
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
</style>

<body>

    <h1 >Estado de los Alumnos </h1>

        <table>
            <tr>
                <th>Id</th>
                <th>Nombre</th>
                <th>Apellido</th>
                <th>Nota 1</th>
                <th>Nota 2</th>
                <th>Nota 3</th>
                <th>Porcentaje Asistencias</th>
                <th>Estado</th>
                
            </tr>
            <?php
            require_once "conexion.php";
            require_once "Clases/Alumno.php";
            require_once "Clases/Nota.php";
            require_once "Clases/Ram.php";

            if (session_status() === PHP_SESSION_NONE){
                session_start();
            }
                
                $total_dias = $_POST['diasTotales'];
                $_SESSION['materias_id'];
                $idMateria = $_SESSION['materias_id'];
                $fecha_asistencia = date('Y-m-d');
                $alumno = new Alumno();
                $alumnoMateria = $alumno->obtenerAlumnoMateria($idMateria, $conn);
                $notas = new Notas();
                $ram = new Ram();
                $nuevaRam = $ram->obtenerRam( $conn);    
                

                foreach ($alumnoMateria as $alumnoTotal) {
                    $totalAsistencias = 0;
                    $id_alumno = $alumnoTotal['id_alumno'];
                    $notasAlumno = $notas->obtenerNotas($id_alumno, $idMateria, $conn);
                    $presentes = $alumno->obtenerAlumnosPresentes($id_alumno, $conn, $fecha_asistencia);
                   

                        if($presentes['COUNT(*)'] === 1){
                            $totalAsistencias++;
                        }
                            $porcentajeAsistencias = (($totalAsistencias/$total_dias) * 100);
                            

                            $estado = "Libre";

                            if ($notasAlumno['nota1'] < $nuevaRam['nota_libre'] ||
                                $notasAlumno['nota2'] < $nuevaRam['nota_libre'] ||
                                $notasAlumno['nota3'] < $nuevaRam['nota_libre']) {
                                $estado = "Libre";
                            }
                                elseif ($notasAlumno['nota1'] >= $nuevaRam['nota_regular'] && $notasAlumno['nota1'] <= $nuevaRam['nota_promocion'] &&
                                        $notasAlumno['nota2'] >= $nuevaRam['nota_regular'] && $notasAlumno['nota2'] <= $nuevaRam['nota_promocion'] &&
                                        $notasAlumno['nota3'] >= $nuevaRam['nota_regular'] && $notasAlumno['nota3'] <= $nuevaRam['nota_promocion']) {
                                    $estado = "Regular";
                                }
                                elseif ($notasAlumno['nota1'] >= $nuevaRam['nota_promocion'] &&
                                        $notasAlumno['nota2'] >= $nuevaRam['nota_promocion'] &&
                                        $notasAlumno['nota3'] >= $nuevaRam['nota_promocion']) {
                                    $estado = "Promocionado";
                                }


                            echo "<tr>";
                            echo "<td>" . htmlspecialchars($alumnoTotal['id_alumno']) . "</td>";
                            echo "<td>" . htmlspecialchars($alumnoTotal['nombre_alumno']) . "</td>";
                            echo "<td>" . htmlspecialchars($alumnoTotal['apellido_alumno']) . "</td>";
                            echo "<td>" . ($notasAlumno['nota1'] ?? '') . "</td>";
                            echo "<td>" . ($notasAlumno['nota2'] ?? '') . "</td>"; 
                            echo "<td>" . ($notasAlumno['nota3'] ?? '') . "</td>"; 
                            echo "<td> $porcentajeAsistencias %</td>";
                            echo "<td> $estado </td>";
                            echo "</tr>";
                    }
            ?>
        </table>
        <div id="container_salir">
            <a href="paginaMain.php" class="salir">Salir</a>
        </div>
</body>
</html>