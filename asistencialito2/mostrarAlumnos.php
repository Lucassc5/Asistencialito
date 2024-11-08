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

        </style>
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
                                <td>
                                    <form action="Eliminar/eliminarAlumno.php" method="POST" style="display:inline;">
                                        <input type="hidden" name="id_alumno" value="<?php echo $alumno['id_alumno']; ?>">
                                        <button type="submit" onclick="return confirm('¿Borrar alumno?');"> Borrar </button>
                                    </form>
                                    <form action="Editar/editarAlumno.php" method="POST" style="display:inline;">
                                        <input type="hidden" name="id_alumno" value="<?php echo $alumno['id_alumno']; ?>">
                                        <button type="submit"> Editar </button>
                                    </form>
                                </td>
                            </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
                <a href="paginaMain.php">Salir</a>
            </form>
        </body>
        </html>

