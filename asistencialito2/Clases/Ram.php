<?php

class Ram{
    
    public function obtenerRam($conn) {
        $sql = "SELECT * FROM RAM ";
        $stmt = $conn->prepare($sql);
        $stmt->execute();
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }
    
}