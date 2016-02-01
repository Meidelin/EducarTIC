<?php

include_once 'Conexion.php';

$res = null;

   //llama al metodo eliminar tema
 if(isset($_POST['eliminar']) and $_POST['eliminar'] == 'si'){
           //se llama a la funcion y se le envia el  idtema y sigla
           eliminarTema($_POST['idtem'],$_POST['sig']);  
 }

//se  elimina un tema   
function eliminarTema($idTema, $sigla){
        $con = getConexion();
        //consulta que llama al procedimiento almacenado pa_eliminar_tema
        $consulta="call pa_eliminar_tema (".$idTema.",'".$sigla."');";
        $res = mysqli_query($con,$consulta);
        echo "Se ha eliminado el tema ".$idTema." del curso ".$sigla." correctamente"; 
 
        // redirecciona a la pagina principal de administracion de Temas  
        echo "<script> location.href='./AdministracionTemas.php' </script>";  
}

//se inserta un Tema
function insertarTema(Tema $tem){
    $con = getConexion();
    $s=$tem->siglaCurso;
    $n=$tem->nombreTema;

    //consulta que llama al procedimiento almacenado pa_insertar_tema
    //'call pa_insertar_curso("'.$s.'","'.$no.'","'.$d.'",'.$ni.');';
    $consulta="call pa_insertar_tema ('".$s."','".$n."');";
     $res = mysqli_query($con,$consulta);
    echo 'Se ha insertado correctamente ';   
      // redirecciona a la pagina principal de administracion de Temas    
    echo "<script> location.href='../AdministracionTemas.php' </script>"; 
     
}

//se modifica un Tema
function editarTema(Tema $tem){
   
   $con = getConexion();

    $te=$tem->idTema;
    $s=$tem->siglaCurso;
    $n=$tem->nombreTema;

    $consulta="call pa_modificar_tema('$te','$s','$n');";
    $res = mysqli_query($con,$consulta);
    echo 'Se ha mofificado correctamente ';                      
     
    // redirecciona a la pagina principal de administracion de temas  
    echo "<script> location.href='../AdministracionTemas.php' </script>";
}


// se obtienen todos los temas
function obtenerTema(){

    $con = getConexion();
    $consulta="select * from tema;";
    $res = mysqli_query($con,$consulta);
    return $res;
}

// se obtiene el curso por sigla
function obtenerTemaSigla($sig){

    $con = getConexion();
    $consulta='select * from tema where SiglaCursoT="'.$sig.'";';
    $res = mysqli_query($con,$consulta);
    return $res;
}

// se obtiene el curso por nombre
function obtenerTemaNombre($nom){

    $con = getConexion();
    $consulta='select * from tema where NombreT="'.$nom.'";';
    $res = mysqli_query($con,$consulta);
    return $res;
}


function getTemaVisto($idTema){

    $con = getConexion();
    
    $tema = mysqli_query($con,"SELECT IdTema from tema where IdTema='$idTema';");
    
    desconectar($con);
    
    return $tema;

}

//php mysql_close($con); 