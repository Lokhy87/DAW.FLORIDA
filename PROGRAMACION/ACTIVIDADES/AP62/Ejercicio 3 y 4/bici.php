<?php
require_once("vehiculo.php");

class Bici extends Vehiculo {
    protected $electrica;
    protected $km;

    // Constructor
    function __construct($marca, $modelo, $color, $electrica = "no", $km = 0){
        parent::__construct($marca, $modelo, $color);
        $this->electrica = $electrica;
        $this->km = $km;
    }

    // Get
    public function getElectrica(){
        return $this->electrica;
    }

    public function getKm(){
        return $this->km;
    }

    // Set
    public function setElectrica($electrica){
        $this->electrica = $electrica;
    }

    public function setKm($km){
        $this->km = $km;
    }
    
    // Metodo incrementar km
    function hacerKm($km){
        $this->km += $km;
    }
    
    // Sobreescribiendo el método describir()
    public function describir(){
        $tipo = $this->getElectrica() == "si" ? "eléctrica" : "no eléctrica";
        return parent::describir() . ". Esta bici es {$tipo} y ha recorrido {$this->getKm()} kms.";
    }
}

$bici1 = new Bici("Trek", "X1", "Azul", "si", 50);
$bici1->hacerKm(10); // Incrementa los kilómetros en 10

echo $bici1->describir();