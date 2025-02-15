<?php
class Publicacion {
    protected $titulo;
    protected $autor;
    protected $año;

    function __construct($titulo, $autor, $año){
        $this->setTitulo($titulo);
        $this->setAutor($autor); 
        $this->setAño($año);
    }

    // Getters
    public function getTitulo(){
        return $this->titulo;
    }

    public function getAutor(){
        return $this->autor;
    }

    public function getAño(){
        return $this->año;
    }

    // Setters
    public function setTitulo($titulo){
        $this->titulo = $titulo;
    }

    public function setAutor($autor){
        $this->autor = $autor;
    }

    public function setAño($año){
        $this->año = $año;
    }
}