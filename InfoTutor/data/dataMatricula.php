<?php

    include_once 'Conexion.php';
    
function insertarMatricula($usuario,$curso){ //inserta usuarios recibiendo un objeto usuario desde registrarUsuario.php
    //o desde registrarAdmin.php
    
    $con = getConexion();

    mysqli_query($con,"insert into matricula values('$curso', $usuario);")or die
            ("<script>alert('Hemos tenido un problema interno y no se "
            . "ha podido realizar la matricula, pedimos disculpas por este error, por favor intente realizar "
            . "el proceso nuevamente'); location.href='../CursosDisponibles.php';</script>");

    desconectar($con);

}