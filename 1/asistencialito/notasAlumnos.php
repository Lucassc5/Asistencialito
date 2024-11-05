<style>
    .guardarNota {
        display: inline-block;
        padding: 8px 8px;
        background-color: #1eadff; 
        color: #ffffff; 
        text-decoration: none; /* Saca el subrayado del enlace */
        border-radius: 5px;
        font-size: 13px;
        transition: background-color 0.3s ease; /* Transición para el efecto hover */
    }
    </style>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Guardar Notas de Alumnos</title>
</head>
<body>

    <h1>Guardar Notas de Alumnos</h1>

    <form method="POST" action="Guardar/guardarNotas.php">
        <table>
            <tr>
                <th>Id</th>
                <th>Nombre</th>
                <th>Apellido</th>
                <th>Nota 1</th>
                <th>Nota 2</th>
                <th>Nota 3</th>
                
            </tr>
            <?php
            require_once "conexion.php";
            require_once "Clases/Alumno.php";
            require_once "Clases/Nota.php";

            if (session_status() === PHP_SESSION_NONE){
                session_start();
            }
            if (isset($_SESSION['materias_id'])) {
                $idMateria = $_SESSION['materias_id'];
                
                $alumno = new Alumno();
                $alumnoMateria = $alumno->obtenerAlumnoMateria($idMateria, $conn);
                $notas = new Notas();
                
                foreach ($alumnoMateria as $alumno) {
                        
                    $notasAlumno = $notas->obtenerNotas($alumno['id_alumno'], $idMateria, $conn);
                        
                        echo "<tr>";
                        echo "<td>" . htmlspecialchars($alumno['id_alumno']) . "</td>";
                        echo "<td>" . htmlspecialchars($alumno['nombre_alumno']) . "</td>";
                        echo "<td>" . htmlspecialchars($alumno['apellido_alumno']) . "</td>";
                        echo "<td><input type='number' class='nota1' name='nota1[{$alumno['id_alumno']}]' value='" . (!empty($notasAlumno['nota1']) && $notasAlumno['nota1'] != 0 ? rtrim(rtrim(number_format($notasAlumno['nota1'], 6, '.', ''), '0'), '.') : '') . "' placeholder='Nota 1' ></td>";
                        echo "<td><input type='number' class='nota2' name='nota2[{$alumno['id_alumno']}]' value='" . (!empty($notasAlumno['nota2']) && $notasAlumno['nota2'] != 0 ? rtrim(rtrim(number_format($notasAlumno['nota2'], 6, '.', ''), '0'), '.') : '') . "' placeholder='Nota 2' ></td>";
                        echo "<td><input type='number' class='nota3' name='nota3[{$alumno['id_alumno']}]' value='" . (!empty($notasAlumno['nota3']) && $notasAlumno['nota3'] != 0 ? rtrim(rtrim(number_format($notasAlumno['nota3'], 6, '.', ''), '0'), '.') : '') . "' placeholder='Nota 3' ></td>";
                        echo "</tr>";
                    }
                
            } else {
                echo "<tr><td colspan='7'>No se ha seleccionado ninguna materia.</td></tr>";
            }
            ?>
        </table>
        <button id="guardarNota" name="guardarNota" class="guardarNota">Guardar Nota</button>
    </form>
</body>
</html>