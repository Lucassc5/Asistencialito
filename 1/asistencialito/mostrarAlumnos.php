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
        </head>
        <body>
            <h1>Alumnos</h1>
        
            <form method="POST" action="">
                <table>
                    <thead>
                        <tr>
                            <th>Id</th>
                            <th>Nombre</th>
                            <th>Apellido</th>
                            <th>Fecha de Nacimiento</th>
                            <th>DNI</th>
                            <th>Editar/Eliminar</th>
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
                                <td><form action="Eliminar/eliminarAlumno.php" method="POST">
                                        <input type="hidden" name="id_alumno" value="<?php echo $alumno['id_alumno'] ?>">
                                        <button type="submit" onclick="return confirm('¿Borrar alumno?');"> Borrar </button>
                                    </form>
                                    <form action="Editar/editarAlumno.php" method="POST">
                                        <input type="hidden" name="id_alumno" value="<?php echo $alumno['id_alumno'] ?>">
                                        <button type="submit"> Editar </button>
                                    </form>
                                </td>
                                </td>
                            </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
                <a href="paginaMain.php">Salir</a>
            </form>
        </body>
        </html>