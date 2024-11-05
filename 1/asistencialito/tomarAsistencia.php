<style>
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
    </style>
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
            <link rel="stylesheet" href="styles.css"> <!-- Si tienes un archivo CSS, puedes enlazarlo aquí -->
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
                        <?php foreach ($alumnoMateria as $row): ?>
                            <tr>
                                <td><?php echo htmlspecialchars($row['id_alumno']); ?></td>
                                <td><?php echo htmlspecialchars($row['nombre_alumno']); ?></td>
                                <td><?php echo htmlspecialchars($row['apellido_alumno']); ?></td>
                                <td><?php echo htmlspecialchars($row['fecha_nacimiento_alumno']); ?></td>
                                <td><?php echo htmlspecialchars($row['dni_alumno']); ?></td>
                                <td>
                                    <input type="checkbox" name="checkAsistencia[]" value="<?php echo htmlspecialchars($row['id_alumno']); ?>">
                                </td>
                            </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
                <button type="submit" id='enviarAsistencia' name='enviarAsistencia' class='enviarAsistencia' >Enviar Asistencia</button>
            </form>
        </body>
        </html>