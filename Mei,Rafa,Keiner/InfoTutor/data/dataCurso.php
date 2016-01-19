<?php

    include 'Conexion.php';
    
function insertarCurso(){   
    
    $con = getConexion();
    
    $sigla = $_POST['sigla'];
    $nombre = $_POST['nombre'];
    $descripcion = $_POST['descripcion'];
    $nivel = $_POST['nivel'];

    mysqli_query($con,"call insertarCurso('sigla', 'nombre','descripcion',nivel);"); 
           or die('Error: Ha habido un problema con el query');

    desconectar($con);

	echo "Se inserto correctamente el curso";
    // alerta("Se agrego correctamente el nuevo curso", "../Proveedores/AgregarProveedor.php");
}