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
        $result = mysqli_query($mysqli,"SELECT * FROM `vuelos`");
        var_dump($result);
        echo "<br>";
        if($result == false){
            echo "La consulta no ha funcionado correctamente";
        }
        else{
            while ($fila=mysqli_fetch_assoc($result)){
                print_r($fila);
                echo "<br>";
            }
        }
        mysqli_close($mysqli);
    ?>
</body>
</html>