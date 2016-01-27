<?php

include 'Conexion.php';
//se crea la conexion
$con=conexion();
$res = null;

   //llama al metodo eliminar tema
 if(isset($_POST['eliminar']) and $_POST['eliminar'] == 'si'){
           //se llama a la funcion y se le envia el  idtema y sigla
           eliminarTema($_POST['idtem'],$_POST['sig']);  
 }

//se  elimina un tema   
function eliminarTema($idTema, $sigla){
        $con=conexion();
        //consulta que llama al procedimiento almacenado pa_eliminar_tema
        $consulta="call pa_eliminar_tema (".$idTema.",'".$sigla."');";
        mysql_query($consulta, $con);
        echo "Se ha eliminado el tema ".$idTema." del curso ".$sigla." correctamente"; 
 
        // redirecciona a la pagina principal de administracion de Temas  
        echo "<script> location.href='./AdministracionTemas.php' </script>";  
}

//se inserta un Tema
function insertarTema(Tema $tem){
    $con2=conexion();
    $s=$tem->siglaCurso;
    $n=$tem->nombreTema;

    //consulta que llama al procedimiento almacenado pa_insertar_tema
    $consulta2="call pa_insertar_tema('$s','$n');";
    $res2=mysql_query($consulta2, $con2);
    echo 'Se ha insertado correctamente ';   
      // redirecciona a la pagina principal de administracion de Temas    
    echo "<script> location.href='../AdministracionTemas.php' </script>"; 
     
}

//se modifica un Tema
function editarTema(Tema $tem){
    $con2=conexion();

    $te=$tem->idTema;
    $s=$tem->siglaCurso;
    $n=$tem->nombreTema;

    $consulta2="call pa_modificar_tema('$te','$s','$n');";
    $res2=mysql_query($consulta2, $con2);
    echo 'Se ha mofificado correctamente ';                      
     
    // redirecciona a la pagina principal de administracion de temas  
    echo "<script> location.href='../AdministracionTemas.php' </script>";
}


// se obtienen todos los temas
function obtenerTema(){

    $con=conexion();
    $consulta='select * from Tema';
    $res=mysql_query($consulta, $con);
    return $res;
}

// se obtiene el curso por sigla
function obtenerTemaSigla($sig){

    $con=conexion();
    $consulta='select * from Tema where SiglaCursoTema="'.$sig.'";';
    $res=mysql_query($consulta, $con);
    return $res;
}

// se obtiene el curso por nombre
function obtenerTemaNombre($nom){

    $con=conexion();
    $consulta='select * from Tema where Nombre="'.$nom.'";';
    $res=mysql_query($consulta, $con);
    return $res;
}


?>


<?php mysql_close($con); ?>