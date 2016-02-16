<!DOCTYPE html>
<?php 
include './barraSesion.php';
include './data/Conexion.php';
?>

<div class="container">

<h1 class="h1">Administración de Preguntas </h1>
  <center>

    <br><br><br><br>
    <button class="btn btn-success" type="button" onClick="location.href = 'AdministracionPreguntas.php'">
        Regresar </button><br><br>
    <table>
      <tr>
        <th><h3>Insertar Pregunta </h2></th>
      </tr>
      <!-- Formulario que envia una pregunta para guardarla en la base de datos -->
      <tr>    
        <form method="POST" action="./negocio/PreguntaLogica.php">
          <!-- Combobox que obtiene los temas que existen en la base de datos -->
          <td> Tema:
            <select name="IdTema">
            <option>Seleccione un Tema</option>
            <?php $con=getConexion();
            $consulta="select IdTema, NombreT from tema";
            $res=mysqli_query($con,$consulta);
            while($fila = mysqli_fetch_array($res)){
              /*Obtiene el idtema como el valor y se muestra el nombre */
              echo'<option value='.$fila['IdTema'].'>"'.$fila['NombreT'].'"</OPTION>';
            }?>
          </select>
          <br><br>
          Contenido de la pregunta: <textarea class="form-control" style="resize:none;" cols="30" rows="5" name="Contenido" required></textarea>
          Respuesta:<textarea class="form-control" style="resize:none;" cols="30" rows="5" name="Respuesta" required></textarea>
          <br><br> Tipo:  
          <select id="Tipo" onchange="ShowSelected();" name="Tipo">
           <option>Seleccion el tipo de pregunta</option>
           <option value='1'>Seleccion unica</option>
           <option value='2'>Respuesta Breve</option>
         </select><br><br>
         <input class="btn btn-info" type="submit" value="Guardar">
       </tr>
      </form>
    </table>
  </center>
</div>