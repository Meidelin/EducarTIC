<?php

//include '../data/dataUsuario.php';

$usuario=$_POST["nombreUsuario"];
$pass=$_POST["pass"];

//$validarUsuario=getUsuario($usuario);

$tipoUsuario="estudiante";

if($usuario != "Andres"){
    
    echo "<script> alert('Este usuario no se encuentra registrado, por favor intente de nuevo.');"
    . "window.location='../index.php'</script>";
    
}else{
    
    //$validarPass=getPass($usuario);
    
    if($pass!="123"){
        
        echo "<script> alert('Contraseña erronea, por favor intente de nuevo');"
    . "window.location='../index.php'</script>";
        
    }else{
        
        //$tipoUsuario=getUsuario($usuario);
        
        if($tipoUsuario==="estudiante"){
            
            session_start();
            $_SESSION['usuario']=$usuario;
            $_SESSION['pass']=$pass;
            $_SESSION['tipo']=$tipoUsuario;
        
            header('Location: ../menu.php');
            
        }else{
            
            session_start();
            $_SESSION['usuario']=$usuario;
            $_SESSION['pass']=$pass;
            $_SESSION['tipo']="admin";//$tipoUsuario;
        
            header('Location: ../menuAdmin.php');
            
        }
    }
}  
