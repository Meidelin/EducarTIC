<?php

include 'Conexion.php';
//se crea la conexion
$con=conexion();
$res = null;

$consulta="select * from Pregunta";
$res=mysql_query($consulta, $con);

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

?>

<!-- Tabla con la lista de preguntas que sera incluida 
    en la administracion de preguntas del archivo pregunta.php-->
<table border="1">

<tr>
<!-- <th>IdPregunta</th>
<th>IdTema</th> -->
<th>Contenido</th>
<th>Respuesta</th>
<th>Valor</th>
<th>Tipo</th>
<th></th>
<th></th>

</tr>

<?php while($fila=mysql_fetch_array($res)){ ?>

<tr><!-- Se obtienen los valores y se muestran en la tabla -->
<!-- <td><?php //echo $fila['IdPregunta']; ?></td>
<td><?php //echo $fila['IdTema']; ?></td> -->
<td><?php echo $fila['Contenido']; ?></td>
<td><?php echo $fila['Respuesta']; ?></td>
<td><?php echo $fila['Valor']; ?></td>
<td><?php echo $fila['Tipo']; ?></td>
<!-- redirecciona al archivo editarpregunta.php -->
<td><form action="editarpregunta.php" method="post"><!-- boton editar que envia los parametros -->
        <input type="hidden" name="editar"  value="si" />
        <input type="hidden" name="idpreg" value= <?php echo $fila['IdPregunta']; ?> /> <!-- envia IdPregunta-->
        <input type="hidden" name="idtem" value= <?php echo $fila['IdTema']; ?> /> <!-- envia IdTema-->
        <input type="hidden" name="cont" value= "<?php echo $fila['Contenido']; ?>"/> <!-- envia Contenido-->
        <input type="hidden" name="resp" value= "<?php echo $fila['Respuesta']; ?>" /><!-- envia Respuesta-->
        <input type="hidden" name="val" value= <?php echo $fila['Valor']; ?> /> <!-- envia Valor-->
        <input type="hidden" name="tip" value= <?php echo $fila['Tipo']; ?> /> <!-- envia Tipo-->
       <input href="./editarpregunta.php" type="submit" value="Editar" />
    </form>

<td>
    <form action="" method="post"><!-- boton eliminar que envia los parametros -->
        <input type="hidden" name="eliminar"  value="si" />
        <input type="hidden" name="idpreg" value= <?php echo $fila['IdPregunta']; ?> /> <!-- envia idpregunta-->
        <input type="hidden" name="idtem" value= <?php echo $fila['IdTema']; ?> /> <!-- envia idtema -->
       <input type="submit" value="Eliminar" />
    </form>
</td>

</tr>


<?php } ?>
</table>

<!-- envia al archivo insertarpregunta -->
<a href="./insertarpregunta.php" >Agregar nueva pregunta</a>



<?php mysql_close($con); ?>