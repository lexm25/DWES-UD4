<?php
    
    function creaConexion(){
        @$mysqli = mysqli_connect('localhost','developer','developer','agenciaviajes');
        $error = mysqli_connect_errno($mysqli);
        if($error!=null){
            echo "<p>Error $error conectando a la base de datos: ",mysqli_connect_error(),"<p>";
            exit();
        }else{
            echo "se ha conectado correctamente a la base de datos<br>";
        }
        return $mysqli;
    }
    
    function creaVuelo($origen,$destino,$fecha,$companya,$modeloAvion){
        $mysqli = creaConexion();
        $sql = "INSERT INTO `vuelos` (Origen, Destino, Fecha, Companya, ModeloAvion) VALUES(?,?,?,?,?)";
        mysqli_stmt_init($mysqli);
        $retorno=false;
        if ($stmt = mysqli_prepare($mysqli,$sql)){
            mysqli_stmt_bind_param($stmt, "sssss",$origen, $destino, $fecha, $companya, $modeloAvion);
            
            $retorno = mysqli_stmt_execute($stmt);
           
            mysqli_stmt_close($stmt);
            echo "<br>vuelo creado correctamente";
        }
        $mysqli -> close();
        return $retorno;
    }
    /*Permite cambiar el destino recibiendo ID y compañía*/
    function modificaDestino($id, $companya, $destino){
        $mysqli = creaConexion();
        $sql = "UPDATE vuelos SET Destino = ? WHERE id= ? AND Companya = ?";
        mysqli_stmt_init($mysqli);
        $retorno=false;
        if ($stmt = mysqli_prepare($mysqli,$sql)){
            mysqli_stmt_bind_param($stmt, "sis",$destino, $id, $companya);
            
            $retorno = mysqli_stmt_execute($stmt);
                
            mysqli_stmt_close($stmt);
            echo "<br>destino modificado correctamente";
        }
        mysqli_close($mysqli);
        return $retorno;
    }
    /*Modificar compañía con id*/
    function modificaCompanya($id,$companya){
        $mysqli = creaConexion();
        $sql = "UPDATE vuelos SET Companya = ? WHERE id= ?";
        mysqli_stmt_init($mysqli);
        $retorno=false;
        if ($stmt = mysqli_prepare($mysqli,$sql)){
            mysqli_stmt_bind_param($stmt, "si",$companya,$id);

            $retorno = mysqli_stmt_execute($stmt);
                            
            mysqli_stmt_close($stmt);
            echo "<br>compañía modificada correctamente";
        }
        mysqli_close($mysqli);
        return $retorno;
    } /*Eliminar vuelo a partir del id*/
    function eliminaVuelo($id){
        $mysqli = creaConexion();
        $sql = "DELETE FROM vuelos WHERE id=?";
        mysqli_stmt_init($mysqli);
        $retorno=false;
        if ($stmt = mysqli_prepare($mysqli,$sql)){
            mysqli_stmt_bind_param($stmt, "i", $id);

            $retorno = mysqli_stmt_execute($stmt);
               
            mysqli_stmt_close($stmt);
            echo "<br>vuelo eliminado correctamente";
        }
        mysqli_close($mysqli);
        return $retorno;
    }
    /*extraer vuelo a partir del ID*/
    function extraeVuelos(){
        $mysqli = creaConexion();
        $sql = "SELECT * FROM vuelos";
        mysqli_stmt_init($mysqli);
        $retorno = false;
        if ($stmt = mysqli_prepare($mysqli,$sql)){
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