<?php 
include 'pregunta.php';
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
               <td> Tema:<SELECT NAME="IdTema">
                    <option>Seleccione un Tema</option>
                    <?php 
                       $con=conexion();
                       $consulta="select IdTema, Nombre from Tema";
                       $res=mysql_query($consulta, $con);
                    while($fila = mysql_fetch_array($res)){
                        /*Obtiene el idtema como el valor y se muestra el nombre */
                        echo'<OPTION VALUE='.$fila['IdTema'].'>"'.$fila['Nombre'].'"</OPTION>';
                    }?>
                </SELECT><br><br>
                Contenido de la pregunta: <br><br><textarea cols="30" rows="5" name="Contenido" required></textarea> <br><br>
                Respuesta:<br><br><textarea cols="30" rows="5" name="Respuesta" required></textarea><br><br>
                Valor (puntaje):<input name="Valor" type="text"> <br><br>
                Tipo<input name="Tipo" type="text" > <br><br>
                
                <input name="accion" type="hidden" value="1">                
                <input type="submit" value="Guardar">

                <button type="button" onClick="location.href = 'pregunta.php'">
                    Cancelar
                </button></tr>
        
            </form>
        </section>
    </table>
</center>