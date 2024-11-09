<?php

class Ram{

    public function obtenerRam() {
        global $conn;

        $sql = "SELECT * FROM RAM ";
        $stmt = $conn->prepare($sql);
        $stmt->execute();
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    public function guardarRam($id_ram, $nota_libre, $nota_regular, $nota_promocion, $porcentaje_regular, $porcentaje_promocion){
        global $conn;

        $query = "SELECT COUNT(*) FROM ram WHERE id_ram = :id_ram";
        $stmt = $conn->prepare($query);
        $stmt->bindParam(':id_ram', $id_ram, PDO::PARAM_INT);
        $stmt->execute();
        $exists = $stmt->fetchColumn();

            if($exists){
                $query = "UPDATE ram SET nota_libre = :nota_libre, nota_regular = :nota_regular, nota_promocion = :nota_promocion, porcentaje_regular = :porcentaje_regular, porcentaje_promocion = :porcentaje_promocion 
                          WHERE id_ram = :id_ram";
            } else{
                $query = "INSERT INTO ram (nota_libre, nota_regular, nota_promocion, porcentaje_regular, porcentaje_promocion) 
                  VALUES (:nota_libre, :nota_regular, :nota_promocion, :porcentaje_regular, :porcentaje_promocion)";
            }

        $stmt = $conn->prepare($query);
        
        $stmt->bindParam(':nota_libre', $nota_libre);
        $stmt->bindParam(':nota_regular', $nota_regular);
        $stmt->bindParam(':nota_promocion', $nota_promocion,);
        $stmt->bindParam(':porcentaje_regular', $porcentaje_regular);
        $stmt->bindParam(':porcentaje_promocion', $porcentaje_promocion);
        
        if ($exists) {
            $stmt->bindParam(':id_ram', $id_ram, PDO::PARAM_INT);
        }
        return $stmt->execute();
    }
}