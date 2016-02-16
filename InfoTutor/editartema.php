<!DOCTYPE html>

<?php 
//include './barraSesion.php';
include './barraSesion.php';
include './data/TemaData.php';

//obtiene los datos del tema seleccionada que se envian desde TemaData.php
if(isset($_POST['editar']) and $_POST['editar'] == 'si'){
                 
     $idtem = $_POST['idtem'];    
     $sig = $_POST['sig'];   
     $nom = $_POST['nom'];       
}
?>
<div class="container">
    <h1 class="h1">Administración de Temas </h1>
    <br><br><br><br>

    <center>
        <button class="btn btn-success"  type="button" onClick="location.href = 'AdministracionTemas.php'">Regresar</button>

        <table>
            <tr><th><h3>Modificar tema </h2></th></tr>

            <!-- Formulario que obtiene los datos del tema y los modifica -->
            <tr>  <form method="POST" action="./logica/TemaLogica.php">
                <!-- IdTema campo no editable -->
                <td>  Tema:<input class="form-control" name="IdTema" type="text" value= <?php echo $idtem; ?> readonly="readonly" required>
                      <!-- SiglaCursoTema campo no editable -->
                      Sigla: <input class="form-control" name="SiglaCursoTema" type="text"value= <?php  echo $sig;?> readonly="readonly" required>
                      <!-- Campos para modificar -->
                      Nombre Tema:<textarea class="form-control" style="resize:none;" cols="20" rows="1" name="NombreTema" required><?php  echo $nom;?> </textarea>
                      <input name="accion" type="hidden" value="2"><br><br>
                      <input class="btn btn-info"  type="submit" value="Guardar">
                  </td>
              </form>
          </tr>
      </table>
  </center>
</div>
