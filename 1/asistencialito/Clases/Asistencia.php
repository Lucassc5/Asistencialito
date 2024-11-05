<?php 
    require_once "conexion.php";

    $database = new Database();
    $conn = $database->connect();

class Asistencia {

    public function guardarAsistencia($id_alumno, $id_materia, $fecha_asistencia, $presente){
        global $conn;

        if ($conn === null) {
            throw new Exception("La conexión a la base de datos no está disponible.");
        }

       $query = "INSERT INTO asistencias (id_alumno, id_materia, fecha_asistencia, presente) 
                    VALUES (:id_alumno, :id_materia, :fecha_asistencia, :presente)";

        $stmt = $conn->prepare($query);
        $stmt->bindParam(':id_alumno', $id_alumno, PDO::PARAM_INT);
        $stmt->bindParam(':id_materia', $id_materia, PDO::PARAM_INT);
        $stmt->bindParam(':fecha_asistencia', $fecha_asistencia, PDO::PARAM_STR);
        $stmt->bindParam(':presente', $presente, PDO::PARAM_BOOL);

        return $stmt->execute();
    }
}