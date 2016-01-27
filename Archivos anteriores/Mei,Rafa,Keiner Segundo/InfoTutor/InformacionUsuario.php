<?php
include"barraSesion.php";
include 'negocio/LogicaUsuario.php';
$usuario=buscarUsuarios("IdUsuario",$_GET['a']);
$row=$usuario->fetch_assoc();
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
    
    <h1> INFORMACIÓN DE <?php echo $row['Usuario'];?> </h1>
        
            <h2>Tipo de Usuario: <?php echo $row['Tipo'];?></h2>

    <br><br><br><br>
        <section>
            
            <h1 style="display:inline;">Datos Personales</h1>
            
            <button type="button" onClick="habilitarEdicion()">
                    Modificar
            </button>
            <br><br>
            
            <form method="POST" action="negocio/LogicaUsuario.php?accion=2">

                <!-- form de datos personales de usuarios !-->  
                
                ID:
                <input id="id" name="id" type="number" placeholder="id" required 
                       value="<?php echo $row['IdUsuario'];?>" disabled>
                <br><br>
                Nombre:
                <input id="nombre" name="nombre" type="text" placeholder="Nombre" required 
                       value="<?php echo $row['Nombre'];?>" disabled>
                <br><br>
                Apellidos:
                <input id="apellidos" name="apellidos" type="text" placeholder="Apellidos" required 
                       value="<?php echo $row['Apellidos'];?>" disabled>
                <br><br>
                Nombre de Usuario:
                <input id="usuario" name="usuario" type="text" placeholder="Nombre Usuario" required 
                       value="<?php echo $row['Usuario'];?>" disabled>
                <br><br>
                Correo Electrónico:
                <input id="correo" name="correo" type="text" placeholder="Correo Electrónico" required 
                       value="<?php echo $row['Correo'];?>" disabled>
                   
                <?php if($row['Tipo']==="estudiante"){?>
                
                    <br><br>
                    Nivel:
                    <input id="nivel" name="nivel" type="number" placeholder="Nivel" required 
                       value="<?php echo $row['Nivel'];?>" disabled>
                    <br><br>
                
            <?php } ?>
                
                
                <input id="cambiar" type="submit" value="Aplicar Cambios" style="visibility:hidden;">
                
                
                <button id="cancelar" type="button" onClick="cancelarEdicion()" style="visibility:hidden;">
                    Cancelar
                </button>
                
            </form>
    
        </section>

    </body>
</html>