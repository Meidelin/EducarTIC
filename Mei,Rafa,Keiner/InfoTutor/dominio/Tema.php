<?php
class Tema{
    var $idTema;
    var $siglaCurso;
    var $nombreTema;

    function crearTema($siglaCurso, $nombreTema){
    	$this->siglaCurso = $siglaCurso;
    	$this->nombreTema = $nombreTema;
    }

    function editarTema($id,$siglaCurso, $nombreTema){
    	$this->idTema = $id;
		$this->siglaCurso = $siglaCurso;
    	$this->nombreTema = $nombreTema;
    }

	function setIdTema($id){
    	$this->idTema = $id;
	}

	function getIdTema(){
    	echo $this->idTema;
	}	

	function setNombreTema($nombre){
    	$this->nombreTema = $nombreTema;
	}

	function getNombreTema(){
    	echo $this->nombreTema;
	}

	function setSiglaCurso($siglaCurso){
    	$this->siglaCurso = $siglaCurso;
	}

	function getSiglaCurso(){
    	echo $this->siglaCurso;
	}

	}
?> 