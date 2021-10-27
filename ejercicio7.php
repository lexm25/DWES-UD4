<?php
    
    function creaConexion(){
        @$mysqli = new mysqli('localhost','developer','developer','agenciaviajes');
        $error = $mysqli -> connect_errno;
        if($error!=null){
            echo "<p>Error $error conectando a la base de datos: ",mysqli_connect_error(),"<p>";
            exit();
        }else{
            echo "se ha conectado correctamente a la base de datos<br>";
        }
        return $mysqli;
    }
    
    function creaVuelo($origen,$destino,$fecha,$companya,$modeloAvion){
        $retorno=false;

        $mysqli = creaConexion();
        $sql = $mysqli -> query("INSERT INTO `vuelos` (Origen, Destino, Fecha, Companya, ModeloAvion) VALUES(?,?,?,?,?)");
        $mysqli->stmt_init($mysqli);
        if ($stmt = $mysqli->prepare($sql)){
            $stmt->bind_param("sssss",$origen, $destino, $fecha, $companya, $modeloAvion);
                
            $retorno = $stmt->execute($stmt);
           
            $stmt->close($stmt);
        }
        mysqli_close($mysqli);
        return $retorno;
    }
    /*Permite cambiar el destino recibiendo ID y compañía*/
    function modificaDestino($id, $companya, $destino){
        $retorno=false;
        
        $mysqli = creaConexion();
        $sql = $mysqli -> query("UPDATE vuelos SET Destino = ? WHERE id= ? AND Companya = ?");
        $mysqli->stmt_init($mysqli);
        if ($stmt = $mysqli->prepare($sql)){
            $stmt->bind_param("sis",$destino,$id, $companya);
            
            $retorno = $stmt->execute($stmt);
                
            $stmt->close($stmt);
        }
        mysqli_close($mysqli);
        return $retorno;
    }
    /*Modificar compañía con id*/
    function modificaCompanya($id,$companya){
        $retorno=false;

        $mysqli = creaConexion();
        $sql = $mysqli -> query("UPDATE vuelos SET Companya = ? WHERE id= ?");
        $mysqli->stmt_init($mysqli);
        if ($stmt = $mysqli->prepare($sql)){
            $stmt->bind_param("si",$companya,$id);

            $retorno = $stmt->execute($stmt);
                            
            $stmt->close($stmt);
        }
        mysqli_close($mysqli);
        return $retorno;
    } /*Eliminar vuelo a partir del id*/
    function eliminaVuelo($id){
        $retorno=false;

        $mysqli = creaConexion();
        $sql = $mysqli -> query("DELETE FROM vuelos WHERE id=?");
        $mysqli->stmt_init($mysqli);
        if ($stmt = $mysqli->prepare($sql)){
            $stmt->bind_param("si",$companya,$id);

            $retorno = $stmt->execute($stmt);
               
            $stmt->close($stmt);
        }
        mysqli_close($mysqli);
        return $retorno;
    }
    /*corregir*/
    function extraeVuelos(){
        $retorno=false;

        $mysqli = creaConexion();
        $sql = $mysqli -> query("SELECT * FROM vuelos");
        $mysqli->stmt_init($mysqli);
        if ($stmt = $mysqli->prepare($sql)){
            $retorno =mysqli_stmt_execute($stmt);
            mysqli_stmt_bind_result($stmt, $id, $origen, $destino, $fecha, $companya, $modeloAvion);
                while (mysqli_stmt_fetch($stmt)) {
                    print "El vuelo con origen $origen y destino $destino tiene fecha prevista para $fecha y es operado por la compañía $companya con el modelo de avion $modeloAvion";
                    echo "<br>";        
                }
            mysqli_stmt_close($stmt);
   
        }
        mysqli_close($mysqli);
        return $retorno;
    }
    
?>