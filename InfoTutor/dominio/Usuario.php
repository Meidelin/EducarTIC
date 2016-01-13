<?php

class Usuario{
    
    var $idUsuario;
    var $nombre;
    var $apellidos;
    var $correo;
    var $usuario;
    var $contrasena;
    var $tipo;
    
    function crearUsuarioBD($idUsuario, $nombre, $apellidos, $correo, $usuario, $contrasena, $tipo) {
        $this->idUsuario = $idUsuario;
        $this->nombre = $nombre;
        $this->apellidos = $apellidos;
        $this->correo = $correo;
        $this->usuario = $usuario;
        $this->contrasena = $contrasena;
        $this->tipo = $tipo;
    }

    function crearUsuario($nombre, $apellidos, $correo, $usuario, $contrasena, $tipo) {
        $this->nombre = $nombre;
        $this->apellidos = $apellidos;
        $this->correo = $correo;
        $this->usuario = $usuario;
        $this->contrasena = $contrasena;
        $this->tipo = $tipo;
    }
    
    function getIdUsuario() {
        return $this->idUsuario;
    }

    function getNombre() {
        return $this->nombre;
    }

    function getApellidos() {
        return $this->apellidos;
    }

    function getCorreo() {
        return $this->correo;
    }

    function getUsuario() {
        return $this->usuario;
    }

    function getContrasena() {
        return $this->contrasena;
    }

    function getTipo() {
        return $this->tipo;
    }

    function setIdUsuario($idUsuario) {
        $this->idUsuario = $idUsuario;
    }

    function setNombre($nombre) {
        $this->nombre = $nombre;
    }

    function setApellidos($apellidos) {
        $this->apellidos = $apellidos;
    }

    function setCorreo($correo) {
        $this->correo = $correo;
    }

    function setUsuario($usuario) {
        $this->usuario = $usuario;
    }

    function setContrasena($contrasena) {
        $this->contrasena = $contrasena;
    }

    function setTipo($tipo) {
        $this->tipo = $tipo;
    }


    
}

