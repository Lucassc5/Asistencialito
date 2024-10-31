<?php 
class Notas {
    
    private $notas;

    public function __construct($notas) {
        $this->notas = $notas;
    }

    public function getNotas() {
        return $this->notas;
    }

    public function setNombreMateria($notas) {
        $this->notas = $notas;
    }
}