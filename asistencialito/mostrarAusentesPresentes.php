<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="Resources\Styles\mostrarAusentesPresentes.css">
</head>
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
    $mesActual = date('m'); 
    $diaActual = date('d'); 
    $alumno = new Alumno();
    $nuevoAlumno = $alumno->obtenerAlumnoMateria($idMateria, $conn);
    
    $hayCumpleanios = false; 
    $nombresCumpleanios = []; 

    foreach ($nuevoAlumno as $alumnoTotal) {
        $id_alumno = $alumnoTotal['id_alumno'];
        $presentes = $alumno->obtenerAlumnosPresentes($id_alumno, $conn, $fecha_asistencia);
        
        if ($presentes['COUNT(*)'] === 1) {
            $fecha_nacimiento = new DateTime($alumnoTotal['fecha_nacimiento_alumno']);
            $mes_nacimiento = $fecha_nacimiento->format('m');
            $dia_nacimiento = $fecha_nacimiento->format('d');

            if ($mes_nacimiento === $mesActual && $dia_nacimiento === $diaActual) {
                $hayCumpleanios = true; 
                $nombresCumpleanios[] = htmlspecialchars($alumnoTotal['nombre_alumno']);
            }
            
            echo "<tr>";
            echo "<td>" . htmlspecialchars($alumnoTotal['id_alumno']) . "</td>";
            echo "<td>" . htmlspecialchars($alumnoTotal['nombre_alumno']) . "</td>";
            echo "<td>" . htmlspecialchars($alumnoTotal['apellido_alumno']) . "</td>";
            echo "<td>" . htmlspecialchars($alumnoTotal['fecha_nacimiento_alumno']) . "</td>";
            echo "<td>" . htmlspecialchars($alumnoTotal['dni_alumno']) . "</td>";
            echo "</tr>";
        }
    }
    
        if ($hayCumpleanios) {
            $nombresString = implode(', ', $nombresCumpleanios);
            echo "<script>alert('¡Feliz cumpleaños a: " . $nombresString . "!');</script>";
        }
    ?>
</table>

<?php if($presentes['COUNT(*)'] === 0){ ?>

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
<?php } else 
        echo "No hay alumnos ausentes";?>
    <div id="container_salir">
        <a href="paginaMain.php" class="salir">Salir</a>
    </div>
</body>
</html>