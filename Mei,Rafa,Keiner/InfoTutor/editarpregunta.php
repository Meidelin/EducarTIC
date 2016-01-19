<?php 
//include './barraSesion.php';
include 'pregunta.php';

if(isset($_POST['editar']) and $_POST['editar'] == 'si'){
                
     $idpreg = $_POST['idpreg'];   
     $idtem = $_POST['idtem'];    
     $cont = $_POST['cont'];    
     $resp = $_POST['resp'];    
     $val = $_POST['val'];    
     $tip = $_POST['tip'];     
}
?>


<html lang="es">
    <head>
        <title>Pregunta</title>
    </head>
    <body >

        <h3>Modificar pregunta </h2>
      <section>
            <form method="POST" action="./negocio/PreguntaLogica.php">  
            
                Pregunta:<input name="IdPregunta" type="text"  
                        value= <?php echo $idpreg;  ?> required> 
                
                        <br><br>
                Tema: <input name="IdTema" type="text"  
                        value= <?php  echo $idtem;?> required> 
                
                        <br><br>
                Contenido de la pregunta: <input name="Contenido" type="text"  value= <?php  echo $cont;?>  required> <br><br>
                Respuesta:<input name="Respuesta" type="text"  value= <?php  echo $resp;?>  required> <br><br>
                Valor (puntaje):<input name="Valor" type="text"  value= <?php  echo $val;?>  required> <br><br>
                Tipo<input name="Tipo" type="text" value= <?php  echo $tip;?> required> <br><br>
                
                <input name="accion" type="hidden" value="2">
                <input name="tipo" type="hidden" value="estudiante">
                
                <input type="submit" value="Guardar">

                <button type="button" onClick="location.href = 'pregunta.php'">
                    Cancelar
                </button>
        
            </form>
        </section>
    

    </body>
</html>
