<?php

function getConexion() {
    
$servername ="localhost";
$username= "root";
$password= "";
$database = "InfoTutorBD";

return $conn = new mysqli($servername, $username, $password,$database);
    
}

function desconectar($con) {
    
    mysqli_close($con);
    
}

function alerta($param, $ruta) {
    
    echo "<script> alert('$param'); "
            . "location.href='$ruta';"
            . "</script>";
    
}

?>