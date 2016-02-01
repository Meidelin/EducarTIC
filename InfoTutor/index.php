<!DOCTYPE html>
<html>
<head>
    <title></title>
</head>
<body>

</body>
</html>
<html lang="en">
    <head>
        <meta charset="UTF-8">        
        <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
        <title>Ingreso al Sistema</title>
        <link rel="stylesheet" href="./bootstrap/css/style.css">
    </head>
    <body>        
    <br><br>

        <center>     

            <img src="images/icono.png" ALIGN="absmiddle" Style="position:relative;left: 2%; height: 250px;">

      
            <form class="login" method="POST" action="negocio/validarLogIn.php">  
        
                <p>
                    <label for="login">Usuario</label>
                    <input id="login" name="nombreUsuario" type="text" placeholder="Nombre de Usuario" required>
                </p>
                
                <p>
                    <label for="login">Clave</label>
                    <input id="password" name="pass" type="password" placeholder="Contraseña" required>            
                </p>

                <p class="login-submit">
                    
                    <button class="login-button" type="submit" value="Iniciar Sesión">
                    
                    Login
                    
                    </button>                    
                </p>

                <p class="forgot-password">
                    
                    <a href="./negocio/recuperarPass.php">¿olvidó su contraseña?</a>
                </p>

                <p class="forgot-password">
                    
                    <a href ="./registrarUsuario.php">Registrarse</a>

                </p>              
        
            </form>
        </center>       
    </body>
</html>