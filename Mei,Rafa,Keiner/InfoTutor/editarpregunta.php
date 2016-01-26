<?php 
include 'AdministracionPreguntas.php';


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
      Contenido de la pregunta: <br><br> <textarea style="resize:none;" cols="30" rows="5" name="Contenido" required><?php  echo $cont;?> </textarea><br><br>
      Respuesta: <br><br><textarea style="resize:none;" cols="30" rows="5" name="Respuesta" required><?php  echo $resp;?> </textarea><br><br>
      <!-- <input name="Valor" type="text"  value= <?php  echo $val;?>  required> <br><br> -->
      Tipo <select id="Tipo" onchange="ShowSelected();" name="Tipo">>                
                                <option>Seleccion el tipo de pregunta</option>                    
                                <option value='1'>Seleccion unica</option>                   
                                <option value='2'>Respuesta Breve</option>                 
                       </select> 
                   <br><br>

        
      <!-- Valor de la accion que se espera en PreguntaLogica -->        
      <input name="accion" type="hidden" value="2">
      <!-- Boton para insertar la pregunta -->          
      <input type="submit" value="Guardar">

      <button type="button" onClick="location.href = 'AdministracionPreguntas.php'">
                    Cancelar
      </button></tr>
        
    </form>
  </section>
  </table>
</center>
