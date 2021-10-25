<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php
    /*
    mysqli_fetch_assoc -> array (OO mysqli_result::fetch_assoc(): array | PROCEDIMIENTOS mysqli_fetch_assoc(mysqli_result $result): array)
    mysqli_fetch_object -> object (mysql_fetch_object(resource $result, strin $class_name = ?, array $params = ?): object)
    mysqli_fetch_array -> array (mysql_fetch_array(resource $result, int $result_type = MYSQL_BOTH): array)
    mysqli_fetch_row -> array ( mysql_fetch_row(resource $result): array)
    */
        @$mysqli = mysqli_connect("localhost","developer","developer","agenciaviajes");
        $error = mysqli_connect_errno();
        if($error!=null){
            echo "<p>Error $error conectando a la base de datos: ",mysqli_connect_error(),"<p>";
            exit();
        }
        $result = mysqli_query($mysqli,"SELECT * FROM `vuelos`");
        $result2 = mysqli_query($mysqli,"SELECT * FROM `vuelos`");
        $result3 = mysqli_query($mysqli,"SELECT * FROM `vuelos`");
        $result4 = mysqli_query($mysqli,"SELECT * FROM `vuelos`");
        var_dump($result);
        echo "<br>";
        if($result == false){
            echo "La consulta no ha funcionado correctamente";
        }
        else{
            echo "<table border= 1px>";
            echo "<th>id</th><th>Origen</th><th>Destino</th><th>Fecha</th><th>Compañía</th><th>Modelo del Avión</th>";
            while ($fila=mysqli_fetch_assoc($result)){
                echo"<tr>";
                echo "<td>", $fila["id"],"</td>";
                echo "<td>", $fila["Destino"],"</td>";
                echo "<td>", $fila["Origen"],"</td>";
                echo "<td>", $fila["Fecha"],"</td>";
                echo "<td>", $fila["Companya"],"</td>";
                echo "<td>", $fila["ModeloAvion"],"</td>";
                echo "</tr>";
            }
            echo "</table>";
            var_dump($result2);
            echo "<table border= 1px>";
            echo "<th>id</th><th>Origen</th><th>Destino</th><th>Fecha</th><th>Compañía</th><th>Modelo del Avión</th>";
            while ($fila2=mysqli_fetch_object($result2)){
                echo"<tr>";
                echo "<td>",$fila2->id,"</td>";
                echo "<td>",$fila2->Origen,"</td>";
                echo "<td>",$fila2->Destino,"</td>";
                echo "<td>",$fila2->Fecha,"</td>";
                echo "<td>",$fila2->Companya,"</td>";
                echo "<td>",$fila2->ModeloAvion,"</td>";
                echo "</tr>";
            }
            echo "</table>";
            var_dump($result3);
            echo "<table border= 1px>";
            echo "<th>id</th><th>Origen</th><th>Destino</th><th>Fecha</th><th>Compañía</th><th>Modelo del Avión</th>";
            while ($fila=mysqli_fetch_array($result3)){
                echo"<tr>";
                echo "<td>", $fila["id"],"</td>";
                echo "<td>", $fila["Destino"],"</td>";
                echo "<td>", $fila["Origen"],"</td>";
                echo "<td>", $fila["Fecha"],"</td>";
                echo "<td>", $fila["Companya"],"</td>";
                echo "<td>", $fila["ModeloAvion"],"</td>";
                echo "</tr>";
            }
            echo "</table>";

            var_dump($result4);
            echo "<table border= 1px>";
            echo "<th>id</th><th>Origen</th><th>Destino</th><th>Fecha</th><th>Compañía</th><th>Modelo del Avión</th>";
            while ($fila=mysqli_fetch_array($result4)){
                echo"<tr>";
                echo "<td>", $fila["id"],"</td>";
                echo "<td>", $fila["Destino"],"</td>";
                echo "<td>", $fila["Origen"],"</td>";
                echo "<td>", $fila["Fecha"],"</td>";
                echo "<td>", $fila["Companya"],"</td>";
                echo "<td>", $fila["ModeloAvion"],"</td>";
                echo "</tr>";
            }
            echo "</table>";
        }
        
        mysqli_close($mysqli);
    ?>
</body>
</html>