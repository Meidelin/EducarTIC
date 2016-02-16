<!DOCTYPE html>

<?php 
include './barraSesion.php';

//obtiene los datos del curso seleccionado que se envian desde CursoData.php
if(isset($_POST['editar']) and $_POST['editar'] == 'si'){
                
     $sig = $_POST['sig'];   
     $nom = $_POST['nom'];    
     $des = $_POST['des'];    
     $niv = $_POST['niv'];     
}
?>
<div class="container">
  <h1 class="h1">Administración de Cursos </h1>
    <br><br><br><br>
  <center>
    <button class="btn btn-success" type="button" onClick="location.href = 'AdministracionCursos.php'">Regresar</button>
    <table>
      <tr><th><h3>Modificar Curso </h2><th></tr>
      <!-- Formulario que obtiene los datos del curso y los modifica -->
      <tr> <form method="POST" action="./negocio/CursoLogica.php">
        <!-- Sigla campo no editable -->
        <td> 
          Sigla curso:<input name="Sigla" type="text" class="form-control" value= <?php echo $sig;  ?>  readonly="readonly" required>
          <!-- Campos para modificar -->
          Nombre: <textarea class="form-control" style="resize:none;"cols="30" rows="1" name="Nombre" required><?php  echo $nom;?> 
          </textarea>  
          Descripcion:<textarea class="form-control" style="resize:none;" cols="30" rows="5" name="Descripcion" required><?php  echo $des;?> 
          </textarea>
          Nivel:<input class="form-control" name="NivelCurso" type="text" value= <?php  echo $niv;?> required>

          <br>

          <!-- Valor de la accion que se espera en CursoLogica -->
          <input name="accion" type="hidden" value="2">
          <!-- Boton para insertar el curso -->          
          <input class="btn btn-info" type="submit" value="Guardar">
        </td>
      </tr>
    </form>
  </table>
</center>
</div>