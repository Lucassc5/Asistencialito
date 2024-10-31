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

<?php

    require_once"conexion.php";

    $database = new Database();
    $conn = $database->connect();

    $stmt_alumno = $conn->prepare('SELECT id_alumno, nombre_alumno, apellido_alumno, fecha_nacimiento_alumno FROM alumnos');
    $stmt_alumno->execute();
    $resultado = $stmt_alumno->fetchAll(PDO::FETCH_ASSOC);


if (count($resultado) > 0) {
    echo "<form method='POST' action=''>";
    echo "<table>";
    echo "<tr><th>Id</th><th>Nombre</th><th>Apellido</th><th>Nota 1</th><th>Nota 2</th><th>Nota 3</th><th>Estado de promocion</th></tr>";

    foreach ($resultado as $row) {
        echo "<tr>";
        echo "<td>" . $row['id_alumno'] . "</td>";
        echo "<td>" . $row['nombre_alumno'] . "</td>";
        echo "<td>" . $row['apellido_alumno'] . "</td>";
        echo "<td> <input type='number' class='nota1' placeholder='Nota 1'> </td>";
        echo "<td> <input type='number' class='nota2' placeholder='Nota 2'> </td>";
        echo "<td> <input type='number' class='nota3' placeholder='Nota 3'> </td>";
        echo "<td>  </td>";
        
        echo "</tr>";
    }
    echo "</table>";
    echo "<button id='guardarNota' name='guardarNota' class='guardarNota'> Guardar Nota </button>";
    echo "</form>";
} else {
    echo "No se encontraron alumnos";
} 




?>