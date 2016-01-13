<?php 
session_start();
include './sesion/comprobarConexion.php';
comprobarConexion();
?>
<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
    </head>
    <body>
    
    <section style="float: right;"> 
        
        Usuario: <?php echo $_SESSION['usuario'];?> 
        
        <button type="button" onClick="location.href = 'sesion/cerrarSesion.php'">
            Cerrar Sesión
        </button>
        
    </section>    
        
    </body>
</html>
