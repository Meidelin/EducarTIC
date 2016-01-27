<?php include"barraSesion.php";
include 'negocio/LogicaUsuario.php';?>
<html>
    <head>
        <meta charset="UTF-8">  <!-- Interfaz de administracion de usuarios !-->
        <title></title>
    </head>
    <body>
    
    <h1> ADMINISTRACIÓN DE USUARIOS </h1>
            <button type="button" onClick="location.href='RegistrarAdmin.php'">
                    Agregar Administrador
        </button>
    <br><br><br><br>
        
    <center>
       <?php
        if (empty($_GET['buscar'])){ //si no hay una busqueda se cargan todos los usuarios
                            
                $result=getUsuarios();
        }else{//si hay busqueda se cargan los datos de la busqueda
            $opcion=$_POST['opciones'];
            $busq=$_POST['busqueda'];
            
            echo "<p> Resultado de buscar por ".$opcion.": </p>";
            
            ?>
        <button type="button" onClick="location.href='AdministracionUsuarios.php'"> <!-- muestra todos los usuarios de nuevo !-->
                    Mostrar Todo
        </button>
        <br><br>
        <?php
            
            $result = busquedaUsuarios($opcion, $busq); //se realiza la busqueda
        }
        ?>
        <section>

            <form method="POST" action="./AdministracionUsuarios.php?buscar=1">  
                <!-- form para realizar busqueda !-->
        
                <select name="opciones">
                    <option value="idUsuario">Id de Usuario</option>
                    <option value="nombre">Nombre</option>
                    <option value="apellidos">Apellidos</option>
                    <option value="correo">Correo Electrónico</option>
                    <option value="usuario">Nombre de Usuario</option>
                </select>

                <input name="busqueda" type="text" placeholder="Buscar Usuario" required> 

                <input type="submit" value="Buscar">
        
            </form>

            <?php //se arma la tabla con los usuarios cargados

                echo '<section id="seccion">';
        
                if( $result->num_rows == 0) die("No hay registros para mostrar");

                echo "<table border=1 cellpadding=4 cellspacing=0>";
                echo "<tr>
                <th colspan=6> Usuarios </th>
                <tr>
                <th> ID </th><th> Nombre </th><th> Apellidos </th>
                <th> Correo </th><th> Nombre de Usuario </th>
                <th> Tipo </th>
                </tr>";
        
            while($row=$result->fetch_assoc()){ //se llena cada fila de la tabla con los usuarios
        
                ?><tr onclick="location.href='InformacionUsuario.php?a=<?php echo $row['IdUsuario'] ;?>'"
                style="cursor: pointer;"> <?php
            echo "

            <td align='right'> $row[IdUsuario] </td>
            <td> $row[Nombre] </td>
            <td> $row[Apellidos] </td>
            <td> $row[Correo] </td>
            <td> $row[Usuario] </td>
            <td> $row[Tipo] </td>
             </tr>";
        
    }
        echo "<th colspan=6 style='border-top: 0px;'>  </th>"
    . "</table>";

            ?>
        </section>
    
    </center>     
        
    </body>
</html>