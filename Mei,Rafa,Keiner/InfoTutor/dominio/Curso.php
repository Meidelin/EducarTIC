<?php

class Curso{
    
    var $sigla;
    var $nombre;
    var $descripcion;
    var $nivel;
    
    function crearCurso($sigla, $nombre, $descripcion, $nivel) {
        $this->sigla = $sigla;
        $this->nombre = $nombre;
        $this->descripcion = $descripcion;
        $this->nivel = $nivel;
        
    }

    function crearUsuario() {}
    
    function getsigla() {
        return $this->sigla;
    }

    function getNombre() {
        return $this->nombre;
    }

    function getDescripcion() {
        return $this->descripcion;
    }

    function getnivel() {
        return $this->nivel;
    }

    function setsigla($sigla) {
        $this->sigla = $sigla;
    }

    function setNombre($nombre) {
        $this->nombre = $nombre;
    }

    function setDescripcion($descripcion) {
        $this->descripcion = $descripcion;
    }

    function setNivel($nivel) {
        $this->nive; = $nivel;
    }
}

