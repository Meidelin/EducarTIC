<?php

function getConexion() { //conecta a la base de datos del sistema
    
$servername ="localhost";
$username= "root";
$password= "";
$database = "lenggrupo4";

return $conn = new mysqli($servername, $username, $password,$database);
    
}

 /*function getConexion() { //conecta a la base de datos del sistema
    
 $servername ="68.178.143.151";
 $username= "lenggrupo4";
 $password= "Grupo#4get!";
 $database = "lenggrupo4";

 return $conn = new mysqli($servername, $username, $password,$database);

 }*/

function desconectar($con) { //cierra la conexion con la base de datos
    
    mysqli_close($con);
    
}


?>