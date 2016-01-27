<?php 
include 'AdministracionCursos.php';

//obtiene los datos del curso seleccionado que se envian desde CursoData.php
if(isset($_POST['editar']) and $_POST['editar'] == 'si'){
                
     $sig = $_POST['sig'];   
     $nom = $_POST['nom'];    
     $des = $_POST['des'];    
     $niv = $_POST['niv'];     
}
?>
<center>
<table border="1">
<tr>
<th><h3>Modificar Curso </h2><th>
</tr>
  <section>
    <!-- Formulario que obtiene los datos del curso y los modifica -->
   <tr> <form method="POST" action="./negocio/CursoLogica.php">             
      <!-- Sigla campo no editable -->
      <td> Sigla curso:<input name="Sigla" type="text"  
              value= <?php echo $sig;  ?>  readonly="readonly" required>  
              <br><br>
      <!-- Campos para modificar -->
      Nombre: <br><br> <textarea style="resize:none;"cols="30" rows="1" name="Nombre" required><?php  echo $nom;?> </textarea>              
            <br><br>
      Descripcion: <br><br> <textarea style="resize:none;" cols="30" rows="5" name="Descripcion" required><?php  echo $des;?> </textarea><br><br>
      Nivel:<input name="NivelCurso" type="text" value= <?php  echo $niv;?> required>               
            <br><br>

      <!-- Valor de la accion que se espera en CursoLogica -->        
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