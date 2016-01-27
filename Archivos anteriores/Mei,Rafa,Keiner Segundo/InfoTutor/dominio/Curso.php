<?php
class Curso{
    var $sigla;
    var $nombreCurso;
    var $descripcion;
    var $nivel;
	
	function crearCurso($sigla,$nombreCurso,$descripcion,$nivel) {
        $this->sigla = $sigla;
        $this->nombreCurso = $nombreCurso;
        $this->descripcion = $descripcion;
        $this->nivel = $nivel;
    }

    function editarCurso($sigla,$nombreCurso,$descripcion,$nivel) {
        $this->sigla = $sigla;
        $this->nombreCurso = $nombreCurso;
        $this->descripcion = $descripcion;
        $this->nivel = $nivel;
    }


	function setSigla($id){
    	$this->sigla = $id;
	}

	function getSigla(){
    	echo $this->sigla;
	}

	function setNombreCurso($nombre){
    	$this->nombreCurso = $nombreTema;
	}

	function getNombreCurso(){
    	echo $this->nombreCurso;
	}

	function setDescripcion($descri){
    	$this->descripcion = $descri;
	}

	function getDescripcion(){
    	echo $this->descripcion;
	}

	function setNivel($nivel){
    	$this->nivel = $nivel;
	}

	function getNivel(){
    	echo $this->nivel;
	}

}
?> 