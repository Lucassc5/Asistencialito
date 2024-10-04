<?php

require_once 'conexion.php';

class Profesor extends Persona{

    private $email;
    private $contrasena;
    private $legajo;

    public function __construct($nombre, $apellido, $fecha_nacimiento, $legajo, $email, $contrasena) {
        parent::__construct($nombre, $apellido, $fecha_nacimiento);
        $this->legajo = $legajo;
        $this->email = $email;
        $this->contrasena = $contrasena;
    }

    public function getLegajo() {
        return $this->legajo;
    }

    public function setLegajo($legajo) {
        $this->legajo = $legajo;
    }
    public function getEmail() {
        return $this->email;
    }

    public function setEmail($email) {
        $this->email = $email;
    }
    public function getContrasena() {
        return $this->contrasena;
    }

    public function setContrasena($contrasena) {
        $this->legajo = $contrasena;
    }

    function createProfesor($nombre, $apellido, $fecha_nacimiento, $legajo, $email, $contrasena) {
        $pdo = connectDB();
        $sql = "INSERT INTO profesores (email, contrasena, nombre, apellido, fecha_nacimiento, legajo) 
        VALUES (:email, :contrasena, :nombre, :apellido, :fecha_nacimiento, :legajo)";
        $stmt = $pdo->prepare($sql);
    
        $stmt->bindParam(':email', $email);
        $stmt->bindParam(':contrasena', $contrasena);
        $stmt->bindParam(':nombre', $nombre);
        $stmt->bindParam(':apellido', $apellido);
        $stmt->bindParam(':fecha_nacimiento', $fecha_nacimiento);
        $stmt->bindParam(':legajo', $legajo);
        
       

        if ($stmt->execute()) {
            echo "Profesor creado exitosamente.";
        } else {
            echo "Error al crear el profesor.";
        }
    }
    
    function getProfesorById($id) {
        $pdo = connectDB();
        $sql = "SELECT * FROM profesores WHERE id = :id";
        $stmt = $pdo->prepare($sql);
        $stmt->bindParam(':id', $id);
        $stmt->execute();
    
        $profesor = $stmt->fetch(PDO::FETCH_ASSOC);
    
        if ($profesor) {
            return new Profesor($profesor['nombre'], $profesor['apellido'], $profesor['fecha_nacimiento'], $profesor['legajo']);
        } else {
            echo "Profesor no encontrado.";
            return null;
        }
    }

    function updateProfesor($id, $nombre, $apellido, $fecha_nacimiento, $legajo) {
        $pdo = connectDB();
        $sql = "UPDATE profesores SET nombre = :nombre, apellido = :apellido, fecha_nacimiento = :fecha_nacimiento, legajo = :legajo WHERE id = :id";
        $stmt = $pdo->prepare($sql);
    
        $stmt->bindParam(':nombre', $nombre);
        $stmt->bindParam(':apellido', $apellido);
        $stmt->bindParam(':fecha_nacimiento', $fecha_nacimiento);
        $stmt->bindParam(':legajo', $legajo);
        $stmt->bindParam(':id', $id);
    
        if ($stmt->execute()) {
            echo "Profesor actualizado exitosamente.";
        } else {
            echo "Error al actualizar el profesor.";
        }
    }
    
    function deleteProfesor($id) {
        $pdo = connectDB();
        $sql = "DELETE FROM profesores WHERE id = :id";
        $stmt = $pdo->prepare($sql);
        $stmt->bindParam(':id', $id);
    
        if ($stmt->execute()) {
            echo "Profesor eliminado exitosamente.";
        } else {
            echo "Error al eliminar el profesor.";
        }
    }
        

}