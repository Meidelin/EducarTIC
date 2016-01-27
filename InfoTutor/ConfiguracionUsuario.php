<?php
include"barraSesion.php";
include 'negocio/LogicaUsuario.php';
$usuario=buscarUsuarios("IdUsuario",$_SESSION['id']);
$row=$usuario->fetch_assoc();

//menu de configuracion de la cuenta de usuario

?>

<html>
    <head>
        <meta charset="UTF-8">
        <script type="text/javascript" src="./js/jquery-2.1.4.js"></script>
        <script type="text/javascript" src="./js/InformacionUsuario.js"></script>
        <title></title>
    </head>
    <body>
    
    <h1> CONFIGURACIÓN DE CUENTA </h1>
    <button type="button" onClick="cambiarFormularioDatos()">
            DatosPersonales
        </button>
    <button type="button" onClick="cambiarFormularioPass()">
            CambiarContraseña
        </button>
    <br><br><br><br>
    
        <section id="datos">
            <center>
            <h1 style="display:inline;">Datos Personales</h1>
            
            <button type="button" onClick="habilitarEdicion()">
                    Modificar
            </button>
            <br><br>
            
            <form method="POST" action="negocio/LogicaUsuario.php?accion=2">

                <!-- form para modificar los datos personales de usuario !-->

                <input type="hidden" name="id" value="<?php echo $row['IdUsuario'];?>">
                <input name="nivel" type="hidden" value="<?php echo $row['Nivel'];?>">
                <input name="conf" type="hidden" value="conf">
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
                
                <br><br>
                
                <input id="cambiar" type="submit" value="Aplicar Cambios" style="visibility:hidden;">
                
                
                <button id="cancelar" type="button" onClick="cancelarEdicion()" style="visibility:hidden;">
                    Cancelar
                </button>
                
            </form>
            
            </center>
        </section>
    
    <section id="datosPass" style="visibility: hidden; position: absolute; top :25%; left: 40%;">
            <h1 style="display:inline;">Cambiar Contraseña</h1>
            <br><br>
            <center>
            <form id="cambiarPassForm" method="POST" action="negocio/LogicaUsuario.php?accion=3">

                <!-- form para cambiar la contraseña!-->
                
                <input type="hidden" name="id" value="<?php echo $row['IdUsuario'];?>">

                <input id="pass1" name="pass1" type="password" placeholder="Contraseña Actual" required><br><br>
                <input id="pass2" name="pass2" type="password" placeholder="Nueva Contraseña" required>
                <br><br>
                
                <?php $passOriginal=  getPass($row['Usuario'])?>
                
                <button id="cambiarPass" type="button" onClick="comprobarPass(<?php echo $passOriginal?>)">
                    Cambiar Contraseña
                </button>
            </form> 
            </center>
        </section>

    </body>
</html>