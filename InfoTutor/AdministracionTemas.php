<!DOCTYPE html>
<?php 
include './barraSesion.php';
include './data/TemaData.php';
// muestra todos los temas
$res=obtenerTema();
if(isset($_POST['buscartema']) and $_POST['seleccion'] == 'Sigla'){
//se llama a la funcion que busca el tema por sigla
    $res=obtenerTemaSigla($_POST['tema']); 

}else  if(isset($_POST['buscartema']) and $_POST['seleccion'] == 'Nombre'){
//se llama a la funcion que busca el tema por nombre
    $res=obtenerTemaNombre($_POST['tema']);
}
?>
<html lang="es">
<head>
    <title>Pregunta</title>
</head>
<link href="css/EstiloPrincipal.css" rel="stylesheet" type="text/css" />
<body >
    <div class="container">
        <h1 class="h1">Administración de Temas </h1>
        <br><br><br><br><br><br>
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
            <input type="submit" value="Buscar"  class="btn btn-info"></h4>
        </form>
        <form method="POST" action="">
            <input type="hidden" name="vertodos" />
            <input type="submit" value="Ver todos"  class="btn btn-info">
             <!-- envia al archivo insertartema -->
             <a class="btn btn-default" href="./insertartema.php" >Agregar nuevo Tema</a>
         </form><br><br>

         <!-- Tabla que cargara los datos que se han solicitado en el form anterior -->
         <?php if($res!=null){?>
         <table class="table table-striped">
            <tr>
                <th>Sigla Curso</th>
		        <th>Nombre del Tema</th>
		        <th>Editar</th>
		        <th>Eliminar</th>
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
                        <span class="glyphicon glyphicon-pencil" ><input class="btn btn-success" href="./editartema.php" type="submit" value="Editar" />
                        </form>
                        <td>
                            <form action="" method="post"><!-- boton eliminar que envia los parametros -->
                                <input type="hidden" name="eliminar"  value="si" />
                                <input type="hidden" name="idtem" value= <?php echo $fila['IdTema']; ?> /> <!-- envia idtema -->
                                <input type="hidden" name="sig" value= <?php echo $fila['siglaCursoT']; ?> /> <!-- envia SiglaCurso-->
                                <span class="glyphicon glyphicon-trash" > <input class="btn btn-danger" type="submit" value="Eliminar" />
    	                   </form>
                        </td>
            </tr>
            <?php } ?>
        </table>
        <?php } else { echo "<div class='alert alert-warning'> No se han encontrado temas </div>";  } ?>
    </div>
</body>
</html>