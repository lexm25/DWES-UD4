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
        function creaConexion(){
        $servidor = "localhost";
        $baseDatos = "agenciaviajes";
        $usuario = "developer";
        $pass = "developer";
        try {
        $conexion = new PDO("mysql:host=$servidor;dbname=$baseDatos",$usuario,$pass);
        echo "Conectado correctamente";
        echo "<br>";
    } catch (PDOException $e) {
        echo "Conexion fallida: " , $e->getMessage();
    }
        }

        function crearTurista(){

        }

        function extraeTurista(){

        }

        function extraeTuristas(){

        }

        function actualizaTurista(){

        }
    
    ?>
</body>
</html>