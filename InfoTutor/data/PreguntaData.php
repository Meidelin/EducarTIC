<?php

include 'Conexion.php';
//se crea la conexion
$res = null;

   //llama al metodo eliminar pregunta
   //con los parametros enviados desde el boton eliminar
 if(isset($_POST['eliminar']) and $_POST['eliminar'] == 'si'){
           //se llama a la funcion y se le envia el idpregunta y el idtema
           eliminarPregunta($_POST['idpreg'],$_POST['idtem']);  
 }

//se  elimina una pregunta    
function eliminarPregunta($idPregunta, $idTema){
        $con = getConexion();
        //consulta que llama al procedimiento almacenado pa_eliminar_pregunta
        $consulta="call pa_eliminar_pregunta (".$idPregunta.",".$idTema.");";
        $res = mysqli_query($con,$consulta);
        echo "Se ha eliminado la pregunta ".$idPregunta." del tema ".$idTema." correctamente"; 
 
        // redirecciona a la pagina principal de administracion de preguntas  
        echo "<script> location.href='./AdministracionPreguntas.php' </script>";

        
}

//se inserta una pregunta
function insertarPregunta(Pregunta $preg){
    $con = getConexion();
    $te=$preg->idTema;
    $c=$preg->contenido;
    $r=$preg->respuesta;
    $v=$preg->valor;
    $ti=$preg->tipo;

    //consulta que llama al procedimiento almacenado pa_insertar_pregunta
    //'call pa_insertar_curso("'.$s.'","'.$no.'","'.$d.'",'.$ni.');';
    $consulta='call pa_insertar_pregunta('.$te.',"'.$c.'","'.$r.'",'.$v.','.$ti.');';
     $res = mysqli_query($con,$consulta);
    echo 'Se ha insertado correctamente ';   
      // redirecciona a la pagina principal de administracion de preguntas    
    echo "<script> location.href='../AdministracionPreguntas.php' </script>"; 
     
}

//se modifica una pregunta
function editarPregunta(Pregunta $preg){
    $con = getConexion();

    $p=$preg->idPregunta;
    $te=$preg->idTema;
    $c=$preg->contenido;
    $r=$preg->respuesta;
    $v=$preg->valor;
    $ti=$preg->tipo;
     

    $consulta="call pa_modificar_pregunta('$p','$te','$c','$r','$v','$ti');";
    $res = mysqli_query($con,$consulta);
    echo 'Se ha mofificado correctamente ';                      
     
    // redirecciona a la pagina principal de administracion de preguntas  
    echo "<script> location.href='../AdministracionPreguntas.php' </script>";
}

// se obtienen todass las Preguntas
function obtenerPregunta(){

    $con = getConexion();
    $consulta='select * from pregunta';
    $res = mysqli_query($con,$consulta);
    return $res;
}

// se obtiene las Preguntas por tipo
function obtenerPreguntaTipo($tipo){

    $con = getConexion();
    $consulta='select * from pregunta where Tipo="'.$tipo.'";';
    $res=mysqli_query($con,$consulta);
    return $res;
}

// se obtiene las Preguntas por tema
function obtenerPreguntaTema($tema){

    $con = getConexion();
    $consulta='select * from pregunta where IdTemaP="'.$tema.'";';
    $res=mysqli_query($con,$consulta);
    return $res;
}
// se obtiene las Preguntas por enunciado
function obtenerPreguntaEnunciado($enunciado){

    $con = getConexion();
    $consulta='select * from pregunta where Enunciado="'.$enunciado.'";';
    $res=mysqli_query($con,$consulta);
    return $res;
}

?>