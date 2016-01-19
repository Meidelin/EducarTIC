<?php
//objeto usuario para ser usado en insersiones a la base de datos
class Usuario{
    
    var $idUsuario;
    var $nombre;
    var $apellidos;
    var $correo;
    var $usuario;
    var $contrasena;
    var $tipo;
    var $nivel;
    
    function crearUsuario($nombre, $apellidos, $correo, $usuario, $contrasena, $tipo, $nivel) {
        $this->nombre = $nombre;
        $this->apellidos = $apellidos;
        $this->correo = $correo;
        $this->usuario = $usuario;
        $this->contrasena = $contrasena;
        $this->tipo = $tipo;
        $this->nivel = $nivel;
    }
    
    function datosUsuario($idUsuario, $nombre, $apellidos, $correo, $usuario, $nivel) {
        $this->idUsuario = $idUsuario;
        $this->nombre = $nombre;
        $this->apellidos = $apellidos;
        $this->correo = $correo;
        $this->usuario = $usuario;
        $this->nivel = $nivel;
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

    function getNivel() {
        return $this->nivel;
    }

    function setNivel($nivel) {
        $this->nivel = $nivel;
    }
    
}

