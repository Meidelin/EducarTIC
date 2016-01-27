<?php

include '../data/dataUsuario.php';

$usuario=$_POST["nombreUsuario"];
$pass=$_POST["pass"];

$validarUsuario=getNombreUsuario($usuario);

if($usuario != $validarUsuario){ //metodo para validar si el usuario esta registrado y armar la variable de sesion
    
    echo "<script> alert('Este usuario no se encuentra registrado, por favor intente de nuevo.');"
    . "window.location='../index.php'</script>";
    
}else{
    
    $validarPass=getPass($usuario);
    
    if($pass!=$validarPass){ //valida si la contraseña es correcta
        
        echo "<script> alert('Contraseña erronea, por favor intente de nuevo');"
    . "window.location='../index.php'</script>";
        
    }else{
        
        $tipoUsuario=getTipoUsuario($usuario);
        
        if($tipoUsuario==="estudiante"){//si es tipo estudiante arma una variable de sesion estudiante
            
            session_start();
            $_SESSION['usuario'] = $usuario;
            $_SESSION['tipo'] = $tipoUsuario;
            $_SESSION['id'] =  getIdUsuario($usuario);
            $_SESSION['nivel'] = getNivelUsuario($usuario);
        
            header('Location: ../menu.php');
            
        }else{//si no es tipo estudiante arma una variable de sesion admin
            
            session_start();
            $_SESSION['usuario']=$usuario;
            $_SESSION['tipo']=$tipoUsuario;
            $_SESSION['id']= getIdUsuario($usuario);
        
            header('Location: ../menuAdmin.php');
            
        }
    }
}  
