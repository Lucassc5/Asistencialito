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