<?php 
include './barraSesion.php';
?>
<html lang="es">
    <head>
        <title>Pregunta</title>
    </head>
    <body >
<br><br>
        <h1>Administracion de Temas </h1>
        <?php 
        include './data/TemaData.php';

        // muestra todos los temas 
	        if (isset($_POST['vertodos'])){                    
           	           $res=obtenerTema();

	        }else  if(isset($_POST['buscartema']) and $_POST['seleccion'] == 'Sigla'){
               //se llama a la funcion que busca el tema por sigla
                $res=obtenerTemaSigla($_POST['tema']);	

            }else  if(isset($_POST['buscartema']) and $_POST['seleccion'] == 'Nombre'){
			 //se llama a la funcion que busca el tema por nombre
                $res=obtenerTemaNombre($_POST['tema']);
 	        }

        ?>

 <!-- Formulario que carga un combo para indicar el filtro de busqueda -->
 <form method="POST" action="">  
        <input type="hidden" name="buscartema" />
          <h4>Buscar tema: 
            <select name="seleccion">
                <option value="Sigla">Sigla</option>
                <option value="Nombre">Nombre</option>
                <option value="Todo">Ver todo</option>
            </select>

    <input name="tema" type="text"> 
    <input type="submit" value="Buscar"> </h4>
    </form>
    
 <form method="POST" action="">  
       <input type="hidden" name="vertodos" />
       <input type="submit" value="Ver todos"> 
    </form>
<br><br>


<!-- Tabla que cargara los datos que se han solicitado en el form anterior -->
<?php if($res!=null){?>
<table border="1">
	<tr>
		<th>Sigla Curso</th>
		<th>Nombre del Tema</th>
		<th></th>
		<th></th>
	</tr>

<!-- Se obtienen los datos que ha generado la consulta-->
<?php while($fila=mysqli_fetch_array($res)){ ?>
<tr><!-- Se obtienen los valores y se muestran en la tabla -->
	<td><?php echo $fila['siglaCursoT']; ?></td>
	<td><?php echo $fila['NombreT']; ?></td>
	<!-- redirecciona al archivo editartema.php -->
	<td>
		<form action="editartema.php" method="post"><!-- boton editar que envia los parametros -->
			<input type="hidden" name="editar"  value="si" />
			<input type="hidden" name="idtem" value= <?php echo $fila['IdTema']; ?> /> <!-- envia IdTema-->
			<input type="hidden" name="sig" value= <?php echo $fila['siglaCursoT']; ?> /> <!-- envia SiglaCurso-->
			<input type="hidden" name="nom" value= "<?php echo $fila['NombreT']; ?>" /> <!-- envia NombreTema-->
			<input href="./editartema.php" type="submit" value="Editar" />
		</form>
    <td>
    	<form action="" method="post"><!-- boton eliminar que envia los parametros -->
    	    <input type="hidden" name="eliminar"  value="si" />
    	    <input type="hidden" name="idtem" value= <?php echo $fila['IdTema']; ?> /> <!-- envia idtema -->
    	    <input type="hidden" name="sig" value= <?php echo $fila['siglaCursoT']; ?> /> <!-- envia SiglaCurso-->
    	    <input type="submit" value="Eliminar" />
    	</form>
    </td>
</tr>

<?php } ?>
</table>
<?php } else { echo "No se han encontrado temas";  } ?>
<br><br>

<!-- envia al archivo insertartema -->
<a href="./insertartema.php" >Agregar nuevo Tema</a>

    </body>
</html>