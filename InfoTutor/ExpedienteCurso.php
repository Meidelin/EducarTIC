<!DOCTYPE html>
<?php
include"barraSesion.php";
include 'negocio/LogicaCurso.php';
include 'negocio/TemaLogica.php';
$Curso=GetCurso($_GET['a']);
$row=$Curso->fetch_assoc();
?>

<!-- Interfaz de informacion de usuarios para los administradores, aqui se cargan los datos personales,
    cursos matriculados en caso de ser estudiante o cursos a cargo en caso de ser administrador,
    y la participacion de dicho usuario en los foros!-->

<html>
    <head>
        <meta charset="UTF-8">
        <script type="text/javascript" src="./js/jquery-2.1.4.js"></script>
        <link href="css/EstiloPrincipal.css" rel="stylesheet" type="text/css" />
        <title></title>
    </head>
    <body>
    
    <h1 class="h1"> Expediente</h1>
    <br><br><br><br><br><br>
        
            <h2> <?php echo $row['Sigla']." - ".$row['Nombre'];?> </h2>

    <br><br>
        <section>
            
            <h1 style="display:inline;">Contenidos Vistos </h1> 
            <h1 style="display:inline; position: relative; left: 15%;">Practicas Realizadas </h1>
            <h1 style="display:inline; position: relative; left: 28%;">Pruebas Realizadas </h1>

            <br><br>

            <section>

                <?php
                    $temas=getTemasCurso($_GET['a']);
                    $temas->data_seek(1);
                    while($row=$temas->fetch_assoc()){

                        echo $row['NombreT']." [".temasVistos($row['IdTema'])."] <br><br> ";

                    }
 
                ?>

            </section>
                <?php

                ?>
            <section>

            </section>

            <br><br>
            
            <form method="POST" action="negocio/LogicaUsuario.php?accion=2">


                
            </form>
    
        </section>

    </body>
</html>