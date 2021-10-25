<?php

    function creaConexion(){
        @$mysqli = mysqli_connect("localhost","developer","developer","agenciaviajes");
        $error = mysqli_connect_errno($mysqli);
        if($error!=null){
            echo "<p>Error $error conectando a la base de datos: ",mysqli_connect_error(),"<p>";
            exit();
        }
        return $mysqli;
    }
    function creaVuelo($origen,$destino,$fecha,$companaya,$modeloAvion){
        $mysqli = creaConexion();
        $result = mysqli_query($mysqli, "INSERT INTO `vuelos` (Origen, Destino, Fecha, Companya, ModeloAvion) VALUES('Madrid','Valencia','2021-10-21 09:16:52','Iberia','A320')");
        if($result == false){
            echo "La consulta no ha funcionado correctamente";
        }
        else{
            echo "Se han insertado ", mysqli_affected_rows($mysqli)," vuelos";
            echo "<br>";
            echo "el id del último elemento añadido es: ", mysqli_insert_id($mysqli);
        }
    }
    
?>