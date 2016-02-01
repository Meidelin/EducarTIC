<?php

include $_SERVER['DOCUMENT_ROOT'].'/infotutor/dominio/Tema.php';
include $_SERVER['DOCUMENT_ROOT'].'/infotutor/data/TemaData.php';

//include  $_SERVER['DOCUMENT_ROOT'].'/InfoTutor/dominio/Usuario.php';

$accion=0; //variable para saber en que metodo debe entrar en caso de llegar aqui a travez de un form

if(isset($_POST['accion'])){//verifica si $accion llego en POST o GET dependiendo del form usado
  $accion = $_POST['accion'];
}else{
    if(isset($_GET['accion'])){
        $accion = $_GET['accion'];
    }
}

//switch que recibe una accion para cada caso
switch ($accion) {
    case 1:
        guardarTema();
        break; 
    case 2:
        modificarTema();
          break;  
    }

function guardarTema(){
    
    $siglaCurso=$_POST['SiglaCursoTema'];
    $nombreTema=$_POST['NombreTema'];
    
    //crea el objeto tema
    $tem=new Tema();
    $tem->crearTema($siglaCurso, $nombreTema);
    
    //ejecuta la funcion en TemaData que inserta un tema
    insertarTema($tem);
    
}
function modificarTema(){
    

    $idTema=$_POST['IdTema'];
    $siglaCurso=$_POST['SiglaCursoTema'];
    $nombreTema=$_POST['NombreTema'];
    
    //crea el objeto tema
    $tem=new Tema();
    $tem->editarTema($idTema, $siglaCurso, $nombreTema);
    
    //ejecuta la funcion en PreguntaData que modifica un tema
    editarTema($tem);
    
}

function temasVistos($tema){ //evalua que temas ha visto el usuario para mostrarlo en el expediente NO inserta en temavisto

    if(getTemaVisto($tema)->num_rows !== 0){
        return 'X';
    }else{
        return '✓';
    }

}