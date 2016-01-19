<?php

include  $_SERVER['DOCUMENT_ROOT'].'/InfoTutor/dominio/Usuario.php';
include  $_SERVER['DOCUMENT_ROOT'].'/InfoTutor/data/dataUsuario.php';

$accion=0; //variable para saber en que metodo debe entrar en caso de llegar aqui a travez de un form

if(isset($_POST['accion'])){//verifica si $accion llego en POST o GET dependiendo del form usado
  $accion = $_POST['accion'];
}else{
    if(isset($_GET['accion'])){
        $accion = $_GET['accion'];
    }
}

switch ($accion) {//envia al metodo requerido dependiendo del numero de la accion
    case 1:
        guardarUsuario();
        break;
    case 2:
        modificarUsuario();
        break;
    case 3:
        CambiarPass();
        break;
    }

function guardarUsuario(){//arma al objeto usuario y llama al metodo de dataUsuario para guardarlo en la BD
    
    $nombre=$_POST['nombre'];
    $apellidos=$_POST['apellidos'];
    $correo=$_POST['correo'];
    $usuario=$_POST['usuario'];
    $contrasena=$_POST['pass'];
    $tipo=$_POST['tipo'];
    
    if(isset($_POST['nivel'])){
        $nivel=intval($_POST['nivel']);
    }else{
        $nivel="null";
    }
    
    $user=new Usuario;//crea un objeto usuario
    $user->crearUsuario($nombre, $apellidos, $correo, $usuario, $contrasena, $tipo, $nivel);//asigna los valores
    
    insertarUsuario($user);
    
    if(isset($_POST['nivel'])){//si nivel esta seteado quiere decir que se registro a un usuario
        //y se redirige al index para realizar login
       
        echo "<script> alert('El registro se ha realizado correctamente, ya puede iniciar sesión.');"
        . "window.location='../index.php'</script>";
        
    }else{//si no esta seteado quiere decir que se registro a un administrador y se redirige a 
        //registrarAdmin.php
        
       echo "<script> alert('El registro se ha realizado correctamente, el administrador ya puede iniciar sesión.');"
        . "window.location='../RegistrarAdmin.php'</script>"; 

    }
    
}

function modificarUsuario(){//arma un usuario con los datos modificados y llama al metodo de modificar en la BD
    
    
    $idUsuario=$_POST['id'];
    $nombre=$_POST['nombre'];
    $apellidos=$_POST['apellidos'];
    $correo=$_POST['correo'];
    $usuario=$_POST['usuario'];
        
    if(isset($_POST['nivel'])){
        $nivel=intval($_POST['nivel']);
    }else{
        $nivel="null";
    }
        
    $user=new Usuario;
    $user->datosUsuario($idUsuario, $nombre, $apellidos, $correo, $usuario, $nivel);

    modificarDatosUsuario($user);
       
    if(isset($_POST['conf'])){//si conf esta seteado quiere decir que se llamo desde configuracion.php
        //y se redirige a esa misma pagina
        echo "<script> alert('Los cambios se han realizado correctamente.');"
        . "window.location='../ConfiguracionUsuario.php?a=$idUsuario'</script>";
    }else{// si no esta seteado se llamo desde informacionUsuario.php y se redirige hacia ahi.
         echo "<script> alert('Los cambios se han realizado correctamente.');"
        . "window.location='../InformacionUsuario.php?a=$idUsuario'</script>";
    }
    
}

function busquedaUsuarios($opcion,$busqueda){//evalia la $opcion para saber por que atributo buscar al usuario
//y busqueda son los datos ingresados para buscar

    switch ($opcion) {
    case "idUsuario":
        $resultado=buscarUsuarios("IdUsuario",$busqueda);
        break;
    case "nombre":
        $resultado=buscarUsuarios("Nombre",$busqueda);
        break;
    case "apellidos":
        $resultado=buscarUsuarios("Apellidos",$busqueda);
        break;
    case "correo":
        $resultado=buscarUsuarios("Correo",$busqueda);
        break;
    case "usuario":
       $resultado=buscarUsuarios("Usuario",$busqueda);
        break;
           
    }
    
    return $resultado;
    
}

function cambiarPass(){//recibe los datos de cambiar contraseña una vez evaluados para realizar el cambio
    
    $pass2=$_POST['pass2'];
    $id=$_POST['id'];
    
    cambiarPassUsuario($pass2,$id);
    
    echo "<script> alert('La contraseña se ha cambiado correctamente.');"
        . "window.location='../ConfiguracionUsuario.php?a=$id'</script>";
    
}
