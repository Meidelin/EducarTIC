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
            <form method="POST" action="negocio/validarLogIn.php">  
        
                <input name="nombreUsuario" type="text" placeholder="Nombre de Usuario" required> <br><br>
                <input name="pass" type="password" placeholder="Contraseña" required> <br>
                <a href="./negocio/recuperarPass.php">¿olvidó su contraseña?</a>
                <br><br>

                <input type="submit" value="Iniciar Sesión">

                <button type="button" onClick="location.href = './registrarUsuario.php'">
                    Registrarse
                </button>
        
            </form>
        </section>
    
    </center>     
        
    </body>
</html>