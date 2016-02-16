<!DOCTYPE html>
<?php 
include './barraSesion.php';
include './data/Conexion.php';
?>
<div class="container">
  <h1 class="h1">Administración de Temas </h1>
  <center>    
    <br><br><br><br>
    <button class="btn btn-success"type="button" onClick="location.href = 'AdministracionTemas.php'">Regresar
    </button> <br><br>
    <table>
      <tr>
        <th><h3>Insertar Tema </h2></th>
        <tr>   <form method="POST" action="./negocio/TemaLogica.php">
          <td> Sigla: <select name="SiglaCursoTema">
            <option>Seleccione un Curso</option>
            <?php
            $con=getConexion();
            $consulta="select Sigla, Nombre from curso";
            $res=mysqli_query($con,$consulta);
             while($fila = mysqli_fetch_array($res)){
              /*Obtiene el idtema como el valor y se muestra el nombre */
              echo'<OPTION VALUE='.$fila['Sigla'].'>"'.$fila['Nombre'].'"</OPTION>';
            }?>
          </select><br><br>
          Nombre del Tema: <input class="form-control" name="NombreTema" type="text" required> <br><br>
          <input name="accion" type="hidden" value="1">
          <input class="btn btn-info"  type="submit" value="Guardar">
        </form>
      </td>
    </tr>
  </table>
</center>
</div>