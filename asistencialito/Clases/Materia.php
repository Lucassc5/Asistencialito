<?php 

$database = new Database();
$conn = $database->connect();

class Materia {
    
    private $id_materia;
    private $nombre_materia;
    private $id_profesor;
    private $id_institucion;


    public function obtenerMateriaInsitucion($instituciones_id, $conn){

        $query = "SELECT * FROM  materias a inner join institucion b on a.id_institucion = b.id_institucion WHERE a.id_institucion = $instituciones_id";
        $stmt = $conn->prepare($query);
        $stmt->execute();

        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

}
