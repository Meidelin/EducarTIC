<?php

include 'Conexion.php';
//include 'PreguntaData.php';

$con=conexion();
$res = null;

//obtener la cantidad de filas
$consultafilas='select Sigla, Nombre, Descripcion, Nivel from Curso';
$res=mysql_query($consultafilas, $con);


if(isset($_POST['eliminar']) and $_POST['eliminar'] == 'si'){
           //se llama a la funcion y se le envia el idpregunta y el idtema
           eliminarCurso($_POST['sig']);  
 }

//se  elimina una pregunta    
function eliminarCurso($sig){
        $con=conexion();
        //consulta que llama al procedimiento almacenado pa_eliminar_pregunta
        $consulta="call pa_eliminar_curso (".$sig.");";
        mysql_query($consulta, $con);
        echo "Se ha eliminado el Curso ".$sig." correctamente"; 
 
        // redirecciona a la pagina principal de administracion de cursos  
        echo "<script> location.href='./AdministracionCursos.php' </script>";

        
}

//se inserta una pregunta
function insertarCurso(Curso $cur){
    $con2=conexion();
    $no=$cur->nombreCurso;
    $d=$cur->descripcion;
    $ni=$cur->nivel;

    //consulta que llama al procedimiento almacenado pa_insertar_curso
    $consulta2="call pa_insertar_curso('$no','$d','$ni');";
    $res2=mysql_query($consulta2, $con2);
    echo 'Se ha insertado correctamente ';   
      // redirecciona a la pagina principal de administracion de cursos    
    echo "<script> location.href='../AdministracionCursos.php' </script>"; 
     
}

//se modifica una pregunta
function editarCurso(Curso $cur){
    $con2=conexion();
   
    $s=$cur->sigla;
    $no=$cur->nombreCurso;
    $d=$cur->descripcion;
    $ni=$cur->nivel;


    $consulta2="call pa_modificar_curso('$s','$no','$d','$ni');";
    $res2=mysql_query($consulta2, $con2);
    echo 'Se ha mofificado correctamente ';                      
     
    // redirecciona a la pagina principal de administracion de cursos  
    echo "<script> location.href='../AdministracionCursos.php' </script>";
}

?>

<table border="1">

<tr>
<th>Sigla</th>
<th>Nombre</th>
<th>Descripcion</th>
<th>Nivel</th>
<th></th>
<th></th>

</tr>
<?php 
while($fila=mysql_fetch_array($res)){ ?>

<tr>
<td><?php echo $fila['Sigla']; ?></td>
<td><?php echo $fila['Nombre']; ?></td>
<td><?php echo $fila['Descripcion']; ?></td>
<td><?php echo $fila['Nivel']; ?></td>
<td><form action="editarcurso.php" method="post"><!-- boton editar que envia los parametros -->
        <input type="hidden" name="editar"  value="si" />
        <input type="hidden" name="sig" value= <?php echo $fila['Sigla']; ?> /> <!-- envia IdPregunta-->
        <input type="hidden" name="nom" value= "<?php echo $fila['Nombre']; ?>" /> <!-- envia IdTema-->
        <input type="hidden" name="des" value= "<?php echo $fila['Descripcion']; ?>"/> <!-- envia Contenido-->
        <input type="hidden" name="niv" value= <?php echo $fila['Nivel']; ?> /><!-- envia Respuesta-->
       <input href="./editarcurso.php" type="submit" value="Editar" />
    </form>

<td>
    <form action="" method="post"><!-- boton eliminar que envia los parametros -->
        <input type="hidden" name="eliminar"  value="si" />
        <input type="hidden" name="sig" value= <?php echo $fila['Sigla']; ?> /> <!-- envia idpregunta-->
       <input type="submit" value="Eliminar" />
    </form>
</td>

</tr>

<?php } ?>
</table>



<?php mysql_close($con); ?>