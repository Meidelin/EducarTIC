<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Foro
 *
 * @author Keyner
 */
class Foro {
    
    var $idTemaF;
    var $fechaF;
    var $tituloF;
    var $enunciadoF;
    var $idUsuarioF;
    
    function crearForo($idTema,$fecha,$titulo,$enunciado,$idUsuario) {
        $this->idTemaF = $idTema;
        $this->fechaF = $fecha;
        $this->titulo = $titulo;
        $this->enunciado = $enunciado;
        $this->idUsuarioF = $idUsuario;
    }


	function setIdTemaF($id){
    	$this->idTemaF = $id;
	}

	function getIdTemaF(){
    	echo $this->idTemaF;
	}

	function setFechaF($fecha){
    	$this->fechaF = $fecha;
	}

	function getFechaF(){
    	echo $this->fechaF;
	}

	function setTituloF($titulo){
    	$this->tituloF = $titulo;
	}

	function getTituloF(){
    	echo $this->tituloF;
	}

	function setEnunciadoF($enunciado){
    	$this->enunciadoF = $enunciado;
	}

	function getEnunciadoF(){
    	echo $this->enunciadoF;
	}


	function setIdUsuarioF($idUsuario){

		$this->idUsuarioF = $idUsuario;
	}

	function getIdUsuario(){
    	echo $this->idUsuarioF;
	}

}
