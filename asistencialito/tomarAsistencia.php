<?php

    require_once "conexion.php";
    require_once "Clases/Alumno.php";

    if (session_status() === PHP_SESSION_NONE) {
        session_start();
    }
        if (isset($_SESSION['materias_id'])) {
            $idMateria = $_SESSION['materias_id'];
            
            $alumno = new Alumno();
            $alumnoMateria = $alumno->obtenerAlumnoMateria($idMateria, $conn);
        } else {
            exit();
        }

    ?>
        <!DOCTYPE html>
        <html lang="es">
        <head>
            <meta charset="UTF-8">
            <meta name="viewport" content="width=device-width, initial-scale=1.0">
            <title>Registrar Asistencia</title>
            <link rel="stylesheet" href="Resources\Styles\tomarAsistencia.css">
        </head>
        <body>
            <h1>Registrar Asistencia</h1>
        
            <form method="POST" action="Guardar/guardarAsistencias.php">
                <table>
                    <thead>
                        <tr>
                            <th>Id</th>
                            <th>Nombre</th>
                            <th>Apellido</th>
                            <th>Fecha de Nacimiento</th>
                            <th>DNI</th>
                            <th>Presente/Ausente</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($alumnoMateria as $alumno): ?>
                            <tr>
                                <td><?php echo htmlspecialchars($alumno['id_alumno']); ?></td>
                                <td><?php echo htmlspecialchars($alumno['nombre_alumno']); ?></td>
                                <td><?php echo htmlspecialchars($alumno['apellido_alumno']); ?></td>
                                <td><?php echo htmlspecialchars($alumno['fecha_nacimiento_alumno']); ?></td>
                                <td><?php echo htmlspecialchars($alumno['dni_alumno']); ?></td>
                                <td>
                                    <input type="checkbox" name="checkAsistencia[]" value="<?php echo htmlspecialchars($alumno['id_alumno']); ?>">
                                </td>
                            </tr>
                        <?php endforeach; ?>
                        
                    </tbody>
                </table>
                <button type="submit" id='enviarAsistencia' name='enviarAsistencia' class='enviarAsistencia' onclick="return confirm('¿Estas seguro de guardar la asistencia?');" >Enviar Asistencia</button>
            </form>
        </body>
        </html>