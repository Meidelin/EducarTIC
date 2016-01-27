<?php

function comprobarConexion(){ //comprueba constantemente la variable de sesion para impedir a usuarios
	//entrar sin inisiar sesion, es llamado en barraSesion.php
    
    $sesion=isset($_SESSION['usuario']);
    
    if ($sesion!=true){
        
        header('Location: ./index.php');
        
    }
    
}

