<?php

include 'Conexion.php';
//se crea la conexion
$con=conexion();
$res = null;

$consulta="select * from Tema";
$res=mysql_query($consulta, $con);

   //llama al metodo eliminar tema
   //con los parametros enviados desde el boton eliminar
 if(isset($_POST['eliminar']) and $_POST['eliminar'] == 'si'){
           //se llama a la funcion y se le envia el idpregunta y el idtema
           eliminarTema($_POST['idtem'],$_POST['sig']);  
 }

//se  elimina una pregunta    
function eliminarTema($idTema, $sigla){
        $con=conexion();
        //consulta que llama al procedimiento almacenado pa_eliminar_pregunta
        $consulta="call pa_eliminar_tema (".$idTema.",'".$sigla."');";
        mysql_query($consulta, $con);
        echo "Se ha eliminado el tema ".$idTema." del curso ".$sigla." correctamente"; 
 
        // redirecciona a la pagina principal de administracion de preguntas  
        echo "<script> location.href='./tema.php' </script>";

        
}

//se inserta una pregunta
function insertarTema(Tema $tem){
    $con2=conexion();
    //$te=$tem->idTema;
    $s=$tem->siglaCurso;
    $n=$tem->nombreTema;

    //consulta que llama al procedimiento almacenado pa_insertar_tema
    $consulta2="call pa_insertar_tema('$s','$n');";
    $res2=mysql_query($consulta2, $con2);
    echo 'Se ha insertado correctamente ';   
      // redirecciona a la pagina principal de administracion de preguntas    
    echo "<script> location.href='../tema.php' </script>"; 
     
}

//se modifica una pregunta
function editarTema(Tema $tem){
    $con2=conexion();

    $te=$tem->idTema;
    $s=$tem->siglaCurso;
    $n=$tem->nombreTema;

    $consulta2="call pa_modificar_tema('$te','$s','$n');";
    $res2=mysql_query($consulta2, $con2);
    echo 'Se ha mofificado correctamente ';                      
     
    // redirecciona a la pagina principal de administracion de preguntas  
    echo "<script> location.href='../tema.php' </script>";
}

?>

<!-- Tabla con la lista de preguntas que sera incluida 
    en la administracion de preguntas del archivo pregunta.php-->
<table border="1">

<tr>
<th>IdTema</th>
<th>Sigla Curso</th>
<th>Nombre</th>
<th></th>
<th></th>

</tr>

<?php while($fila=mysql_fetch_array($res)){ ?>

<tr><!-- Se obtienen los valores y se muestran en la tabla -->
<td><?php echo $fila['IdTema']; ?></td>
<td><?php echo $fila['SiglaCursoTema']; ?></td>
<td><?php echo $fila['Nombre']; ?></td>
<!-- redirecciona al archivo editartema.php -->
<td><form action="editartema.php" method="post"><!-- boton editar que envia los parametros -->
        <input type="hidden" name="editar"  value="si" />
        <input type="hidden" name="idtem" value= <?php echo $fila['IdTema']; ?> /> <!-- envia IdTema-->
        <input type="hidden" name="sig" value= <?php echo $fila['SiglaCursoTema']; ?> /> <!-- envia SiglaCurso-->
        <input type="hidden" name="nom" value= <?php echo $fila['Nombre']; ?> /> <!-- envia NombreTema-->
       <input href="./editartema.php" type="submit" value="Editar" />
    </form>

<td>
    <form action="" method="post"><!-- boton eliminar que envia los parametros -->
        <input type="hidden" name="eliminar"  value="si" />
        <input type="hidden" name="idtem" value= <?php echo $fila['IdTema']; ?> /> <!-- envia idtema -->
        <input type="hidden" name="sig" value= <?php echo $fila['SiglaCursoTema']; ?> /> <!-- envia SiglaCurso-->
       <input type="submit" value="Eliminar" />
    </form>
</td>

</tr>


<?php } ?>
</table>

<!-- envia al archivo insertarpregunta -->
<a href="./insertartema.php" >Agregar nuevo Tema</a>



<?php mysql_close($con); ?>