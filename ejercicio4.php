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
    myslqi_fetgch_assoc -> array (OO mysqli_result::fetch_assoc(): array | PROCEDIMIENTOS mysqli_fetch_assoc(mysqli_result $result): array)
    myslqi_fetgch_object -> object (mysql_fetch_object(resource $result, string $class_name = ?, array $params = ?): object)
    myslqi_fetgch_array -> array (mysql_fetch_array(resource $result, int $result_type = MYSQL_BOTH): array)
    myslqi_fetgch_row -> array ( mysql_fetch_row(resource $result): array)
    */
        @$mysqli = mysqli_connect("localhost","developer","developer","agenciaviajes");
        $error = mysqli_connect_errno();
        if($error!=null){
            echo "<p>Error $error conectando a la base de datos: ",mysqli_connect_error(),"<p>";
            exit();
        }
        $result = mysqli_query($mysqli,"SELECT * FROM `vuelos`");
        var_dump($result);
        echo "<br>";
        if($result == false){
            echo "La consulta no ha funcionado correctamente";
        }
        else{
            echo "<table>";
            echo "<th>id</th><th>Origen</th><th>Destino</th><th>Fecha</th><th>Compañía</th><th>Modelo del Avión</th>";
            while ($fila=mysqli_fetch_assoc($result)){
                echo "<td>";
                print_r($fila);
                echo"</td>";
                echo "<br>";
            }

            echo "</table>";
        }
        mysqli_close($mysqli);
    ?>
</body>
</html>