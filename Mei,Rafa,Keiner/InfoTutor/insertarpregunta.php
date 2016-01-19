<?php 
include 'pregunta.php';
?>
<html lang="es">
    <head>
        <title>Pregunta</title>
    </head>
    <body >

        <h3>Insertar Pregunta </h2>
      <section>
            <form method="POST" action="./negocio/PreguntaLogica.php">  
        
                Tema: <select name="IdTema">
                            <option value="1">valor_1</option>
                            <option value="2">valor_2</option>

                        </select> <br><br>
                Contenido de la pregunta: <input name="Contenido" type="text" required> <br><br>
                Respuesta:<input name="Respuesta" type="text" required> <br><br>
                Valor (puntaje):<input name="Valor" type="text"> <br><br>
                Tipo<input name="Tipo" type="text" > <br><br>
                
                <input name="accion" type="hidden" value="1">                
                <input type="submit" value="Guardar">

                <button type="button" onClick="location.href = 'pregunta.php'">
                    Cancelar
                </button>
        
            </form>
        </section>
    

    </body>
</html>