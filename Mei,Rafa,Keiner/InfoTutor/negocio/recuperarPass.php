<html>
    <head>
        <meta charset="UTF-8"> <!-- GUI para recuperar contraseña !-->
        <title></title>
    </head>
    <body>
    
    <h1> RECUPERAR CONTRASEÑA </h1>
    
    <br><br><br><br><br><br>
        
    <center>
       
        <section>
            <form method="POST" action="">  <!-- EN PROCESO.!!!! !-->
        
                Por favor ingrese el correo electrónico con el que se ha registrado, <br> 
                posteriormente haga clic en "Recuperar", se le enviara un correo a la <br>
                dirección con las indicaciones para recuperar su contraseña. <br><br>

                <input name="correo" type="text" placeholder="Correo Electrónico" required> <br><br>

                <input type="submit" value="Recuperar">

                <button type="button" onClick="location.href = '../index.php'">
                    Cancelar
                </button>
        
            </form>
        </section>
    
    </center>     
        
    </body>
</html>