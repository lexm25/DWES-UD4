<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
        img{
            width: 400px;
        }
    </style>
</head>
<body>
    <?php
    $servidor = "localhost";
    $baseDatos = "nba";
    $usuario = "developer";
    $pass = "developer";
    try{
        $conexion = new PDO("mysql:host=$servidor;dbname=$baseDatos",$usuario,$pass);
        
        $sql = "SELECT * FROM datos";
        $datos = $conexion->query($sql);

        echo "<table border= 1px>";
        echo "<th>id</th><th>Nombre</th><th>Equipo</th><th>Nacionalidad</th><th>Edad</th><th>Fecha Nacimiento</th><th>Foto</th>";
        while($dato = $datos->fetch()){
            echo"<tr>";
            echo "<td>", $dato["id"],"</td>";
            echo "<td>", $dato["Nombre"],"</td>";
            echo "<td>", $dato["Equipo"],"</td>";
            echo "<td>", $dato["Nacionalidad"],"</td>";
            echo "<td>", $dato["Edad"],"</td>";
            echo "<td>", $dato["Fecha Nacimiento"],"</td>";
            echo "<td>", "<img src='$dato[Imagen]'>","</td>";
            echo "</tr>";
        }
    }catch(PDOException $e){
        echo "Conexión fallida: " , $e->getMessage();
    }
    ?>
</body>
</html>