<?php

    include_once 'Conexion.php';
    
function insertarCurso(){   
    
    $con = getConexion();
    
    $sigla = $_POST['sigla'];
    $nombre = $_POST['nombre'];
    $descripcion = $_POST['descripcion'];
    $nivel = $_POST['nivel'];

    mysqli_query($con,"call insertarCurso('sigla', 'nombre','descripcion',nivel);") 
           or die('Error: Ha habido un problema con el query');

    desconectar($con);

	echo "Se inserto correctamente el curso";
}

function getMatricula($usuario){//carga el nombre de usuario para la validacion del LogIn
    
    $con = getConexion();
    
    $result = mysqli_query($con,"SELECT idUsuarioM from matricula where idUsuarioM='$usuario';");
    $usuarioObtenido=$result->fetch_assoc();
    
    return $usuarioObtenido['idUsuarioM'];
    
}

function getCursos(){
    
    $con = getConexion();
    
    $result = mysqli_query($con,"select * from curso;");

    return $result;
    
}

function getCurso($sigla){
    
    $con = getConexion();
    
    $result = mysqli_query($con,"select * from curso where Sigla='$sigla';");

    return $result;
    
}

function getCursosExpediente($idUsuario){
    
    $con = getConexion();
    
    $result = mysqli_query($con,"select c.Sigla, c.Nombre, c.Descripcion, c.NivelCurso from curso c 
                            inner join matricula m on m.siglaCursoM=c.sigla where m.idUsuarioM='$idUsuario';");
    
    return $result;
    
}

function getCursosMatriculado($idUsuario,$sigla){
    
    $con = getConexion();
    
    $result = mysqli_query($con,"select c.Sigla, c.Nombre, c.Descripcion, c.NivelCurso from curso c 
                            inner join matricula m on m.siglaCursoM=c.sigla where m.idUsuarioM='$idUsuario'
                            and siglaCursoM='$sigla';");
    
    return $result;
    
}

function verificarDisponibilidadCurso($curso,$nivel){
    
    $con = getConexion();
    
    $result = mysqli_query($con,"select * from curso where Sigla='$curso' and NivelCurso <= '$nivel';");
    
    return $result;
    
}

function getCursosMatriculablesA($nivel){
    
    $con = getConexion();

    $cursos = mysqli_query($con,"SELECT * from curso where NivelCurso <= $nivel;");
    
    desconectar($con);
    
    return $cursos;
    
}

function getTemasCurso($sig){

    $con = getConexion();

    $consulta = "call pa_BuscarTemasCursosM('$sig');";

    $temas = mysqli_query($con, $consulta);

    desconectar($con);

    return $temas;   

}