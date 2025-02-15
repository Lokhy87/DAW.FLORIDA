<?php
class Animal {
    protected $nombre;
    protected $edad;

    function __construct($nombre, $edad = 0){
        $this->setNombre($nombre);
        $this->setEdad($edad); 
    }

    // Getters
    public function getNombre(){
        return $this->nombre;
    }

    public function getEdad(){
        return $this->edad;
    }

    // Getters
    public function setNombre($nombre){
        $this->nombre = $nombre;
    }

    public function setEdad($edad){
        $this->edad = $edad;
    }

    function hacerSonido(){
        echo "El sonido del animal es desconocido.\n";
    }
}