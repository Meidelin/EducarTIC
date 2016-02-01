<!DOCTYPE html>
<?php
       
    include"barraSesion.php";
    include  $_SERVER['DOCUMENT_ROOT'].'/InfoTutor/negocio/LogicaForo.php';

?>
<html>
    <!-- Interfaz de Crear Foro !-->
    <head>
        <meta charset="UTF-8">
        <script type="text/javascript" src="./js/jquery-2.1.4.js"></script>
        <script type="text/javascript" src="./js/validacionesRegistro.js"></script>      

        <title>Foros</title>
    </head>
    <body>

        <h1> Crear Foro </h1>

        <br><br><br><br><br><br>

    <center>

        <section id="registro">


            <form action="./negocio/LogicaForo.php" method="post">

                <input name="accion" type="hidden" value="1">
                <input name="idUsuarioF" type="hidden" value="<?php echo $_SESSION['id']; ?>">

                <table>
                    <div aling="center">

                        <tr>
                            <td>
                                Tema:
                            </td>
                            <td> 

                                <select name="idTemaSeleccionado"> 

                                    <option>"Seleccione un Tema"</option> 

                                        <?php 

                                            $consulta = getTemas();                                                            
                                            while($fila = $consulta->fetch_assoc()){

                                                /*Obtiene el idtema como el valor y se muestra el nombre */
                                        ?>
                                                  <option value="<?php $fila['IdTema'] ?>"><?php echo $fila["NombreT"]; ?></option> 
                                          <?php

                                                
                                            }                                       
                                        ?>

                                 </select>                           

                            </td>
                        </tr>
                        <tr>
                            <td>
                                Titulo:
                            </td>
                            <td>
                                <input title="Solo se permiten letras" type="text" name="tituloF" placeholder="Titulo" size="30" required2 pattern="[A-Za-z ]*" autofocus ></br>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                Enunciado:
                            </td>
                            <td>
                                <input title="Solo se permiten letras" type="text" name="enunciadoF" placeholder="Enunciado" size="30" required2 pattern="[A-Za-z ]*" autofocus></br>
                            </td>
                        </tr>

                        <tr>
                            <td>
                                Fecha:
                            </td>
                            <td>
                                <?php 

                                $hoy = getdate();
                                $fecha="".$hoy['mday']."/".$hoy['mon']."/".$hoy['year'];
                                ?>
                                <input title="Fecha de Creación" type="text" name="fechaF" value="<?php echo $fecha; ?>" size="30" required2 autofocus readonly="true"></br>
                            </td>
                        </tr>                        

                        <tr> 
                            <td>                                
                                <input type="submit" value="Crear">                         
                            </td>                        
                        </tr>
                    </div>
                </table>            
            </form>           

        </section>

    </center>             
</body>
</html>
