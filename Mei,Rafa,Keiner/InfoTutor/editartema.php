<?php 
//include './barraSesion.php';
include 'tema.php';

//obtiene los datos del tema seleccionada que se envian desde TemaData.php
if(isset($_POST['editar']) and $_POST['editar'] == 'si'){
                 
     $idtem = $_POST['idtem'];    
     $sig = $_POST['sig'];   
     $nom = $_POST['nom'];       
}
?>

<center>
<table border="1">
<tr>
<th><h3>Modificar tema </h2></th>
</tr>
    <section>

    <!-- Formulario que obtiene los datos del tema y los modifica -->
    <tr>  <form method="POST" action="./negocio/TemaLogica.php">              
            <!-- IdTema campo no editable -->
      <td>   Tema:<input name="IdTema" type="text"  
                        value= <?php echo $idtem; ?> readonly="readonly" required>                
                        <br><br>
            <!-- SiglaCursoTema campo no editable -->
            Sigla: <input name="SiglaCursoTema" type="text"  
                        value= <?php  echo $sig;?> readonly="readonly" required> 
                        <br><br>
            <!-- Campos para modificar -->
            Nombre Tema: <input name="NombreTema" type="text"  value= <?php  echo $nom;?>  required> <br><br>                
                <input name="accion" type="hidden" value="2">
                
                <input type="submit" value="Guardar">

                <button type="button" onClick="location.href = 'tema.php'">
                    Cancelar
                </button></td> 
        
        </form></tr> 
    </section>

  </table>
 </center>
