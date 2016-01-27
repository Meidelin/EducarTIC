<?php

include 'Conexion.php';
//se crea la conexion
$con=conexion();
$res = null;

   //llama al metodo eliminar pregunta
   //con los parametros enviados desde el boton eliminar
 if(isset($_POST['eliminar']) and $_POST['eliminar'] == 'si'){
           //se llama a la funcion y se le envia el idpregunta y el idtema
           eliminarPregunta($_POST['idpreg'],$_POST['idtem']);  
 }

//se  elimina una pregunta    
function eliminarPregunta($idPregunta, $idTema){
        $con=conexion();
        //consulta que llama al procedimiento almacenado pa_eliminar_pregunta
        $consulta="call pa_eliminar_pregunta (".$idPregunta.",".$idTema.");";
        mysql_query($consulta, $con);
        echo "Se ha eliminado la pregunta ".$idPregunta." del tema ".$idTema." correctamente"; 
 
        // redirecciona a la pagina principal de administracion de preguntas  
        echo "<script> location.href='./AdministracionPreguntas.php' </script>";

        
}

//se inserta una pregunta
function insertarPregunta(Pregunta $preg){
    $con2=conexion();
    $te=$preg->idTema;
    $c=$preg->contenido;
    $r=$preg->respuesta;
    $v=$preg->valor;
    $ti=$preg->tipo;

    if($ti==1){
        $v=5;
    }else{
        $v=10;
    }

    //consulta que llama al procedimiento almacenado pa_insertar_pregunta
    $consulta2="call pa_insertar_pregunta('$te','$c','$r','$v','$ti');";
    $res2=mysql_query($consulta2, $con2);
    echo 'Se ha insertado correctamente ';   
      // redirecciona a la pagina principal de administracion de preguntas    
    echo "<script> location.href='../AdministracionPreguntas.php' </script>"; 
     
}

//se modifica una pregunta
function editarPregunta(Pregunta $preg){
    $con2=conexion();

    $p=$preg->idPregunta;
    $te=$preg->idTema;
    $c=$preg->contenido;
    $r=$preg->respuesta;
    $v=$preg->valor;
    $ti=$preg->tipo;

     if($ti==1){
        $v=5;
    }else{
        $v=10;
    }

    $consulta2="call pa_modificar_pregunta('$p','$te','$c','$r','$v','$ti');";
    $res2=mysql_query($consulta2, $con2);
    echo 'Se ha mofificado correctamente ';                      
     
    // redirecciona a la pagina principal de administracion de preguntas  
    echo "<script> location.href='../AdministracionPreguntas.php' </script>";
}

// se obtienen todass las Preguntas
function obtenerPregunta(){

    $con=conexion();
    $consulta='select * from Pregunta';
    $res=mysql_query($consulta, $con);
    return $res;
}

// se obtiene las Preguntas por tipo
function obtenerPreguntaTipo($tipo){

    $con=conexion();
    $consulta='select * from Pregunta where Tipo="'.$tipo.'";';
    $res=mysql_query($consulta, $con);
    return $res;
}

// se obtiene las Preguntas por tema
function obtenerPreguntaTema($tema){

    $con=conexion();
    $consulta='select * from Pregunta where IdTema="'.$tema.'";';
    $res=mysql_query($consulta, $con);
    return $res;
}
// se obtiene las Preguntas por enunciado
function obtenerPreguntaEnunciado($enunciado){

    $con=conexion();
    $consulta='select * from Pregunta where Contenido="'.$enunciado.'";';
    $res=mysql_query($consulta, $con);
    return $res;
}

?>
<?php mysql_close($con); ?>