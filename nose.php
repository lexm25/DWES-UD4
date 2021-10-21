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
        $mysqli = mysqli_connect("localhost","develope","developer","agenciaviajes");
        $error = mysqli_errno($mysqli);
        if($error!=null){
            echo "<p>Error $error conectando a la base de datos: ",mysqli_error($mysqli),"<p>";
            exit();
        }
        else{
            echo "conectado correctamente <br>";
        }
    mysqli_close($mysqli);
    ?>
</body>
</html>