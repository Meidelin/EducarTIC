<?php

include '../dominio/Tema.php';
include '../data/TemaData.php';

$accion=$_POST['accion'];

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