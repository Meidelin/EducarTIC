<?php 
session_start();
include './negocio/comprobarConexion.php';
comprobarConexion();

//barra de menu principal, se carga en todas las interfaces una vez se inicie sesion
//contiene los href hacia todas las partes del sistema

?>
<html>
    <head>
                <meta charset="UTF-8">
        <title></title>
    </head>
    <body>
    
    <section style="float: right;">

<?php if($_SESSION['tipo']=="estudiante"){ //si es un estudiante carga un menu para estudiantes
    ?>

            <button type="button" onClick="location.href = './menu.php'">
                Menú Principal
            </button>   
        
            <button type="button" onClick="location.href = './CursosDisponibles.php'">
                Cursos Disponibles
            </button>
            
            <button type="button" onClick="location.href = ''">
                Cursos Matriculados
            </button>
            
            <button type="button" onClick="location.href = './Expediente.php'">
                Expendiente
            </button>

            <button type="button" onClick="location.href = './menuForo.php'">
                Foros
            </button>
            
            <button type="button" onClick="location.href = './ConfiguracionUsuario.php'">
                Configuración
            </button>

            <?php }else{ //si es un administrador carga un menu de administrador
                ?>

                <button type="button" onClick="location.href = './menuAdmin.php'">
                    Menú Principal
                </button>   

                <button type="button" onClick="location.href = ''">
                    Cursos 
                </button>

                <button type="button" onClick="location.href = './AdministracionCursos.php'">
                    Cursos-admi
                </button>

                <button type="button" onClick="location.href = './AdministracionTemas.php'">
                    Temas-admi
                </button>

                <button type="button" onClick="location.href = './AdministracionPreguntas.php'">
                    Preguntas-admi
                </button>
            
                <button type="button" onClick="location.href = './AdministracionUsuarios.php'">
                    Usuarios
                </button>
            
                <button type="button" onClick="location.href = ''">
                    Nuevas Preguntas
                </button>
            
                <button type="button" onClick="location.href = './ConfiguracionUsuario.php'">
                    Configuración
                </button>

            <?php } ?>
        
        Usuario: <?php echo $_SESSION['usuario'];?>

        <?php if($_SESSION['tipo']=="estudiante"){ //si es un estudiante carga un menu para estudiantes
        ?>| Nivel: <?php echo $_SESSION['nivel']; } ?>
        
        <button type="button" onClick="location.href = 'negocio/cerrarSesion.php'">
            Cerrar Sesión
        </button>
        
    </section> 

    <meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />   
        
    </body>
</html>