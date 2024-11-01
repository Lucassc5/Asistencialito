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

    require_once"conexion.php";

    $database = new Database();
    $conn = $database->connect();

    $stmt_alumno = $conn->prepare('SELECT id_alumno, nombre_alumno, apellido_alumno, fecha_nacimiento_alumno FROM alumnos');
    $stmt_alumno->execute();
    $resultado = $stmt_alumno->fetchAll(PDO::FETCH_ASSOC);


if (count($resultado) > 0) {
    echo "<form method='POST' action='registrarAlumno.php'>";
    echo "<table>";
    echo "<tr><th>Id</th><th>Nombre</th><th>Apellido</th><th>Fecha de Nacimiento</th><th>Presente/Ausente</th></tr>";

    foreach ($resultado as $row) {
        echo "<tr>";
        echo "<td>" . $row['id_alumno'] . "</td>";
        echo "<td>" . $row['nombre_alumno'] . "</td>";
        echo "<td>" . $row['apellido_alumno'] . "</td>";
        echo "<td>" . $row['fecha_nacimiento_alumno'] . "</td>";
        echo "<td><input type='checkbox' class='asistencia' data-id='" . $row['id_alumno'] . "' name='asistencia[" . $row['id_alumno'] . "]' value='1'></td>";
        echo "</tr>";
    }
    echo "</table>";
    echo "<button id='enviarAsistencia' name='enviarAsistencia' class='enviarAsistencia'> Enviar Asistencia </button>";
    echo "</form>";
} else {
    echo "No se encontraron alumnos";
} 

if ($_SERVER["REQUEST_METHOD"] == 'POST' && isset($_POST['enviarAsistencia']) && isset($_POST['asistencia'])) {
    $asistencias = $_POST['asistencia'];
    $contadorDia = 0;
    $id_materia = 1;
    $contarPresente = 0;

    foreach ($asistencias as $id_alumno => $presente) {
        $presente = isset($asistencias[$id_alumno]) ? 1 : 0;
        $contarPresente += $presente;
        

        $sql = "INSERT INTO asistencias (id_alumno, id_materia, fecha_asistencia) VALUES (:id_alumno, :id_materia, CURDATE())";
        $stmt = $conn->prepare($sql);
        $stmt->bindParam(':id_alumno', $id_alumno);
        $stmt->bindParam(':id_materia', $id_materia);
        $stmt->execute();
    }

    //echo "Asistencias guardadas correctamente.";
    //header("Location: traerAlumnos.php");
    exit();
}


?>