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
        @$mysqli = mysqli_connect("localhost","developer","developer","agenciaviajes");
        $error = mysqli_connect_errno();
        if($error!=null){
            echo "<p>Error $error conectando a la base de datos: ",mysqli_connect_error(),"<p>";
            exit();
        }
        
        $result = mysqli_query($mysqli, "INSERT INTO `vuelos` (Origen, Destino, Fecha, Companya, ModeloAvion) VALUES('País Vasco','Sevilla','2021-11-26 11:45:56','Ryanair','A340')");
        if($result == false){
            echo "La consulta no ha funcionado correctamente";
        }
        else{
            echo "Se han insertado: ", mysqli_affected_rows($mysqli)," filas";
            echo "<br>";
            echo "el id del último elemento añadido es: ", mysqli_insert_id($mysqli);
        }
        $result2 = mysqli_query($mysqli,"UPDATE `vuelos` SET `Origen`='Los Palacios y Villfranca' WHERE `id`='3'");
        if($result2 == false){
            echo "La consulta no ha funcionado correctamente";
            echo "<br>";
        }
        else{
            echo "Se han actualizado: ", mysqli_affected_rows($mysqli)," filas";
            echo "<br>";
        }
        $result3 = mysqli_query($mysqli, "DELETE FROM `vuelos` WHERE id='12'");
        if($result3 == false){
            echo "La consulta no ha funcionado correctamente";
        }
        else{
            echo "Se han borrado: ", mysqli_affected_rows($mysqli)," filas";
            echo "<br>";
        }
        mysqli_close($mysqli);
    ?>
</body>
</html>