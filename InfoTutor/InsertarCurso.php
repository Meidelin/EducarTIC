<!DOCTYPE html>
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
<tr>   <td> <form method="POST" action="./negocio/CursoLogica.php">  
	

             Sigla: <input name="Sigla" type="text" required> <br><br>
             Nombre del curso: 
             <br><br> 
             <textarea style="resize:none;"cols="30" rows="1" name="Nombre" required></textarea>              
            <br><br>
             Descripcion:<br><br><textarea style="resize:none;" cols="30" rows="5" name="Descripcion" required></textarea><br><br>
             Nivel curso: <input name="NivelCurso" type="text"> <br><br>
                <input name="accion" type="hidden" value="1">                
                <input type="submit" value="Guardar">

                <button type="button" onClick="location.href = 'AdministracionCursos.php'">
                    Cancelar
                </button></td></tr>
        
            </form>
        </section>
    </table>
</center>