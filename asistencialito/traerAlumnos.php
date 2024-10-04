<?php
    require_once"conexion.php";

    $database = new Database();
    $conn = $database->connect();

    $stmt_alumno = $conn->prepare('SELECT id_alumno, nombre_alumno, apellido_alumno, fecha_nacimiento_alumno, email_alumno FROM alumnos');
    $stmt_alumno->execute();
    $resultado = $stmt_alumno->fetchAll(PDO::FETCH_ASSOC);


if (count($resultado) > 0) {
    echo "<table>";
    echo "<tr><th>Id</th><th>Nombre</th><th>Apellido</th><th>Fecha de Nacimiento</th><th>Email</th><th>Presente/Ausente</th></tr>";

    foreach ($resultado as $row) {
        echo "<tr>";
        echo "<td>" . $row['id_alumno'] . "</td>";
        echo "<td>" . $row['nombre_alumno'] . "</td>";
        echo "<td>" . $row['apellido_alumno'] . "</td>";
        echo "<td>" . $row['fecha_nacimiento_alumno'] . "</td>";
        echo "<td>" . $row['email_alumno'] . "</td>";
        echo "<td>" . '<input type="checkbox" onclick="presenteAusente()" id="checkin">' . "</td>";
        echo "</tr>";
    }
    echo "</table>";
    
} else {
    echo "No se encontraron alumnos";
} 
?>