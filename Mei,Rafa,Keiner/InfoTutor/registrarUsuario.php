<html>

<!-- Interfaz de registro de usuarios !-->

    <head>
        <meta charset="UTF-8">
        <script type="text/javascript" src="./js/jquery-2.1.4.js"></script>
        <script type="text/javascript" src="./js/validacionesRegistro.js"></script>

        <title></title>
    </head>
    <body>
    
    <h1> REGISTRARSE </h1>
    
    <br><br><br><br><br><br>
        
    <center>
       
        <section id="registro">
            <form method="POST" action="./negocio/LogicaUsuario.php">  
        
                <input name="nombre" type="text" placeholder="Nombre" required> <br><br>
                <input name="apellidos" type="text" placeholder="Apellidos" required> <br><br>
                <input name="usuario" type="text" placeholder="Nombre Usuario" required> <br><br>
                <input name="correo" type="text" placeholder="Correo Electrónico" required> <br><br>
                <input id="pass" name="pass" type="password" placeholder="Contraseña" required> 
                <input type="text" id="seguro" style="visibility:hidden; position:absolute;" ><br><br>
                <input id="pass2" name="pass2" type="password" placeholder="Comprobar Contraseña" required> <br><br>
                
                <input name="accion" type="hidden" value="1">
                <input name="tipo" type="hidden" value="estudiante">
                <input name="nivel" type="hidden" value="0">
                
                <input type="submit" value="Registrarse">

                <button type="button" onClick="location.href = './index.php'">
                    Cancelar
                </button>
        
            </form>
        </section>
    
    </center>     
        
    </body>
</html>