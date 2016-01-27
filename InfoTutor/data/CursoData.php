<?php

include 'Conexion.php';

$con=conexion();
$res = null;


if(isset($_POST['eliminar']) and $_POST['eliminar'] == 'si'){
           //se llama a la funcion eliminar
           eliminarCurso($_POST['sig']);  
 }

//se  elimina un curso    
function eliminarCurso($sig){
        $con=conexion();
        //consulta que llama al procedimiento almacenado pa_eliminar_curso
        $consulta="call pa_eliminar_curso (".$sig.");";
        mysql_query($consulta, $con);
        echo "Se ha eliminado el Curso ".$sig." correctamente"; 
 
        // redirecciona a la pagina principal de administracion de cursos  
        echo "<script> location.href='./AdministracionCursos.php' </script>";       
}

//se inserta un curso
function insertarCurso(Curso $cur){
    $con2=conexion();

    $s=$cur->sigla;
    $no=$cur->nombreCurso;
    $d=$cur->descripcion;
    $ni=$cur->nivel;

    //consulta que llama al procedimiento almacenado pa_insertar_curso
    $consulta2='call pa_insertar_curso("'.$s.'","'.$no.'","'.$d.'",'.$ni.');';
    $res2=mysql_query($consulta2, $con2);
    echo 'Se ha insertado correctamente ';   
      // redirecciona a la pagina principal de administracion de cursos    
    echo "<script> location.href='../AdministracionCursos.php' </script>"; 
     
}

//se modifica un curso
function editarCurso(Curso $cur){
    $con2=conexion();
   
    $s=$cur->sigla;
    $no=$cur->nombreCurso;
    $d=$cur->descripcion;
    $ni=$cur->nivel;


    $consulta2='call pa_modificar_curso("'.$s.'","'.$no.'","'.$d.'",'.$ni.');';
    $res2=mysql_query($consulta2, $con2);
    echo 'Se ha mofificado correctamente ';                      
     
    // redirecciona a la pagina principal de administracion de cursos  
    echo "<script> location.href='../AdministracionCursos.php' </script>";
}

// se obtienen todos los cursos
function obtenerCurso(){

    $con=conexion();
    $consulta='select * from Curso';
    $res=mysql_query($consulta, $con);
    return $res;
}

// se obtiene el curso por sigla
function obtenerCursoSigla($sig){

    $con=conexion();
    $consulta='select * from Curso where Sigla="'.$sig.'";';
    $res=mysql_query($consulta, $con);
    return $res;
}

// se obtiene el curso por nombre
function obtenerCursoNombre($nom){

    $con=conexion();
    $consulta='select * from Curso where Nombre="'.$nom.'";';
    $res=mysql_query($consulta, $con);
    return $res;
}

?>

<?php mysql_close($con); ?>