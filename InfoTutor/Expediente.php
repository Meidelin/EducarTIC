<!DOCTYPE html>
<?php include"barraSesion.php";
include 'negocio/LogicaUsuario.php';
include 'negocio/LogicaCurso.php';
?>
<html>
    <head>
        <meta charset="UTF-8">  <!-- Interfaz de administracion de usuarios !-->
        <script type="text/javascript" src="./js/jquery-2.1.4.js"></script>
        <link href="css/EstiloPrincipal.css" rel="stylesheet" type="text/css" />
        <title></title>
    </head>
    <body>
    
    <h1 class="h1"> Expediente </h1>
    <br><br><br><br><br><br>
        
    <center>
       <?php
                            
            $result=getCursosExpediente($_SESSION['id']);

        ?>
        <section>

            <form method="POST" action="./AdministracionUsuarios.php?buscar=1">  
                <!-- form para realizar busqueda !-->
        
                <select name="opciones">
                    <option value="idUsuario">Sigla</option>
                    <option value="nombre">Nombre</option>
                    <option value="apellidos">Nivel</option>
                </select>

                <input name="busqueda" type="text" placeholder="Buscar Curso" required> 

                <input type="submit" value="Buscar">
        
            </form>

            <?php //se arma la tabla con los cursos cargados

                echo '<section id="seccion">';
        
                if( $result->num_rows == 0) die("En este momento no tiene ningun curso matriculado");

                echo "<table border=1 cellpadding=4 cellspacing=0>";
                echo "<tr>
                <th colspan=6> Cursos Matriculados </th>
                <tr>
                <th> Sigla </th><th> Nombre </th><th> Nivel </th>
                </tr>";
        
            while($row=$result->fetch_assoc()){ //se llena cada fila de la tabla con los usuarios
        
                ?><tr onclick="location.href='ExpedienteCurso.php?a=<?php echo $row['Sigla'] ;?>'"
                style="cursor: pointer;"> <?php
            echo "
            <td align='right'> $row[Sigla] </td>
            <td> $row[Nombre] </td>
            <td> $row[NivelCurso] </td>
             </tr>";
        
    }
        echo "<th colspan=6 style='border-top: 0px;'>  </th>"
    . "</table>";

            ?>
        </section>
    
    </center>     
        
    </body>
</html>