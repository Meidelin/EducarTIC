<!DOCTYPE html>
<?php 
include './barraSesion.php';
?>
<html lang="es">
    <head>
        <title>Pregunta</title>
        <link href="css/EstiloPrincipal.css" rel="stylesheet" type="text/css" />
    </head>
    <body >

        
        <?php 
        include './data/PreguntaData.php';

         // muestra todas las preguntas 
	        //if (isset($_POST['vertodos'])){                    
           	           $res=obtenerPregunta();
		
			 if(isset($_POST['buscarpregunta']) and $_POST['seleccion'] == 'Tipo'){
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


        <div class="container">

<h1 class="h1">Administración de Preguntas </h1>
        <br><br><br><br><br><br>
<!-- Formulario que carga un combo para indicar el filtro de busqueda -->
 <form method="POST" action="">
 	<input type="hidden" name="buscarpregunta" />
 	<h4>Buscar curso: 
 		<select name="seleccion">
 			<option value="Tipo">Tipo</option>
 			<option value="Tema">Tema</option>
 			<option value="Enunciado">Enunciado</option>
 		</select>
 		<input name="pregunta" type="text">
 		<input type="submit"  class="btn btn-info" value="Buscar"> </h4>
 </form>

  <form method="POST" action="">  
       <input type="hidden" name="vertodos" />
       <input type="submit"   class="btn btn-info" value="Ver todos"> 
       
	<!-- envia al archivo insertarpregunta -->	
	<a class="btn btn-default" href="./insertarpregunta.php" >Agregar nueva pregunta</a>
    </form>

<br><br>


<!-- Tabla que cargara los datos que se han solicitado en el form anterior -->
<?php if($res!=null){?>
<table class="table table-striped">
	<tr>
		<th>Enunciado</th>
		<th>Respuesta</th>
		<th>Valor</th>
		<th>Tipo</th>
		<th></th>
		<th></th>
	</tr>
	
	<!-- Se obtienen los datos que ha generado la consulta-->
	<?php while($fila=mysqli_fetch_array($res)){ ?>

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
 				<span class="glyphicon glyphicon-pencil" ><input class="btn btn-success" href="./editarpregunta.php" type="submit" value="Editar" />
			</form>
		<td>
			<form action="" method="post"><!-- boton eliminar que envia los parametros -->
				<input type="hidden" name="eliminar"  value="si" />
				<input type="hidden" name="idpreg" value= <?php echo $fila['IdPregunta']; ?> /> <!-- envia idpregunta-->
				<input type="hidden" name="idtem" value= <?php echo $fila['IdTemaP']; ?> /> <!-- envia idtema -->
				 <span class="glyphicon glyphicon-trash" ><input class="btn btn-danger" type="submit" value="Eliminar" />
			</form>
		</td>
	</tr>

	<?php } ?>
	</table>
	<?php } else { echo "<div class='alert alert-warning'>No se han encontrado preguntas</div>";  }?>
	<br><br>

</div>	


   </body>
</html>