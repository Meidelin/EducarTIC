<?php 
include 'tema.php';
?>
<center>

<table border="1">
<tr>
<th><h3>Insertar Tema </h2></th>
      <section>
 <tr>   <form method="POST" action="./negocio/TemaLogica.php">  
        
            <td> Sigla: <select name="SiglaCursoTema">
                       <option>Seleccione un Curso</option>
                       <?php 
                       $con=conexion();
                       $consulta="select Sigla, Nombre from Curso";
                       $res=mysql_query($consulta, $con);
                       while($fila = mysql_fetch_array($res)){
                        /*Obtiene el idtema como el valor y se muestra el nombre */
                        echo'<OPTION VALUE='.$fila['Sigla'].'>"'.$fila['Nombre'].'"</OPTION>';
                       }?>
                     </select><br><br>
                Nombre del Tema: <input name="NombreTema" type="text" required> <br><br>
                
                <input name="accion" type="hidden" value="1">                
                <input type="submit" value="Guardar">

                <button type="button" onClick="location.href = 'tema.php'">
                    Cancelar
                </button></td> 
        
            </form></tr> 
        </section>


    </table> 
</center>

