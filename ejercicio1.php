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
    // $file = fopen("ej1.txt","a+");
    // fwrite($file,"Alexander Skywalker supremo");
    // fclose($file);
    
    $file = fopen("ej1.txt","r");

    echo"<table border= 1px>";
    echo("<th>Nombre</th><th>Altura</th><th>Peso</th><th>Color del Pelo</th><th>Color de piel</th><th>Color ojos</th><th>Edad</th><th>Genero</th><th>Procedencia</th><th>Raza</th>");
    $linea = fgets($file);
    while (!feof($file)){
        list($nombre,$altura,$peso,$colorPelo,$colorPiel,$colorOjos,$edad,$genero,$procedencia,$raza) = explode(",", $linea);
        echo "<tr>";
            echo "<td> $nombre</td>";
            echo "<td> $altura</td>";
            echo "<td> $peso</td>";
            echo "<td> $colorPelo</td>";
            echo "<td> $colorPiel</td>";
            echo "<td> $colorOjos</td>";
            echo "<td> $edad</td>";
            echo "<td> $genero</td>";
            echo "<td> $procedencia</td>";
            echo "<td> $raza</td>";
        echo "</tr>";
        $linea = fgets($file);
    }
    echo "</table>";
    fclose($file);
    ?>
</body>
</html>