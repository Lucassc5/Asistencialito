<?php 

    $database = new Database();
    $conn = $database->connect();

class Asistencia {

    public function guardarAsistencia($id_alumno, $id_materia, $fecha_asistencia, $presente){
        global $conn;
        
        $fecha_asistencia = date('Y-m-d', strtotime($fecha_asistencia));

        $sql = "SELECT COUNT(*) FROM asistencias WHERE id_alumno = :id_alumno AND id_materia = :id_materia AND fecha_asistencia = :fecha_asistencia";
        $stmt = $conn->prepare($sql);
        $stmt->bindParam(':id_alumno', $id_alumno, PDO::PARAM_INT);
        $stmt->bindParam(':id_materia', $id_materia, PDO::PARAM_INT);
        $stmt->bindParam(':fecha_asistencia', $fecha_asistencia, PDO::PARAM_STR); // Cambiado a PARAM_STR
        $stmt->execute();
        $existe = $stmt->fetchColumn(); // Usa fetchColumn para obtener el valor directamente
    
        if ($existe > 0) {
            return false;
        } else {
            // No es necesario cerrar explícitamente $stmt; se liberará automáticamente
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
}