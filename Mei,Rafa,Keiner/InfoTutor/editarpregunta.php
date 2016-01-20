<?php 
include 'pregunta.php';


//obtiene los datos de la pregunta seleccionada que se envian desde PreguntaData.php
if(isset($_POST['editar']) and $_POST['editar'] == 'si'){
                
     $idpreg = $_POST['idpreg'];   
     $idtem = $_POST['idtem'];    
     $cont = $_POST['cont'];    
     $resp = $_POST['resp'];    
     $val = $_POST['val'];    
     $tip = $_POST['tip'];     
}
?>
<center>
<table border="1">
<tr>
<th><h3>Modificar pregunta </h2><th>
</tr>
  <section>
    <!-- Formulario que obtiene los datos de la pregunta y los modifica -->
   <tr> <form method="POST" action="./negocio/PreguntaLogica.php">             
      <!-- IdPregunta campo no editable -->
      <td> Pregunta:<input name="IdPregunta" type="text"  
              value= <?php echo $idpreg;  ?>  readonly="readonly" required>  
              <br><br>
      <!-- IdTema campo no editable -->
      Tema: <input name="IdTema" type="text"  
             value= <?php  echo $idtem;?> readonly="readonly" required>               
            <br><br>
      <!-- Campos para modificar -->
      Contenido de la pregunta: <br><br> <textarea cols="30" rows="5" name="Contenido" placeholder= <?php  echo $cont;?> required></textarea><br><br>
      Respuesta: <br><br><textarea cols="30" rows="5" name="Respuesta" placeholder= <?php  echo $resp;?>  required></textarea><br><br>
      Valor (puntaje):<input name="Valor" type="text"  value= <?php  echo $val;?>  required> <br><br>
      Tipo<input name="Tipo" type="text" value= <?php  echo $tip;?> required> <br><br>
        
      <!-- Valor de la accion que se espera en PreguntaLogica -->        
      <input name="accion" type="hidden" value="2">
      <!-- Boton para insertar la pregunta -->          
      <input type="submit" value="Guardar">

      <button type="button" onClick="location.href = 'pregunta.php'">
                    Cancelar
      </button></tr>
        
    </form>
  </section>
  </table>
</center>
