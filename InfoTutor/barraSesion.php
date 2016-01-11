<?php 
session_start();
include './sesion/comprobarConexion.php';
comprobarConexion();
?>
<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
    </head>
    <body>
    
    <section style="float: right;">

<?php if($_SESSION['tipo']=="estudiante"){ ?>

            <button type="button" onClick="location.href = './menu.php'">
                Menú Principal
            </button>   
        
            <button type="button" onClick="location.href = ''">
                Cursos Disponibles
            </button>
            
            <button type="button" onClick="location.href = ''">
                Cursos Matriculados
            </button>
            
            <button type="button" onClick="location.href = ''">
                Expendiente
            </button>

            <button type="button" onClick="location.href = './menuForo.php'">
                Foros
            </button>
            
            <button type="button" onClick="location.href = ''">
                Configuración
            </button>

            <?php }else{ ?> 

                <button type="button" onClick="location.href = ''">
                    Cursos 
                </button>
            
                <button type="button" onClick="location.href = ''">
                    Usuarios
                </button>
            
                <button type="button" onClick="location.href = ''">
                    Nuevas Preguntas
                </button>
            
                <button type="button" onClick="location.href = ''">
                    Configuración
                </button>

            <?php }?>
        
        Usuario: <?php echo $_SESSION['usuario'];?> 
        
        <button type="button" onClick="location.href = 'sesion/cerrarSesion.php'">
            Cerrar Sesión
        </button>
        
    </section>    
        
    </body>
</html>