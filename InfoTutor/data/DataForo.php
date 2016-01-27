<?php

include_once  $_SERVER['DOCUMENT_ROOT'].'/InfoTutor/data/Conexion.php';
    
function insertarForo($foro){ //inserta Foro recibiendo un objeto foro.
    
    $con = getConexion();

    $IdTF = $foro->idTemaF;
    $Fecha = $foro->fechaF;
    $tit = $foro->tituloF;
    $EnunciadoF = $foro->enunciadoF;
    $IdUF = $foro->idUsuarioF;

    $consulta = "call pa_CrearForo($IdTF, $Fecha, $tit, $EnunciadoF, $IdTF);";

    mysqli_query($con, $consulta)or die("<script>alert('Hemos tenido un problema interno y no se "
            . "ha podido crear el foro, pedimos disculpas por este improbiso, por favor intente realizar "
            . "la acción nuevamente'); location.href='../menuForo.php';</script>");

    desconectar($con);

}

function getTemas(){

    $con = getConexion();

    $result = mysqli_query($con,"select IdTema, NombreT from Tema");

    desconectar($con);

    return $result;

 }