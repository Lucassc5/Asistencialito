<?php

class Ram{
    
    public function obtenerRam($conn) {
        $sql = "SELECT * FROM RAM LIMIT 1";
        $stmt = $conn->prepare($sql);
        $stmt->execute();
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }
    
}