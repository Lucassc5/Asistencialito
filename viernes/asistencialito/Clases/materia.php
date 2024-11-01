<?php 
class Materia {
    
    private $nombre_materia;

    public function __construct($nombre_materia) {
        $this->nombre_materia = $nombre_materia;
    }

    public function getNombreMateria() {
        return $this->nombre_materia;
    }

    public function setNombreMateria($nombre_materia) {
        $this->nombre_materia = $nombre_materia;
    }
}
