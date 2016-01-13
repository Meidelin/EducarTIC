<?php

function comprobarConexion(){
    
    $sesion=isset($_SESSION['usuario']);
    
    if ($sesion!=true){
        
        header('Location: ./index.php');
        
    }
    
}

