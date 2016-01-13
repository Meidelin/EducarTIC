<?php

    include 'Conexion.php';
    
function insertarUsuario(){   
    
    $con = getConexion();
    
    $nombre = $_POST['nombre'];
    $telAgente = $_POST['telAgente'];
    $empresa = $_POST['empresa'];
    $telEmpresa = $_POST['telEmpresa'];

    mysqli_query($con,"insert into proveedores (nombre,telAgente,empresa,telEmpresa) "
        . "values ('$nombre','$telAgente','$empresa','$telEmpresa');"); 
           // or die('Error: Ha habido un problema con el query');

    desconectar($con);

    alerta("Se agrego correctamente el nuevo proveedor", "../Proveedores/AgregarProveedor.php");
}

