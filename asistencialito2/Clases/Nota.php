<?php 

$database = new Database();
$conn = $database->connect();

class Notas {

    public function guardarNotas($id_alumno, $id_materia, $nota1, $nota2, $nota3){
        global $conn;

        $query = "SELECT COUNT(*) FROM notas WHERE id_alumno = :id_alumno AND id_materia = :id_materia";
        $stmt = $conn->prepare($query);
        $stmt->bindParam(':id_alumno', $id_alumno, PDO::PARAM_INT);
        $stmt->bindParam(':id_materia', $id_materia, PDO::PARAM_INT);
        $stmt->execute();
        $exists = $stmt->fetchColumn();

            if($exists){
                $query = "UPDATE notas SET nota1 = :nota1, nota2 = :nota2, nota3 = :nota3 
                          WHERE id_alumno = :id_alumno AND id_materia = :id_materia";
            } else{
                $query = "INSERT INTO notas (id_alumno, id_materia, nota1, nota2, nota3) 
                  VALUES (:id_alumno, :id_materia, :nota1, :nota2, :nota3)";
            }

        $stmt = $conn->prepare($query);
        $stmt->bindParam(':id_alumno', $id_alumno, PDO::PARAM_INT);
        $stmt->bindParam(':id_materia', $id_materia, PDO::PARAM_INT);
        $stmt->bindParam(':nota1', $nota1, PDO::PARAM_INT);
        $stmt->bindParam(':nota2', $nota2, PDO::PARAM_INT);
        $stmt->bindParam(':nota3', $nota3, PDO::PARAM_INT);

        return $stmt->execute();
    }
    
    function editarNotas($id_materia, $id_alumno, $nota1, $nota2, $nota3) {
        global $conn;
        $query = "UPDATE notas SET nota1 = :nota1, nota2 = :nota2, nota3 = :nota3 
                  WHERE id_alumno = :id_alumno AND id_materia = :id_materia";
        
        $stmt = $conn->prepare($query);
        $stmt->bindParam(':id_alumno', $id_alumno, PDO::PARAM_STR);
        $stmt->bindParam(':id_materia', $id_materia, PDO::PARAM_STR);
        $stmt->bindParam(':nota1', $nota1);
        $stmt->bindParam(':nota2', $nota2);
        $stmt->bindParam(':nota3', $nota3);
        

        return $stmt->execute();
    }

    public function obtenerNotas($id_alumno, $id_materia) {
        global $conn;

        $query = "SELECT nota1, nota2, nota3 FROM notas WHERE id_alumno = :id_alumno AND id_materia = :id_materia";
        $stmt = $conn->prepare($query);
        $stmt->bindParam(':id_alumno', $id_alumno, PDO::PARAM_INT);
        $stmt->bindParam(':id_materia', $id_materia, PDO::PARAM_INT);
        $stmt->execute();

        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    public function obtenerNotasId($id_nota, $conn){
        global $conn;

        $query = "SELECT * FROM notas WHERE id_notas = :id_notas";

        $stmt = $conn->prepare($query);
        $stmt->bindParam(':id_nota', $id_nota, PDO::PARAM_INT);
        $stmt->execute();
        
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

}