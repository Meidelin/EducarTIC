<?php 
include './barraSesion.php';
?>
<html lang="es">
    <head>
        <title>Pregunta</title>
    </head>
    <body >
<br><br>
        <h1>Administracion de Preguntas </h1>
        <?php 
        include './data/PreguntaData.php';

         // muestra todas las preguntas 
	        if (isset($_POST['buscarpregunta']) and $_POST['seleccion'] == 'Todo'){                    
           	           $res=obtenerPregunta();

	        }else  if(isset($_POST['buscarpregunta']) and $_POST['seleccion'] == 'Tipo'){
               //se llama a la funcion que busca la pregunta por tipo
                $res=obtenerPreguntaTipo($_POST['pregunta']);	

            }else  if(isset($_POST['buscarpregunta']) and $_POST['seleccion'] == 'Tema'){
               //se llama a la funcion que busca la pregunta por tema
                $res=obtenerPreguntaTema($_POST['pregunta']);	

            }else  if(isset($_POST['buscarpregunta']) and $_POST['seleccion'] == 'Enunciado'){
			 //se llama a la funcion que busca la pregunta por enunciado
                $res=obtenerPreguntaEnunciado($_POST['pregunta']);
 	        }
        ?>


<!-- Formulario que carga un combo para indicar el filtro de busqueda -->
 <form method="POST" action="">
 	<input type="hidden" name="buscarpregunta" />
 	<h4>Buscar curso: 
 		<select name="seleccion">
 			<option value="Tipo">Tipo</option>
 			<option value="Tema">Tema</option>
 			<option value="Enunciado">Enunciado</option>
 			<option value="Todo">Ver todo</option>
 		</select>
 		<input name="pregunta" type="text">
 		<input type="submit" value="Buscar"> </h4>
 </form>

<br><br>


<!-- Tabla que cargara los datos que se han solicitado en el form anterior -->
<?php if($res!=null){?>
<table border="1">
	<tr>
		<th>Enunciado</th>
		<th>Respuesta</th>
		<th>Valor</th>
		<th>Tipo</th>
		<th></th>
		<th></th>
	</tr>
	
	<!-- Se obtienen los datos que ha generado la consulta-->
	<?php while($fila=mysql_fetch_array($res)){ ?>

	<tr>
		<td><?php echo $fila['Enunciado']; ?></td>
		<td><?php echo $fila['Respuesta']; ?></td>
		<td><?php echo $fila['Valor']; ?></td>
		<td><?php echo $fila['Tipo']; ?></td>
		<!-- redirecciona al archivo editarpregunta.php -->
		<td>
			<form action="editarpregunta.php" method="post"><!-- boton editar que envia los parametros -->
			    <input type="hidden" name="editar"  value="si" />
			    <input type="hidden" name="idpreg" value= <?php echo $fila['IdPregunta']; ?> /> <!-- envia IdPregunta-->
			    <input type="hidden" name="idtem" value= <?php echo $fila['IdTemaP']; ?> /> <!-- envia IdTema-->
			    <input type="hidden" name="cont" value= "<?php echo $fila['Enunciado']; ?>"/> <!-- envia Contenido-->
			    <input type="hidden" name="resp" value= "<?php echo $fila['Respuesta']; ?>" /><!-- envia Respuesta-->
			    <input type="hidden" name="val" value= <?php echo $fila['Valor']; ?> /> <!-- envia Valor-->
			    <input type="hidden" name="tip" value= <?php echo $fila['Tipo']; ?> /> <!-- envia Tipo-->
			    <input href="./editarpregunta.php" type="submit" value="Editar" />
			</form>
		<td>
			<form action="" method="post"><!-- boton eliminar que envia los parametros -->
				<input type="hidden" name="eliminar"  value="si" />
				<input type="hidden" name="idpreg" value= <?php echo $fila['IdPregunta']; ?> /> <!-- envia idpregunta-->
				<input type="hidden" name="idtem" value= <?php echo $fila['IdTemaP']; ?> /> <!-- envia idtema -->
				<input type="submit" value="Eliminar" />
			</form>
		</td>
	</tr>

	<?php } ?>
	</table>
	<?php } else { echo "No se han encontrado preguntas";  }?>
	<br><br>
	<!-- envia al archivo insertarpregunta -->
	<a href="./insertarpregunta.php" >Agregar nueva pregunta</a>
   </body>
</html>