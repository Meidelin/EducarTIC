<?php

function getConexion() { //conecta a la base de datos del sistema
    
$servername ="localhost";
$username= "root";
$password= "";
$database = "InfoTutorBD";

return $conn = new mysqli($servername, $username, $password,$database);
    
}

function desconectar($con) { //cierra la conexion con la base de datos
    
    mysqli_close($con);
    
}

?>