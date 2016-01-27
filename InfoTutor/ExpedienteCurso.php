<?php
include"barraSesion.php";
include 'negocio/LogicaCurso.php';
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
        <script type="text/javascript" src="./js/InformacionUsuario.js"></script>
        <title></title>
    </head>
    <body>
    
    <h1> EXPEDIENTE</h1>
        
            <h2> <?php echo $row['Sigla']." - ".$row['Nombre'];?> </h2>

    <br><br>
        <section>
            
            <h1 style="display:inline;">Contenidos Vistos </h1> 
            <h1 style="display:inline; position: relative; left: 29%;">Practicas Realizadas </h1>
            <h1 style="display:inline; position: relative; left: 55%;">Pruebas Realizadas </h1>

            <br><br>
            
            <form method="POST" action="negocio/LogicaUsuario.php?accion=2">


                
            </form>
    
        </section>

    </body>
</html>