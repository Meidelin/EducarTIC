<?php

include '../dominio/Curso.php';
include '../data/dataCurso.php';

$accion = $_POST['accion'];

switch ($accion) {
    case 1:
        guardarCurso();
        break;   
    }

function guardarCurso(){
    
    $sigla=$_POST['sigla'];
    $nombre=$_POST['nombre'];
    $descripcion=$_POST['descripcion'];
    $nivel=$_POST['nivel'];
    
    $user = new Curso;
    $user->crearCurso($nombre, $apellidos, $correo, $usuario, $contrasena, $tipo); // aqui se llama al constructor del dominio/Curso
    
    echo $user->getNombre();
        
}