<!DOCTYPE html>
<?php 
include './barraSesion.php';
?>
<html lang="es">
    <head>
        <title>Curso</title>
    </head>

    <link href="css/EstiloPrincipal.css" rel="stylesheet" type="text/css" />

    <body>

        <h1 class="h1">Administración de Cursos </h1>
        <br><br><br><br><br><br>
        <?php 
            include './data/CursoData.php';

            // muestra todos los cursos 
	        if (isset($_POST['vertodos']) ){                    
           	           $res=obtenerCurso();

	        }else  if(isset($_POST['buscarcurso']) and $_POST['seleccion'] == 'Sigla'){
               //se llama a la funcion que busca el curso por sigla
                $res=obtenerCursoSigla($_POST['curso']);	

            }else  if(isset($_POST['buscarcurso']) and $_POST['seleccion'] == 'Nombre'){
			 //se llama a la funcion que busca el curso por nombre
                $res=obtenerCursoNombre($_POST['curso']);
 	        } 
        ?>


<!-- Formulario que carga un combo para indicar el filtro de busqueda -->
 <form method="POST" action="">  
        <input type="hidden" name="buscarcurso" />
          <h4>Buscar curso: 
            <select name="seleccion">
                <option value="Sigla">Sigla</option>
                <option value="Nombre">Nombre</option>
            </select>

    <input name="curso" type="text"> 
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
        <th>Sigla</th>
        <th>Nombre</th>
        <th>Descripcion</th>
        <th>Nivel</th>
        <th></th>
        <th></th>
    </tr>

<!-- Se obtienen los datos que ha generado la consulta-->
<?php while($fila=mysqli_fetch_array($res)){ ?>
    <tr>
        <td><?php echo $fila['Sigla']; ?></td>
        <td><?php echo $fila['Nombre']; ?></td>
        <td><?php echo $fila['Descripcion']; ?></td>
        <td><?php echo $fila['NivelCurso']; ?></td>
        <td><!-- form para el boton editar -->
            <form action="editarcurso.php" method="post"><!-- boton editar que envia los parametros -->
                <input type="hidden" name="editar"  value="si" />
                <input type="hidden" name="sig" value= <?php echo $fila['Sigla']; ?> /> <!-- envia Sigla-->
                <input type="hidden" name="nom" value= "<?php echo $fila['Nombre']; ?>" /> <!-- envia Nombre-->
                <input type="hidden" name="des" value= "<?php echo $fila['Descripcion']; ?>"/> <!-- envia Descripcion-->
                <input type="hidden" name="niv" value= <?php echo $fila['NivelCurso']; ?> /><!-- envia Nivel-->
                <input href="./editarcurso.php" type="submit" value="Editar" />    
            </form>                
        <td><!-- form para el boton eliminar -->
            <form action="" method="post"><!-- boton eliminar que envia los parametros -->
                <input type="hidden" name="eliminar"  value="si" />
                <input type="hidden" name="sig" value= <?php echo $fila['Sigla']; ?> /> <!-- envia Sigla-->
                <input type="submit" value="Eliminar" />
            </form>
        </td>
    </tr>

<?php }  ?>
</table>

<?php } else { echo "No se han encontrado cursos";  }?>

<br><br>
<!-- envia al archivo insertarcurso-->
<a href="./insertarcurso.php" >Agregar nuevo curso</a>

<?php //mysql_close($con); ?>
    </body>
</html>