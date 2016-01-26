<?php

function getConexion() { //conecta a la base de datos del sistema
    
$servername ="localhost";
$username= "root";
$password= "";
$database = "infotutor";

return $conn = new mysqli($servername, $username, $password,$database);    
}

function desconectar($con) { //cierra la conexion con la base de datos
    
    mysqli_close($con);
    
}

function conexion(){

$con = mysql_connect("localhost","root","");

if (!$con){
	die('Could not connect: ' . mysql_error());
}
mysql_select_db("infotutor", $con);

return($con);

}


?>