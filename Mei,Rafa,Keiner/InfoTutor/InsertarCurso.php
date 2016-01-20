<?php 
include 'AdministracionCursos.php';
?>
<center>

<table border="1">
<tr>
 <th><h3>Insertar Curso </h2></th> 
 </tr>
      <section>
        <!-- Formulario que envia un curso para guardarlo en la base de datos -->
<tr>    <form method="POST" action="./logica/CursoLogica.php">  
	
             Nombre del curso: <input name="Nombre" type="text"> <br><br>
             Descripcion:<br><br><textarea cols="30" rows="5" name="Descripcion" required></textarea><br><br>
             Nivel curso: <input name="NivelCurso" type="text"> <br><br>
                <input name="accion" type="hidden" value="1">                
                <input type="submit" value="Guardar">

                <button type="button" onClick="location.href = 'AdministracionCursos.php'">
                    Cancelar
                </button></tr>
        
            </form>
        </section>
    </table>
</center>