<!DOCTYPE html>
<?php include"barraSesion.php";
include 'data/dataCurso.php';
include 'negocio/LogicaMatricula.php';
$curso=getCurso($_GET['curso']);
$row=$curso->fetch_assoc();
?>
<html>
    <head>
        <meta charset="UTF-8">  <!-- Interfaz de informacion de cursos!-->
        <title></title>
    </head>
    <body>
    
    <h1 style="display:inline;"> <?php echo mb_convert_encoding($row['Nombre'], "UTF-8"); ?> </h1>
    <br>
    <h3 style="display:inline;"> <?php echo $row['Sigla'] ?> </h3>
    <br><br>
        <button type="button" 
        onClick="location.href = 'negocio/LogicaMatricula.php?accion=1&a=<?php echo $_SESSION['id']."&curso=".$row['Sigla']?>'">
                    Matricular
        </button>
    <br><br><br><br>
        
    <center>
        <h1>Contenidos del Curso</h1>
       <?php
            $temas=getTemasCurso($_GET['curso']);
            
            while($row=$temas->fetch_assoc()){

                echo $row['NombreT'];

            }
 
        ?>
        <section>



        </section>
    
    </center>     
        
    </body>
</html>