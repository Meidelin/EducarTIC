<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
    </head>
    <body>
    
    <h1> INFOTUTOR </h1>
    <br><br><br><br><br><br>
        
    <center>
        <h1> INICIAR SESIÓN </h1>
       
        <section>
            <form method="POST" action="sesion/validarLogIn.php">  
        
                <input name="nombreUsuario" type="text" placeholder="Nombre de Usuario" required> <br><br>
                <input name="pass" type="password" placeholder="Contraseña" required> <br><br>

                <input type="submit" value="Iniciar Sesión" id="botones">
        
            </form>
        </section>
    
    </center>     
        
    </body>
</html>

<?php 
    session_start();

    echo $_SESSION['usuario'];
?>