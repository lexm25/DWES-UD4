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
            return $conexion;
            } 
            catch (PDOException $e) {
            echo "Conexion fallida: " , $e->getMessage();
            $conexion = null;
            }
        }

        function crearTurista($nombre,$apellido1,$apellido2,$direccion,$telefono){
            try {
            $conexion = creaConexion();
            $consulta = $conexion->prepare("INSERT INTO turista(nombre,apellido1,apellido2,direccion,telefono) VALUES (?,?,?,?,?)");
            $consulta->bindParam(1,$nombre);
            $consulta->bindParam(2,$apellido1);
            $consulta->bindParam(3,$apellido2);
            $consulta->bindParam(4,$direccion);
            $consulta->bindParam(5,$telefono);
            $consulta->execute();
            return $conexion->lastInsertId();
            $conexion = null;
            } catch (PDOException $e) {
                $conexion = null;
                $e->getMessage();
            }
        }

        function extraeTurista(){
            try {
                $conexion = creaConexion();
                $consulta = $conexion->prepare("SELECT * FROM turista WHERE id= ?");
                $consulta->bindParam("id",$id);
                $consulta->execute();
                return $consulta->fetch();
                $conexion = null;
            }
            catch (PDOException $e) {
                $conexion = null;
                $e->getMessage();
            }
        }

        function extraeTuristas(){
            try {
                $conexion = creaConexion();
                $consulta = $conexion->prepare("SELECT * FROM turista");
                $consulta -> execute();
                $array = [];
                while ($fila = $consulta->fetch(PDO::FETCH_BOTH)){
                    $array[] = $fila;
                }
                return $consulta->fetch();
                $conexion = null;
            }
            catch (PDOException $e) {
                $conexion = null;
                $e->getMessage();
            }
        }

        function actualizaTurista(){
            try {
                $conexion = creaConexion();
                $consulta = $conexion->prepare("UPDATE turista SET direccion = ? AND telefono = ? WHERE id= ?");
                $consulta->bindParam(1,$id);
                return $consulta->fetch();
            }
            catch (PDOException $e) {
                $e->getMessage();
            }
        }

        function eliminaTurista(){
            try {
                $conexion = creaConexion();
                $consulta = $conexion->prepare("DELETE FROM turista WHERE id= ?");
                $consulta->bindParam("id",$id);
                $consulta->execute();
                return $consulta->fetch();
                $conexion = null;
            }
            catch (PDOException $e) {
                $conexion = null;
                $e->getMessage();
            }
        }
    
    ?>
</body>
</html>