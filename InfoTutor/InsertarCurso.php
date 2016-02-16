<!DOCTYPE html>
<?php 
include './barraSesion.php';
?>

<div class="container">
    <h1 class="h1">Administración de Cursos </h1>
    <center>
    
    <br><br><br><br>
    <button class="btn btn-success" type="button" onClick="location.href = 'AdministracionCursos.php'">
        Regresar </button><br><br>

    <table>
        <tr>
            <th><h3>Insertar Curso </h2></th> 
        </tr>
        <!-- Formulario que envia un curso para guardarlo en la base de datos -->
        <tr>   <td> <form method="POST" action="./negocio/CursoLogica.php">
            Sigla: <input name="Sigla" class="form-control" type="text" required> 
            Nombre del curso: <textarea class="form-control" style="resize:none;"cols="30" rows="1" name="Nombre" required></textarea>              
            Descripcion:<textarea class="form-control" style="resize:none;" cols="30" rows="5" name="Descripcion" required></textarea>
            Nivel curso: <input class="form-control" name="NivelCurso" type="text"> <br><br>
             <input name="accion" type="hidden" value="1">                
             <input class="btn btn-info"  type="submit" value="Guardar">
                </form>
             </td></tr>
    </table>
</center>
</div>