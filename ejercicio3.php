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
    $informacion = simplexml_load_file("ej3.xml");
    
    echo"<table border= 1px>";
    echo"<tr>";
    echo("<th>Título</th><th>Género</th><th>Precio</th>");
     echo "</tr>";
    foreach ($informacion as $child) {
    echo"<tr>";    
        printf("%s","<td>",$informacion->child[1]->author,"</td>");
        printf("%s","<td>",$informacion->child[1]->genre,"</td>");
        printf("%s","<td>",$informacion->child[1]->price,"</td>");
    echo "</tr>";
    }
    echo "</table>";
    ?>
</body>
</html>