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
        $stmt->bindParam(':fecha_asistencia', $fecha_asistencia, PDO::PARAM_STR);
        $existe = $stmt->fetchColumn(); 
    
        if ($existe > 0) {
            return false;
        } else {
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

    public function obtenerPorcentajeAsistencias($id_alumno, $id_materia, $dias){
        global $conn;

        $query = "SELECT COUNT(DISTINCT fecha_asistencia) as ta FROM asistencias WHERE id_alumno = :id_alumno  AND id_materia = :id_materia";

        $stmt = $conn->prepare($query);
        $stmt ->bindParam("id_alumno", $id_alumno, PDO::PARAM_INT);
        $stmt ->bindParam("id_materia", $id_materia, PDO::PARAM_INT);
        $stmt->execute();

        $filas = $stmt->fetch(PDO::FETCH_ASSOC); 
        $total_asistencia = $filas['ta'];

        if($dias > 0){
            $porcentajeAsistencia = ($total_asistencia/$dias)*100;
            return round($porcentajeAsistencia, 2);
        } else{
            return 0;
        }
    }

    public function borrarAsistencia($id_asistencia, $id_alumno) {
        global $conn;

        $query = "DELETE FROM asistencia WHERE id_asistencia = :id_asistencia AND id_alumno = :id_alumno";
        $stmt = $conn->prepare($query);
        $stmt->bindParam(':id_asistenca', $id_asistencia, PDO::PARAM_INT);
        $stmt->bindParam(':id_alumno', $id_alumno, PDO::PARAM_INT);
        
    
        if ($stmt->execute()) {
            echo "Asistencia eliminada correctamente.";
        } else {
            echo "Error al ejecutar la consulta de eliminación.";
        }
    }
}