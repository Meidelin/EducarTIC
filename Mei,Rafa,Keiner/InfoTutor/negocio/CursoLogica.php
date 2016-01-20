<?php

include '../dominio/Curso.php';
include '../data/CursoData.php';

$accion=$_POST['accion'];

//switch que recibe una accion para cada caso
switch ($accion) {
    case 1:
        guardarPregunta();
        break; 
    case 2:
        modificarPregunta();
          break;  
    }


    
function guardarCurso(){
    
    $sigla=$_POST['Sigla'];
    $nombre=$_POST['Nombre'];
    $descripcion=$_POST['Descripcion'];
    $nivel=$_POST['NivelCurso'];
    
    //crea el objeto curso
    $cur=new Curso();
    $cur->crearCurso($nombre, $descripcion, $nivel);
    
    //ejecuta la funcion en PreguntaData que inserta un curso
    insertarCurso($cur);
    
}
function modificarCurso(){
    
    $sigla=$_POST['Sigla'];
    $nombre=$_POST['Nombre'];
    $descripcion=$_POST['Descripcion'];
    $nivel=$_POST['NivelCurso']
    
    $cur=new Curso();
    $cur->editarCurso($sigla,$nombre, $descripcion, $nivel);
    
    //ejecuta la funcion en PreguntaData que modifica un curso
    editarCurso($cur);
    
}