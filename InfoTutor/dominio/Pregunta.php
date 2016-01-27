<?php
class Pregunta{
    var $idPregunta;
    var $idTema;
    var $contenido;
    var $respuesta;
    var $tipo;
    var $valor;


    function crearPregunta($idTema, $contenido, $respuesta, $tipo, $valor) {
        $this->idTema = $idTema;
        $this->contenido = $contenido;
        $this->respuesta = $respuesta;
        $this->valor = $valor;
        $this->tipo = $tipo;
    }

    function editarPregunta($idPregunta, $idTema, $contenido, $respuesta, $tipo, $valor) {
        $this->idPregunta = $idPregunta;
        $this->idTema = $idTema;
        $this->contenido = $contenido;
        $this->respuesta = $respuesta;
        $this->valor = $valor;
        $this->tipo = $tipo;
    }

	function setIdPregunta($id){
    	$this->idPregunta = $id;
	}

	function getIdPregunta(){
    	return $this->idPregunta;
	}	
	
	function setIdTema($id){
    	$this->idTema = $id;
	}

	function getIdTema(){
    	return $this->idTema;
	}	
	function setContenido($contenido){
    	$this->contenido = $contenido;
	}

	function getContenido(){
    	return $this->contenido;
	}

	function setRespuesta($respuesta){
    	$this->respuesta = $respuesta;
	}

	function getRespuesta(){
    	return $this->respuesta;
	}

	function setTipo($tipo){
    	$this->tipo = $tipo;
	}

	function getTipo(){
    	return $this->tipo;
	}	

	function setValor($valor){
    	$this->valor = $valor;
	}

	function getValor(){
    	return $this->valor;
	}

	}
?> 