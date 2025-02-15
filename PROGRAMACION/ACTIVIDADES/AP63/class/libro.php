<?php
require_once("publicacion.php");

class Libro extends Publicacion {
    protected $paginas;

    function __construct($titulo, $autor, $año, $paginas){
        parent::__construct($titulo, $autor, $año);
        $this->paginas = $paginas;
    }

    // Getter
    public function getPaginas(){
        return $this->paginas;
    }

    // Setter
    public function setPaginas($paginas){
        $this->paginas = $paginas; 
    }        
}