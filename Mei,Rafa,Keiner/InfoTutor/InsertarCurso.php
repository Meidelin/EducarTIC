<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
    </head>
    <body>
    
    <h1> ADMINISTRAR CURSO </h1>
    
    <br><br><br><br><br><br>
        
    <center>
       
        <section>
            <form method="POST" action="./negocio/LogicaCurso.php">  
        
                <input name="nombre" type="text" placeholder="Nombre" required> <br><br>
                <input name="apellidos" type="text" placeholder="Apellidos" required> <br><br>
                <input name="usuario" type="text" placeholder="Usuario" required> <br><br>
                <input name="correo" type="text" placeholder="Correo Electrónico" required> <br><br>
                <input name="pass" type="password" placeholder="Contraseña" required> <br><br>
                <input name="pass" type="password" placeholder="Comprobar Contraseña" required> <br><br>
                
                <input name="accion" type="hidden" value="1">
                <input name="tipo" type="hidden" value="estudiante">
                
                <input type="submit" value="Registrarse">

                <button type="button" onClick="location.href = '../index.php'">
                    Cancelar
                </button>
        
            </form>
        </section>
    
    </center>     
        
    </body>
</html>