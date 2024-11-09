<?php

require_once '../conexion.php';
require_once "../Clases/Ram.php";

    $database = new Database();
    $conn = $database->connect();
    
    $id_ram = $_POST['id_ram'];
    $nota_libre = $_POST['nota_libre'] ;
    $nota_regular = $_POST['nota_regular'] ;
    $nota_promocion = $_POST['nota_promocion'] ;
    $porcentaje_regular = $_POST['porcentaje_regular'] ;
    $porcentaje_promocion = $_POST['porcentaje_promocion'] ;

    $ram = new Ram();
    $ram->guardarRam($id_ram, $nota_libre, $nota_regular, $nota_promocion, $porcentaje_regular, $porcentaje_promocion, $conn);

    header("Location: ../paginaMain.php");