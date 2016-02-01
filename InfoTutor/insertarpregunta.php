<!DOCTYPE html>
<?php 
include 'AdministracionPreguntas.php';
?>
<center>

<table border="1">
<tr>
 <th><h3>Insertar Pregunta </h2></th> 
 </tr>
      <section>
        <!-- Formulario que envia una pregunta para guardarla en la base de datos -->
<tr>    <form method="POST" action="./negocio/PreguntaLogica.php">  
                <!-- Combobox que obtiene los temas que existen en la base de datos -->
               <td> Tema:<select name="IdTema">
                    <option>Seleccione un Tema</option>
                    <?php 
                       $con=getConexion();
                       $consulta="select IdTema, NombreT from tema";
                       $res=mysqli_query($con,$consulta);
                    while($fila = mysqli_fetch_array($res)){
                        /*Obtiene el idtema como el valor y se muestra el nombre */
                        echo'<option value='.$fila['IdTema'].'>"'.$fila['NombreT'].'"</OPTION>';
                    }?>
                </select><br><br>
                Contenido de la pregunta: <br><br><textarea style="resize:none;" cols="30" rows="5" name="Contenido" required></textarea> <br><br>
                Respuesta:<br><br><textarea style="resize:none;" cols="30" rows="5" name="Respuesta" required></textarea><br><br>
                Tipo:  <select id="Tipo" onchange="ShowSelected();" name="Tipo">>                
                                <option>Seleccion el tipo de pregunta</option>                    
                                <option value='1'>Seleccion unica</option>                   
                                <option value='2'>Respuesta Breve</option>                 
                       </select> 
                   <br><br>
               Valor (puntaje):<!-- <input name="Valor" value= "0" type="text"> <br><br> -->
                
                <input name="accion" type="hidden" value="1">                
                <input type="submit" value="Guardar">

                <button type="button" onClick="location.href = 'AdministracionPreguntas.php'">
                    Cancelar
                </button></tr>
        
            </form>
        </section>
    </table>
</center>