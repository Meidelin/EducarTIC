<?php

include 'Conexion.php';

$res=null;

if(isset($_POST['eliminar']) and $_POST['eliminar'] == 'si'){
           //se llama a la funcion eliminar
           eliminarCurso($_POST['sig']);  
 }

//se  elimina un curso    
function eliminarCurso($sig){

        $con = getConexion();
        //consulta que llama al procedimiento almacenado pa_eliminar_curso
        $consulta="call pa_eliminar_curso ('".$sig."');";
        $res = mysqli_query($con,$consulta);
        echo "Se ha eliminado el Curso ".$sig." correctamente"; 

        // redirecciona a la pagina principal de administracion de cursos  
        echo "<script> location.href='./AdministracionCursos.php' </script>";       
}

//se inserta un curso
function insertarCurso(Curso $cur){
   
    $con = getConexion();
    $s=$cur->sigla;
    $no=$cur->nombre;
    $d=$cur->descripcion;
    $ni=$cur->nivel;

    //consulta que llama al procedimiento almacenado pa_insertar_curso
    $consulta='call pa_insertar_curso("'.$s.'","'.$no.'","'.$d.'",'.$ni.');';
    $res = mysqli_query($con,$consulta);
    echo 'Se ha insertado correctamente ';   
      // redirecciona a la pagina principal de administracion de cursos    
    echo "<script> location.href='../AdministracionCursos.php' </script>"; 
     
}

//se modifica un curso
function editarCurso(Curso $cur){
    $con = getConexion();
   
    $s=$cur->sigla;
    $no=$cur->nombre;
    $d=$cur->descripcion;
    $ni=$cur->nivel;


    $consulta='call pa_modificar_curso("'.$s.'","'.$no.'","'.$d.'",'.$ni.');';
    $res = mysqli_query($con,$consulta);
    echo 'Se ha mofificado correctamente ';                 
     
    // redirecciona a la pagina principal de administracion de cursos  
    echo "<script> location.href='../AdministracionCursos.php' </script>";
}

// se obtienen todos los cursos
function obtenerCurso(){
   
    $con = getConexion();
    $consulta="select * from curso;";
    $res = mysqli_query($con,$consulta);
    //desconectar($con);
    return $res;
}

// se obtiene el curso por sigla
function obtenerCursoSigla($sig){

    $con = getConexion();
    //$consulta=;"call pa_eliminar_curso ('".$sig."');"; 
    $res = mysqli_query($con,"select * from curso where Sigla='".$sig."';");
    //desconectar($con);
    return $res;
}

// se obtiene el curso por nombre
function obtenerCursoNombre($nom){

    $con = getConexion();
    $consulta="select * from curso where Nombre='".$nom."';";
    $res=mysqli_query($con,$consulta);
    return $res;
}

?>

