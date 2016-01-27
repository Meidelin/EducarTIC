<?php

include $_SERVER['DOCUMENT_ROOT'].'/InfoTutor/dominio/Curso.php';
include $_SERVER['DOCUMENT_ROOT'].'/InfoTutor/data/dataCurso.php';

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

function getCursosDisponibles($idUsuario, $nivel){
    
    $idM=getMatricula($idUsuario);
    
    if($idM !== null){

        $TotalCursos=getCursos();
        $cursos=array();

        while($row=$TotalCursos->fetch_assoc()){

            $cursoMatriculado = getCursosMatriculado($idUsuario,$row['Sigla']);

            if( $cursoMatriculado->num_rows == 0){
                array_push($cursos, $row['Sigla']);
            }

        }
        
        
    }else{

        $cursos = getCursosMatriculablesA($nivel);
    }
    
    return $cursos;
    
}