<?php

include '../dominio/Usuario.php';
include '../data/dataUsuario.php';

$accion=$_POST['accion'];

switch ($accion) {
    case 1:
        guardarUsuario();
        break;   
    }

function guardarUsuario(){
    
    $nombre=$_POST['nombre'];
    $apellidos=$_POST['apellidos'];
    $correo=$_POST['correo'];
    $usuario=$_POST['usuario'];
    $contrasena=$_POST['pass'];
    $tipo=$_POST['tipo'];
    
    $user=new Usuario;
    $user->crearUsuario($nombre, $apellidos, $correo, $usuario, $contrasena, $tipo);
    
    echo $user->getTipo();
    
    //$mensaje=insertarUsuario($user);
    
}

