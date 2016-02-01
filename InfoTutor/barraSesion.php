<?php 
session_start();
include './negocio/comprobarConexion.php';
comprobarConexion();

//barra de menu principal, se carga en todas las interfaces una vez se inicie sesion
//contiene los href hacia todas las partes del sistema

?>
<!DOCTYPE html>
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title></title>
    <link href="./bootstrap/css/bootstrap.css" rel="stylesheet" media="screen">
    <link href="./bootstrap/css/bootstrap.min.css" rel="stylesheet" media="screen">
    <link href="css/EstiloPrincipal.css" rel="stylesheet" type="text/css" />
</head>

<body class="bg">
    <script src="http://code.jquery.com/jquery.js"></script>
    <script src="./bootstrap/js/bootstrap.min.js"></script>
    <script type="text/javascript" src="./js/InformacionUsuario.js"></script>

    <div style="float:right; position:fixed; left:40%">
        <div class="col-lg-4"></div>
        <div class="col-lg-12">
        <?php if($_SESSION['tipo']=="estudiante"){ //si es un estudiante carga un menu para estudiantes
         ?>
         <ul class="nav nav-tabs">
            <li><a style=" background-color:#FFFF10 ;" class="btn btn-default" onClick="location.href = './menu.php'" >
               <span class="glyphicon  glyphicon glyphicon-home"></span> Inicio</a></li>
                <li><a style=" background-color:#FFFF10 ;" class="btn btn-default dropdown-toggle" data-toggle="dropdown">
                    <span class="glyphicon  glyphicon glyphicon-book"></span> Cursos <span class="caret"></span></a>
                     <ul class="dropdown-menu">
                            <li><a href="./CursosDisponibles.php"> 
                                <span class="glyphicon  glyphicon glyphicon-th-list"></span> Cursos Matriculados</a></li>
                            <li><a href="./CursosDisponibles.php">
                                <span class="glyphicon  glyphicon glyphicon-ok"></span> Cursos Disponibles </a></li>
                            <li><a href="./Expediente.php">
                                <span class="glyphicon  glyphicon glyphicon-folder-open"></span>  Expendiente </a></li>
                        </ul>                    
                    </li>
                    <li><a style=" background-color:#FFFF10 ;" class="btn btn-default dropdown-toggle" data-toggle="dropdown">
                        <span class="glyphicon  glyphicon glyphicon-comment"></span> Foros <span class="caret"></span></a>
                        <ul class="dropdown-menu">
                        <li><a href="./menuForo.php">
                            <span class="glyphicon  glyphicon glyphicon-eye-open"></span> Ver Foros</a></li>
                        <li><a href="./menuForo.php">
                            <span class="glyphicon  glyphicon glyphicon-pencil"></span> Crear Foro</a></li>
                        </ul></li>
                    <li><a style=" background-color:#FFFF10 ;" class="btn btn-default dropdown-toggle" data-toggle="dropdown">
                        <span class="glyphicon  glyphicon glyphicon-cog"></span> Configuración <span class="caret"></span></a>
                        <ul class="dropdown-menu">
                            <li><a href="./ConfiguracionUsuario.php?a=1">
                               <span class="glyphicon  glyphicon glyphicon-tasks"></span> Datos Personales</a></li>
                            <li><a href="./ConfiguracionUsuario.php?a=2">
                              <span class="glyphicon  glyphicon glyphicon-edit"></span>  Cambiar Contraseña</a></li>
                        </ul>
                    </li>

<!-- ADMINISTRADOR -->

   <?php }else{ //si es un administrador carga un menu de administrador?>
        
                <ul class="nav nav-tabs">
                    <li><a style=" background-color:#FFFF10 ;" class="btn btn-default" onClick="location.href = './menuAdmin.php'" >
                         <span class="glyphicon  glyphicon glyphicon-home"></span> Inicio</a></li>
                    <li><a style=" background-color:#FFFF10 ;" class="btn btn-default dropdown-toggle" data-toggle="dropdown">
                        <span class="glyphicon  glyphicon glyphicon-wrench"></span>  Administracion<span class="caret"></span> </a>
                        <ul class="dropdown-menu">
                            <li><a href="./AdministracionCursos.php"> 
                                <span class="glyphicon  glyphicon glyphicon-book"></span> Administracion de Cursos</a></li>
                            <li><a href="./AdministracionTemas.php">
                                <span class="glyphicon  glyphicon glyphicon-home"></span> Administracion de Temas</a></li>
                            <li role="presentation" class="divider"></li>
                            <li role="presentation" class="dropdown-header">
                                <span class="glyphicon  glyphicon glyphicon-wrench"></span> Administracion de Preguntas</li>
                            <li><a href="./AdministracionPreguntas.php"> 
                                <span class="glyphicon  glyphicon glyphicon-eye-open"></span> Ver Preguntas </a></li>
                            <li><a href="#">
                                <span class="glyphicon  glyphicon glyphicon-flash"></span> Preguntas sugeridas</a></li>
                        </ul>
                    </li>
                    <li><a style=" background-color:#FFFF10 ;" class="btn btn-default dropdown-toggle" data-toggle="dropdown">
                            <span class="glyphicon  glyphicon glyphicon-user"></span> Usuarios<span class="caret"></span></a>
                            <ul class="dropdown-menu">
                               
                                <li> <a href="./AdministracionUsuarios.php" >
                                    <span class="glyphicon  glyphicon glyphicon-user"></span> Administracion de Usuarios</a></li>
                                <li> <a href="./RegistrarAdmin.php">
                                    <span class="glyphicon  glyphicon glyphicon-wrench"></span> Agregar Administrador</a></li>

                            </ul>
                    </li>

                    <li><a style=" background-color:#FFFF10 ;" class="btn btn-default dropdown-toggle" data-toggle="dropdown">
                           <span class="glyphicon  glyphicon glyphicon-comment"></span> Foros<span class="caret"></span></a>
                            <ul class="dropdown-menu"> 
                                <li><a href="#"><span class="glyphicon  glyphicon glyphicon-wrench"></span> Administracion de Foros</a></li>
                                <li><a href="#"><span class="glyphicon  glyphicon glyphicon-comment"></span> Comentarios</a></li>
                            </ul></li>

                    <li><a style=" background-color:#FFFF10 ;" class="btn btn-default dropdown-toggle" data-toggle="dropdown">
                            <span class="glyphicon  glyphicon glyphicon-cog"></span>  Configuración<span class="caret"></span></a>
                            <ul class="dropdown-menu">
                            <li><a href="./ConfiguracionUsuario.php?a=1">
                                <span class="glyphicon  glyphicon glyphicon-tasks"></span> Datos Personales</a></li>
                            <li><a href="./ConfiguracionUsuario.php?a=2">
                                <span class="glyphicon  glyphicon glyphicon-edit"></span> Cambiar Contraseña</a></li>
                            </ul>
                    </li>
                   
        <?php } ?>

         <li><h5 style="color:white"> Usuario: <?php echo $_SESSION['usuario'];?>
            <?php if($_SESSION['tipo']=="estudiante"){//si es un estudiante carga un menu para estudiantes
            ?>| Nivel: <?php echo $_SESSION['nivel']; } ?>
            <button type="button" class="btn btn-danger btn-sm" onClick="location.href = 'negocio/cerrarSesion.php'">
               <span class="glyphicon  glyphicon glyphicon-log-out"></span>  Salir
            </button>  </h5></li>   </ul>
        </div>

    <meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />   
</div>
        
    </body>
</html>