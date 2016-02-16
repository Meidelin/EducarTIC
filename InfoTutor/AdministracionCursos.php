<!DOCTYPE html>
<?php 
include './barraSesion.php';
include './data/CursoData.php';

// muestra todos los cursos 
$res=obtenerCurso();

if(isset($_POST['buscarcurso']) and $_POST['seleccion'] == 'Sigla'){
//se llama a la funcion que busca el curso por sigla
    $res=obtenerCursoSigla($_POST['curso']);

}else  if(isset($_POST['buscarcurso']) and $_POST['seleccion'] == 'Nombre'){
//se llama a la funcion que busca el curso por nombre
    $res=obtenerCursoNombre($_POST['curso']);
} 
?>

<html lang="es">
<head>
    <title>Curso</title>
</head>
<link href="css/EstiloPrincipal.css" rel="stylesheet" type="text/css" />
<script type="text/javascript" src="./js/jquery-2.1.4.js"></script>
<script type="text/javascript" src="./js/InformacionUsuario.js"></script>
<body>
    <div class="container">
        <h1 class="h1">Administración de Cursos </h1>
        <br><br><br><br><br><br>
        <!-- Formulario que carga un combo para indicar el filtro de busqueda -->
        <form method="POST" action="">
            <input type="hidden" name="buscarcurso" />
            <h4>Buscar curso: 
            <select name="seleccion">
                <option value="Sigla">Sigla</option>
                <option value="Nombre">Nombre</option>
            </select>
            <input name="curso"  type="text">
            <input type="submit" class="btn btn-info" value="Buscar"> </h4>
        </form>

        <form method="POST" action="" >
            <input type="hidden" name="vertodos" />
            <input type="submit" class="btn btn-info" value="Ver todos">
            <!-- envia al archivo insertarcurso-->
            <a href="./insertarcurso.php"  class="btn btn-default"> Agregar nuevo curso</a>
            <br><br>
        </form>
        <!-- Tabla que cargara los datos que se han solicitado en el form anterior -->
        <?php if($res!=null){?>
        <center>
            <table class="table table-striped">
                <tr>
                    <th>Sigla</th>
                    <th>Nombre</th>
                    <th>Descripcion</th>
                    <th>Nivel</th>
                    <th>Editar</th>
                    <th>Eliminar</th>
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
                            <span class="glyphicon glyphicon-pencil"> <input class="btn btn-success" type="submit" value="Editar" />    
                        </form>
                        <td><!-- form para el boton eliminar -->
                            <form action="" method="post"><!-- boton eliminar que envia los parametros -->
                                <input type="hidden" name="eliminar"  value="si" />
                                <input type="hidden" name="sig" value= <?php echo $fila['Sigla']; ?> /> <!-- envia Sigla-->
                                <span class="glyphicon glyphicon-trash" > 
                                <input class="btn btn-danger" type="submit" value="Eliminar" /> </span>
                            </form>
                        </td>
                </tr>
                <?php }  ?>
            </table>
        </center>

        <?php } else { echo "<div class='alert alert-warning'>No se han encontrado cursos</div>";  }?>
    </div>
</body>
</html>