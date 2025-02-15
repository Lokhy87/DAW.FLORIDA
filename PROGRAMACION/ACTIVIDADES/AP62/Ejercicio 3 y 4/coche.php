<?php
require_once("vehiculo.php");

class Coche extends Vehiculo {
    protected $tipoCombustible;

    // Constructor
    function __construct($marca, $modelo, $color, $tipoCombustible){
        parent::__construct($marca, $modelo, $color);
        $this->tipoCombustible = $tipoCombustible;
    }

    // Get
    public function getTipoCombustible(){
        return $this->tipoCombustible;
    }

    // Set
    public function setTipoCombustible($tipoCombustible){
        $this->tipoCombustible = $tipoCombustible;
    }
    
    // Sobreescribiendo el método describir()
    public function describir(){
        return parent::describir() . ". Usa combustible de tipo {$this->getTipoCombustible()}.";
    }
}

$vehiculo1 = new Coche("Toyota", "Corolla", "Rojo", "Gasolina");

echo $vehiculo1->describir();