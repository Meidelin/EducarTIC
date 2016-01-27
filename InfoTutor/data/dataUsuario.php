<?php

    include 'Conexion.php';
    
function insertarUsuario($usuario){ //inserta usuarios recibiendo un objeto usuario desde registrarUsuario.php
    //o desde registrarAdmin.php
    
    $con = getConexion();

    mysqli_query($con,"insert into usuario (Nombre,Apellidos,Correo,Usuario,Contrasena,Tipo,Nivel) "
        . "values ('".$usuario->getNombre()."','".$usuario->getApellidos()."','".$usuario->getCorreo().""
            . "','".$usuario->getUsuario()."','".$usuario->getContrasena()."','".$usuario->getTipo()."',"
            . "".$usuario->getNivel().");")or die("<script>alert('Hemos tenido un problema interno y no se "
            . "ha podido realizar el registro, pedimos disculpas por este error, por favor intente realizar "
            . "el registro nuevamente'); location.href='../registrarUsuario.php';</script>");

    desconectar($con);

}

function getUsuarios(){ //carga todos los usuarios para mostrarlos en AdministracionUsuarios.php
    
    $con = getConexion();
    
    $usuarios = mysqli_query($con,"SELECT * from usuario;");
    
    desconectar($con);
    
    return $usuarios;
    
}

function getNombreUsuario($usuario){//carga el nombre de usuario para la validacion del LogIn
    
    $con = getConexion();
    
    $result = mysqli_query($con,"SELECT Usuario from usuario where Usuario='$usuario';");
    $usuarioObtenido=$result->fetch_assoc();
    
    return $usuarioObtenido['Usuario'];
    
}

function getIdUsuario($usuario){//obtiene el id del usuario para crear la variable de sesion
    
    $con = getConexion();
    
    $result = mysqli_query($con,"SELECT IdUsuario from usuario where Usuario='$usuario';");
    $usuarioObtenido=$result->fetch_assoc();
    
    return $usuarioObtenido['IdUsuario'];
    
}

function getPass($usuario){//obtiene la contraseña para validar el LogIn y para el cambio de la misma
    
    $con = getConexion();
    
    $result = mysqli_query($con,"SELECT Contrasena from usuario where Usuario='$usuario';");
    $passObtenido=$result->fetch_assoc();
    
    return $passObtenido['Contrasena'];
    
}

function getTipoUsuario($usuario){//obtiene el tipo de usuario para la creacion de la variable de sesion
    
    $con = getConexion();
    
    $result = mysqli_query($con,"SELECT Tipo from usuario where Usuario='$usuario';");
    $tipoObtenido=$result->fetch_assoc();
    
    return $tipoObtenido['Tipo'];
    
}

function getNivelUsuario($usuario){//obtiene el nivel de usuario para la creacion de la variable de sesion
    
    $con = getConexion();
    
    $result = mysqli_query($con,"SELECT Nivel from usuario where Usuario='$usuario';");
    $tipoObtenido=$result->fetch_assoc();
    
    return $tipoObtenido['Nivel'];
    
}

function buscarUsuarios($atributo, $busqueda){//busqueda de usuarios para mostrar en AdministracionUsuarios.php
    
    $con = getConexion();
    
    $resultado = mysqli_query($con,"SELECT * from usuario where $atributo like '%$busqueda%';");
    
    return $resultado;
    
}

function modificarDatosUsuario($usuario){//modificar usuarios recibiendo un objeto usuario desde configuracion.php
    //o desde informacionUsuario.php
    
    $con = getConexion();

    mysqli_query($con,"UPDATE usuario SET Nombre='".$usuario->getNombre()."', Apellidos='".$usuario->getApellidos()."',"
            . " Correo='".$usuario->getCorreo()."', Usuario='".$usuario->getUsuario()."',"
            . "Nivel=".$usuario->getNivel()." WHERE IdUsuario=".$usuario->getIdUsuario().";") 
            or die("<script>alert('Hemos tenido un problema interno y no se "
            . "ha podido realizar los cambios, pedimos disculpas por este error, por favor intente realizar "
            . "los cambios nuevamente'); location.href='../IformacionUsuario.php?a=".$usuario->getIdUsuario().";</script>");

    desconectar($con);

}

function cambiarPassUsuario($pass, $usuario){//cambiar la contraseña del usuario desde configuracion.php
    
    $con = getConexion();
    
    mysqli_query($con,"Update usuario SET Contrasena='$pass' where IdUsuario='$usuario';")
            or die("<script>alert('Hemos tenido un problema interno y no se "
            . "ha podido realizar los cambios, pedimos disculpas por este error, por favor intente realizar "
            . "los cambios nuevamente'); location.href='../ConfiguracionUsuario.php?a=$usuario;</script>");
    
    desconectar($con);
    
}