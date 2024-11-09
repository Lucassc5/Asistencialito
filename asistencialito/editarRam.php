<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>RAM</title>
    <link rel="stylesheet" href="Resources\Styles\editarRam.css">
</head>
<body>
    
    <form action="Guardar/guardarRam.php" method="POST">
        <h2>Parametros Ram</h2>
        <table>
            <tr>
                <th>Nota Libre</th>
                <th>Nota Regular</th>
                <th>Nota Promocion</th>
                <th>Porcentaje Reuglar</th>
                <th>Porcentaje Promocion</th>
            </tr>
            <?php
                require_once "conexion.php";
                require_once "Clases/Ram.php";
                $database = new Database();
                $conn = $database->connect();

                $ram = new Ram();
                $ramNueva = $ram->obtenerRam();
                
                    echo "<input type='hidden' name='id_ram' value='".($ramNueva['id_ram']) ."'>";
                    echo "<td><input type='number' class='nota_libre' name='nota_libre' value='" . (!empty($ramNueva['nota_libre']) && $ramNueva['nota_libre'] != 0 ? rtrim(rtrim(number_format($ramNueva['nota_libre'], 6, '.', ''), '0'), '.') : '') . "' placeholder='Nota Libre' min='1' max='10'></td>";
                    echo "<td><input type='number' class='nota_regular' name='nota_regular' value='" . (!empty($ramNueva['nota_regular']) && $ramNueva['nota_regular'] != 0 ? rtrim(rtrim(number_format($ramNueva['nota_regular'], 6, '.', ''), '0'), '.') : '') . "' placeholder='Nota Regular' min='1' max='10'></td>";
                    echo "<td><input type='number' class='nota_promocion' name='nota_promocion' value='" . (!empty($ramNueva['nota_promocion']) && $ramNueva['nota_promocion'] != 0 ? rtrim(rtrim(number_format($ramNueva['nota_promocion'], 6, '.', ''), '0'), '.') : '') . "' placeholder='Nota Promocion' min='1' max='10'></td>";
                    echo "<td><input type='number' class='porcentaje_regular' name='porcentaje_regular' value='" . (!empty($ramNueva['porcentaje_regular']) && $ramNueva['porcentaje_regular'] != 0 ? rtrim(rtrim(number_format($ramNueva['porcentaje_regular'], 6, '.', ''), '0'), '.') : '') . "' placeholder='Porcentaje Regular' min='1' max='100'></td>";
                    echo "<td><input type='number' class='porcentaje_promocion' name='porcentaje_promocion' value='" . (!empty($ramNueva['porcentaje_promocion']) && $ramNueva['porcentaje_promocion'] != 0 ? rtrim(rtrim(number_format($ramNueva['porcentaje_promocion'], 6, '.', ''), '0'), '.') : '') . "' placeholder='Porcentaje Promocion' min='1' max='100'></td>";
            ?>
        </table>
        <button id="guardarRam" name="guardarRam" class="guardarRam">Guardar Ram</button>
        <a href="paginaMain.php" class="salir">Salir</a>
    </form>
</body>
</html>