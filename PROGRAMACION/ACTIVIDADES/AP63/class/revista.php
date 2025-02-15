<?php
require_once("libro.php");

class Revista extends Libro {
    protected $tematica;

    function __construct($titulo, $autor, $año, $paginas, $tematica){
        parent::__construct($titulo, $autor, $año, $paginas);
        $this->tematica = $tematica;
    }

    // Getter
    public function getTematica(){
        return $this->tematica;
    }

    // Setter
    public function setTematica($tematica){
        $this->tematica = $tematica; 
    }
        
}