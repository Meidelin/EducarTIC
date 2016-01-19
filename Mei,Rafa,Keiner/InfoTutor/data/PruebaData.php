<?php

include 'conexion.php';
//include 'PreguntaData.php';

$con=conexion();
$res = null;

//obtener la cantidad de filas
$consultafilas='select count(*) from Pregunta';
$cantidad=mysql_query($consultafilas, $con);

//generar aleatorio
$aleatorio = rand(2,$cantidad-1);

//generar preguntas aleatorias
$consulta = 'select * from pregunta ORDER BY rand('. time() . ' * '. time() . ') LIMIT '.$aleatorio;
$res=mysql_query($consulta, $con);


function generarCuestionario($IdCuestionario,$IdPregunta){
	$insertarCuestionario= 'insert into cuestionario (IdCuestionario) VALUES (NULL);';
 	$insertarPreguntaCuestionario = 'insert into preguntascuestionario (`IdCuestionario`, `IdPregunta`) VALUES ('.
 	$IdCuestionario.', '.$IdPregunta.');';

}

function generarPrueba($IdCuestionario, $Calificacion, $PuntosTotales, $PuntosObtenidos, 
	$RespuestasCorrectas, $RespuestasIncorrectas){
	
	$insertarPrueba = 'insert into prueba (IdPrueba, IdCuestionario, Calificacion, PuntosTotales, PuntosObtenidos, RespuestasCorrectas, RespuestasIncorrectas) VALUES (NULL,'.$IdCuestionario.','.$Calificacion.','.$PuntosTotales.','. $PuntosObtenidos.','.$RespuestasCorrectas.','.$RespuestasIncorrectas.');';

}

?>

<table border="1">

<tr>
<th># Pregunta</th>
<th>Pregunta</th>
<th>Valor</th>
<th>Tipo</th>
<th>Respuesta</th>

</tr>
<!-- $apellidos = $_POST['apellidos']; -->

<?php $num=1;

while($fila=mysql_fetch_array($res)){ ?>

<tr>
<td><?php echo $num; ?></td>
<td><?php echo $fila['Contenido']; ?></td>
<td><?php echo $fila['Valor']; ?></td>
<td><?php echo $fila['Tipo']; ?></td>
<td><input type="text" size="15" maxlength="30" name="respuesta"></td>

</tr>


<?php $num=$num+1;} ?>
</table>



<?php mysql_close($con); ?>