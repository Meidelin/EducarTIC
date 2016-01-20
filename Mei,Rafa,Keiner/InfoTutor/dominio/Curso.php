<?
class Curso{
    var $sigla;
    var $nombreCurso;
    var $descripcion;
    var $nivel;
	
	function crearCurso($nombreCurso,$descripcion,$nivel,$listaTemas) {
        $this->nombreCurso = $nombreCurso;
        $this->descripcion = $descripcion;
        $this->nivel = $nivel;
    }
	function editarCurso($sigla,$nombreCurso,$descripcion,$nivel,$listaTemas) {
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


	function setListaTemas($listaTemas){

		$this->listaTemas = listaTemas = $tema->getAll();
    	$this->listaTemas = $listaTemas;
	}

	function getNivel(){
    	echo $this->nivel;
	}
}
?> 