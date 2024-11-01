<?php
require_once 'conexion.php';

class Institucion {

    private $nombre_institucion;
    private $direccion_institucion;
    private $cue;
    

    public function __construct($nombre_institucion, $direccion_institucion, $cue) {
        $this->nombre_institucion = $nombre_institucion;
        $this->direccion_institucion = $direccion_institucion;
        $this->cue = $cue;
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
}