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
    $arrayLoc = array("Los Palacios y Villafranca","37.1586,-5.92417"); 

        $file = fopen("locations.csv","a");
        fputcsv($file,$arrayLoc);
        fclose($file);

        $file = fopen("locations.csv","r");
        echo"<table border = '1'>";
        echo"<th>Nombre</th><th>Latitud/Longitud</th>";
        while (!feof($file)){
            $array=[];
            $array =(fgetcsv($file));
            echo "<tr>";
                echo "<td>",$array[0],"</td>";
                echo "<td>",$array[1],"</td>";
            echo "<tr>";
        }
    echo "</table>";    
    fclose($file);
    ?>
</body>
</html>