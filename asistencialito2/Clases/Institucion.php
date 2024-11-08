<?php

class Institucion {

    private $nombre_institucion;
    private $direccion_institucion;
    private $cue;
    private $id_profesor;
    

    public function __construct($nombre_institucion, $direccion_institucion, $cue, $id_profesor) {
        $this->nombre_institucion = $nombre_institucion;
        $this->direccion_institucion = $direccion_institucion;
        $this->cue = $cue;
        $this->id_profesor = $id_profesor;
    }

    public function getNombreInstitucion() {
        return $this->nombre_institucion;
    }

    public function getDireccionInstitucion() {
        return $this->direccion_institucion;
    }

    public function getCUE() {
        return $this->cue;
    }

    public function setNombreInstitucion($nombre_institucion) {
        $this->nombre_institucion = $nombre_institucion;
    }

    public function setDireccionInstitucion($direccion_institucion) {
        $this->direccion_institucion = $direccion_institucion;
    }
    
    public function setCUE($cue) {
        $this->cue = $cue;
    }


    public function obtenerInstitucion($id_profesor, $conn){
        $query = "SELECT * FROM institucion WHERE id_profesor = :id_profesor";
        $stmt = $conn->prepare($query);

        $stmt->bindParam(':id_profesor', $id_profesor, PDO::PARAM_INT);
        $stmt->execute();

        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
    
}
