<?php
    
    function creaConexion(){
        @$mysqli = mysqli_connect('localhost','developer','developer','agenciaviajes');
        $error = mysqli_connect_errno($mysqli);
        if($error!=null){
            echo "<p>Error $error conectando a la base de datos: ",mysqli_connect_error(),"<p>";
            exit();
        }else{
            echo "se ha conectado correctamente a la base de datos";
        }
        return $mysqli;
    }
    
    function creaVuelo($origen,$destino,$fecha,$companya,$modeloAvion){
        $mysqli = creaConexion();
        $sql = "INSERT INTO `vuelos` (Origen, Destino, Fecha, Companya, ModeloAvion) VALUES(?,?,?,?,?,?)";
        mysqli_stmt_init($mysqli);
        if ($stmt = mysqli_prepare($mysqli,$sql)){
            mysqli_stmt_bind_param($stmt, "sssss",$id, $origen, $destino, $fecha, $companya, $modeloAvion);
            
            mysqli_stmt_execute($stmt);
           
            mysqli_stmt_close($stmt);
            echo "<br>creado correctamente";
        }
        
    }
    /*Permite cambiar el destino recibiendo ID y compañía*/
    function modificaDestino($id, $companya){
        $mysqli = creaConexion();
        $sql = "UPDATE vuelos SET Destino = ? WHERE id= ? AND Companya = ?";
        
        if ($stmt = mysqli_prepare($mysqli,$sql)){
            mysqli_stmt_bind_param($stmt, "si", $origen, $id);
            mysqli_stmt_execute($stmt);
            
            mysqli_stmt_bind_result($stmt, $id, $origen, $destino, $fecha, $companya, $modeloAvion);
                
            mysqli_stmt_close($stmt);
        }
        mysqli_close($mysqli);
    }
    function modificaCompanya(){

    }
    function eliminaVuelo($id){
        $mysqli = creaConexion();
        $sql = "DELETE * FROM vuelos WHERE id= ?";
        
        if ($stmt = mysqli_prepare($mysqli,$sql)){
            mysqli_stmt_bind_param($stmt, "i", $id);
            mysqli_stmt_execute($stmt);

            mysqli_stmt_bind_result($stmt, $id, $origen, $destino, $fecha, $companya, $modeloAvion);
                
            mysqli_stmt_close($stmt);
        }
        mysqli_close($mysqli);
    }
    /*extraer vuelo a partir del ID*/
    function extraeVuelos($id){
        $mysqli = creaConexion();
        $sql = " FROM vuelos WHERE id= ?";
        
        if ($stmt = mysqli_prepare($mysqli,$sql)){
            mysqli_stmt_bind_param($stmt, "i", $id);
            mysqli_stmt_execute($stmt);

            mysqli_stmt_bind_result($stmt, $id, $origen, $destino, $fecha, $companya, $modeloAvion);

            mysqli_stmt_close($stmt);
        }
        mysqli_close($mysqli);
    }
    
?>