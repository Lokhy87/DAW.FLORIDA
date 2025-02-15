<?php
class Vehiculo {
    protected $marca;
    protected $modelo;
    protected $color;

    // Constructor 
    function __construct($marca, $modelo, $color){
        $this->setMarca($marca);
        $this->setModelo($modelo); 
        $this->setColor($color);
    }

    // Getters
    public function getMarca(){
        return $this->marca;
    }

    public function getModelo(){
        return $this->modelo;
    }

    public function getColor(){
        return $this->color;
    }

    // Getters
    public function setMarca($marca){
        $this->marca = $marca;
    }

    public function setModelo($modelo){
        $this->modelo = $modelo;
    }
    
    public function setColor($color){
        $this->color = $color;
    }

    // Metodo
    function describir(){
        return "El modelo {$this->getModelo()} pertenece a la marca {$this->getMarca()} y el color generico es {$this->getColor()}";
    }
    
}