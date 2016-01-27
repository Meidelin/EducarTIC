<?php

include $_SERVER['DOCUMENT_ROOT'].'/InfoTutor/data/dataMatricula.php';

$accion=0; //variable para saber en que metodo debe entrar en caso de llegar aqui a travez de un form

if(isset($_POST['accion'])){//verifica si $accion llego en POST o GET dependiendo del form usado
  $accion = $_POST['accion'];
}else{
    if(isset($_GET['accion'])){
        $accion = $_GET['accion'];
    }
}

switch ($accion) {
    case 1:
        matricular();
        break;   
    }

function matricular(){

	$usuario=$_GET['a'];
	$curso=$_GET['curso'];

	insertarMatricula($usuario,$curso);

	echo "<script> alert('La matricula se ha realizado correctamente.');"
    . "window.location='../CursosDisponibles.php'</script>";

}    