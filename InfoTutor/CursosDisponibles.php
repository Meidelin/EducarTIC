<?php include"barraSesion.php";
include 'negocio/LogicaCurso.php';
?>
<html>
    <head>
        <meta charset="UTF-8">  <!-- Interfaz de administracion de usuarios !-->
        <title></title>
    </head>
    <body>
    
    <h1> CURSOS DISPONIBLES </h1>
    <br><br><br><br>
        
    <center>
       <?php
        //if (empty($_GET['buscar'])){ //si no hay una busqueda se cargan todos los usuarios
                            
                $result=getCursosDisponibles($_SESSION['id'],$_SESSION['nivel']);

        //}else{//si hay busqueda se cargan los datos de la busqueda
          //  $opcion=$_POST['opciones'];
            //$busq=$_POST['busqueda'];
            
           // echo "<p> Resultado de buscar por ".$opcion.": </p>";
            
            ?>
     <!--   <button type="button" onClick="location.href='AdministracionUsuarios.php'"> <!-- muestra todos los usuarios de nuevo 
                    Mostrar Todo
        </button>
        <br><br> !-->
        <?php
            
       //     $result = busquedaUsuarios($opcion, $busq); //se realiza la busqueda
       // }
        ?>
        <section>

          <!--  <form method="POST" action="./AdministracionUsuarios.php?buscar=1">  
                <!-- form para realizar busqueda 
        
                <select name="opciones">
                    <option value="idUsuario">Id de Usuario</option>
                    <option value="nombre">Nombre</option>
                    <option value="apellidos">Apellidos</option>
                    <option value="correo">Correo Electrónico</option>
                    <option value="usuario">Nombre de Usuario</option>
                </select>

                <input name="busqueda" type="text" placeholder="Buscar Usuario" required> 

                <input type="submit" value="Buscar">
        
            </form>!-->
            
            <?php //se arma la tabla con los usuarios cargados

                echo '<section id="seccion">';

                if(is_object($result)){
                    if( $result->num_rows == 0) die("No hay registros para mostrar");

                echo "<table border=1 cellpadding=4 cellspacing=0>";
                echo "<tr>
                <th colspan=6> Cursos Disponibles </th>
                <tr>
                <th> Sigla </th><th> Nombre </th><th> Descripción </th>
                <th> Nivel Requerido </th> <th> Matricular </th>
                </tr>";
        
            while($row=$result->fetch_assoc()){ //se llena cada fila de la tabla con los usuarios
        
                ?><tr onclick="location.href='InformacionCursos.php?curso=<?php echo $row['Sigla'] ;?>'"
                style="cursor: pointer;"> <?php
            echo "

            <td align='right'> $row[Sigla] </td>
            <td> $row[Nombre] </td>
            <td> $row[Descripcion] </td>
            <td> $row[NivelCurso] </td>
            <td>
                <form method='GET' action='./negocio/LogicaMatricula.php'>  

                    <input type='hidden' name='accion' value='1'>
                    <input name='curso' type='hidden' value='$row[Sigla]'>
                    <input name='a' type='hidden' value='$_SESSION[id]'>

                    <input type='submit' value='Matricular'>
        
                </form> </td>

             </tr>";
        
    }
                }else{

            $i=0;
            $vacio=true;

            echo "<table border=1 cellpadding=4 cellspacing=0>";
            echo "<tr>
            <th colspan=6> Cursos Disponibles </th>
            <tr>
            <th> Sigla </th><th> Nombre </th><th> Descripción </th>
            <th> Nivel Requerido </th> <th> Matricular </th>
            </tr>";

            while($i<count($result)){ //se llena cada fila de la tabla con los usuarios

                $curso=verificarDisponibilidadCurso($result[$i],$_SESSION['nivel']);
                
               if( $curso->num_rows !== 0){

                    while($row=$curso->fetch_assoc()){
                        $vacio=false;

                    ?>
                        <tr onclick="location.href='InformacionCursos.php?curso=<?php echo $row['Sigla']; ?>'"
                        style="cursor: pointer;"> 

                        <?php
                        echo "<td align='right'> $row[Sigla] </td>
                        <td> $row[Nombre] </td>
                        <td> $row[Descripcion] </td>
                        <td> $row[NivelCurso] </td>
                        <td>

                        <form method='GET' action='./negocio/LogicaMatricula.php'>  
                        
                        <input type='hidden' name='accion' value='1'>
                    <input name='curso' type='hidden' value='$row[Sigla]'>
                    <input name='a' type='hidden' value='$_SESSION[id]'>

                    <input type='submit' value='Matricular'>
        
                </form> </td>
                    </tr> ";
                    }
                }

                if($vacio===true){
                    echo "En este momento no hay cursos disponibles, suba su nivel completando los cursos
                    que actualmente tiene para abrir nuevos en esta sección.";
                }

                $i++;

                }

        }
                
        echo "<th colspan=6 style='border-top: 0px;'>  </th>"
    . "</table>";

            ?>
        </section>
    
    </center>     
        
    </body>
</html>

