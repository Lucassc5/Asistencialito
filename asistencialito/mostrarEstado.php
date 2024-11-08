<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title> Estado de los Alumnos </title>
    <link rel="stylesheet" href="Resources\Styles\mostrarEstado.css">
</head>

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
            require_once "Clases/Asistencia.php";
            require_once "Clases/Ram.php";

            if (session_status() === PHP_SESSION_NONE){
                session_start();
            }
                
                $total_dias = $_POST['diasTotales'];
                $_SESSION['materias_id'];
                $idMateria = $_SESSION['materias_id'];

                $alumno = new Alumno();
                $notas = new Notas();
                $ram = new Ram();
                $asistencia = new Asistencia();

                $alumnoMateria = $alumno->obtenerAlumnoMateria($idMateria, $conn);
                $nuevaRam = $ram->obtenerRam($conn);    

                foreach ($alumnoMateria as $alumnoTotal) {
                    
                    $id_alumno = $alumnoTotal['id_alumno'];
                    $notasAlumno = $notas->obtenerNotas($id_alumno, $idMateria, $conn);
                    $asistenciaAlumno = $asistencia->obtenerPorcentajeAsistencias($id_alumno, $idMateria, $total_dias);  
                    
                                if (
                                    $notasAlumno['nota1'] >= $nuevaRam['nota_promocion'] &&
                                    $notasAlumno['nota2'] >= $nuevaRam['nota_promocion'] &&
                                    $notasAlumno['nota3'] >= $nuevaRam['nota_promocion'] &&
                                    $asistenciaAlumno >= $nuevaRam['porcentaje_promocion']) {
                                    $estado = "Promocionado";
                                }
                                elseif(
                                    $notasAlumno['nota1'] >= $nuevaRam['nota_regular'] &&
                                    $notasAlumno['nota2'] >= $nuevaRam['nota_regular'] &&
                                    $notasAlumno['nota3'] >= $nuevaRam['nota_regular'] &&
                                    $asistenciaAlumno >= $nuevaRam['porcentaje_regular'] ) {
                                $estado = "Regular";
                                }else{
                                    $estado = "Libre";
                                }

                            echo "<tr>";
                            echo "<td>" . htmlspecialchars($alumnoTotal['id_alumno']) . "</td>";
                            echo "<td>" . htmlspecialchars($alumnoTotal['nombre_alumno']) . "</td>";
                            echo "<td>" . htmlspecialchars($alumnoTotal['apellido_alumno']) . "</td>";
                            echo "<td>" . ($notasAlumno['nota1'] ) . "</td>";
                            echo "<td>" . ($notasAlumno['nota2'] ) . "</td>"; 
                            echo "<td>" . ($notasAlumno['nota3'] ) . "</td>"; 
                            echo "<td> $asistenciaAlumno %</td>";
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