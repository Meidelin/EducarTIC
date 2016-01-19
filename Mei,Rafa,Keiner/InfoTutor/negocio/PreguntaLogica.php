<?php

include '../dominio/Pregunta.php';
include '../data/PreguntaData.php';

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

function guardarPregunta(){
    
    $idtema=$_POST['IdTema'];
    $contenido=$_POST['Contenido'];
    $respuesta=$_POST['Respuesta'];
    $valor=$_POST['Valor'];
    $tipo=$_POST['Tipo'];
    
    //crea el objeto pregunta
    $preg=new Pregunta();
    $preg->crearPregunta($idtema, $contenido, $respuesta, $tipo, $valor);
    
    //ejecuta la funcion en PreguntaData que inserta una pregunta
    insertarPregunta($preg);
    
}
function modificarPregunta(){
    
    $idpreg=$_POST['IdPregunta'];
    $idtema=$_POST['IdTema'];
    $contenido=$_POST['Contenido'];
    $respuesta=$_POST['Respuesta'];
    $valor=$_POST['Valor'];
    $tipo=$_POST['Tipo'];
    
    $preg=new Pregunta();
    $preg->editarPregunta($idpreg, $idtema, $contenido, $respuesta, $tipo, $valor);
    
    //ejecuta la funcion en PreguntaData que modifica una pregunta
    editarPregunta($preg);
    
}