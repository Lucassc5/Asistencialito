<?php 

class Persona {
    
    private $nombre;
    private $apellido;
    private $fecha_nacimiento;

    public function __construct($nombre, $apellido, $fecha_nacimiento) {
        $this->nombre = $nombre;
        $this->apellido = $apellido;
        $this->fecha_nacimiento = $fecha_nacimiento;
    }

    public function getNombre() {
        return $this->nombre;
    }

    public function getApellido() {
        return $this->apellido;
    }

    public function getFechaNacimiento() {
        return $this->fecha_nacimiento;
    }

    public function setNombre($nombre) {
        $this->nombre = $nombre;
    }

    public function setApellido($apellido) {
        $this->apellido = $apellido;
    }

    public function setFechaNacimiento($fecha_nacimiento) {
        $this->fecha_nacimiento = $fecha_nacimiento;
    }
}

