<?php

include  $_SERVER['DOCUMENT_ROOT'].'/InfoTutor/dominio/Foro.php';
include  $_SERVER['DOCUMENT_ROOT'].'/InfoTutor/data/dataForo.php';

$accion=0; //variable para saber en que metodo debe entrar en caso de llegar aqui a travez de un form

if(isset($_POST['accion'])){//verifica si $accion llego en POST o GET dependiendo del form usado
  $accion = $_POST['accion'];
}else{
    if(isset($_GET['accion'])){
        $accion = $_GET['accion'];
    }
}

switch ($accion) {//envia al metodo requerido dependiendo del numero de la accion
    case 1:
        CrearForo();
        break;
    case 2:
        modificarUsuario();
        break;
    case 3:
        CambiarPass();
        break;
    }

function CrearForo(){//arma al objeto Foro y llama al metodo de dataForo para guardarlo en la BD
    
    echo $_POST['idUsuarioF'];

    $IdTF = $_POST['idTemaSeleccionado'];
    $Fecha = "".$_POST['fechaF'];
    $tit = $_POST['tituloF'];
    $EnunciadoF = $_POST['enunciadoF'];
    $IdUF = $_POST['idUsuarioF'];
    
    $foro=new Foro;//crea un objeto Foro
    $foro->crearForo($IdTF,$Fecha,$tit,$EnunciadoF,$IdUF);//llama al constructor y asigna los valores
    
    insertarForo($foro);

    echo "<script> alert('El Foro se creo correctamente.');"
        . "window.location='../menuForo.php'</script>";
    
}
