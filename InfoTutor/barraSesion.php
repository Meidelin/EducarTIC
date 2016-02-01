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
            <li><a class="btn btn-default" onClick="location.href = './menu.php'" >
                Menú Principal</a></li>
                <li><a class="btn btn-default dropdown-toggle" data-toggle="dropdown">
                    Cursos <span class="caret"></span></a>
                     <ul class="dropdown-menu">
                            <li><a href="./CursosDisponibles.php"> Cursos Matriculados</a></li>
                            <li><a href="./CursosDisponibles.php">Cursos Disponibles</a></li>
                            <li><a href="./Expediente.php">Expendiente</a></li>
                        </ul>                    
                    </li>
                    <li><a class="btn btn-default dropdown-toggle" data-toggle="dropdown">
                        Foros <span class="caret"></span></a>
                        <ul class="dropdown-menu">
                        <li><a href="./menuForo.php">Ver Foros</a></li>
                        <li><a href="./menuForo.php">Crear Foro</a></li>
                        </ul></li>
                    <li><a class="btn btn-default dropdown-toggle" data-toggle="dropdown">
                        Configuración <span class="caret"></span></a>
                        <ul class="dropdown-menu">
                            <li><a href="./ConfiguracionUsuario.php?a=1">
                                Datos Personales</a></li>
                            <li><a href="./ConfiguracionUsuario.php?a=2">
                                Cambiar Contraseña</a></li>
                        </ul>
                    </li>

<!-- ADMINISTRADOR -->

   <?php }else{ //si es un administrador carga un menu de administrador?>
        
                <ul class="nav nav-tabs">
                    <li><a class="btn btn-default" onClick="location.href = './menuAdmin.php'" >
                        Menú Principal</a></li>
                    <li><a class="btn btn-default dropdown-toggle" data-toggle="dropdown">
                        Administracion<span class="caret"></span> </a>
                        <ul class="dropdown-menu">
                            <li><a href="./AdministracionCursos.php">Administracion de Cursos</a></li>
                            <li><a href="./AdministracionTemas.php">Administracion de Temas</a></li>
                            <li role="presentation" class="divider"></li>
                            <li role="presentation" class="dropdown-header">Administracion de Preguntas</li>
                            <li><a href="./AdministracionPreguntas.php"> Ver Preguntas </a></li>
                            <li><a href="#">Preguntas sugeridas</a></li>
                        </ul>
                    </li>
                    <li><a class="btn btn-default dropdown-toggle" data-toggle="dropdown">
                            Usuarios<span class="caret"></span></a>
                            <ul class="dropdown-menu">
                                <li><a href="./ConfiguracionUsuario.php">Configuración</a></li>
                                <li role="presentation" class="divider"></li>
                                <li> <a href="./AdministracionUsuarios.php" >Administracion de Usuarios</a></li>
                                <li> <a href="./RegistrarAdmin.php">Agregar Administrador</a></li>

                            </ul>
                    </li>

                    <li><a class="btn btn-default dropdown-toggle" data-toggle="dropdown">
                            Foros<span class="caret"></span></a>
                            <ul class="dropdown-menu">
                                <li><a href="#">Administracion de Foros</a></li>
                                <li><a href="#">Comentarios</a></li>
                            </ul></li>

                    <li><a class="btn btn-default dropdown-toggle" data-toggle="dropdown">
                            Configuración<span class="caret"></span></a>
                            <ul class="dropdown-menu">
                            <li><a href="./ConfiguracionUsuario.php?a=1">
                                Datos Personales</a></li>
                            <li><a href="./ConfiguracionUsuario.php?a=2">
                                Cambiar Contraseña</a></li>
                            </ul>
                    </li>
                   
        <?php } ?>

         <li><h5 style="color:white"> Usuario: <?php echo $_SESSION['usuario'];?>
            <?php if($_SESSION['tipo']=="estudiante"){//si es un estudiante carga un menu para estudiantes
            ?>| Nivel: <?php echo $_SESSION['nivel']; } ?>
            <button type="button" class="btn btn-primary btn-sm" onClick="location.href = 'negocio/cerrarSesion.php'">
                Cerrar Sesión
            </button>  </h5></li>   </ul>
        </div>

    <meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />   
</div>
        
    </body>
</html>