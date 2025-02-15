<?php

require_once("animal.php");

class Gato extends Animal {
    public function hacerSonido() {
        echo "{$this->getNombre()} de {$this->getEdad()} años de edad, dice: Miau.<br>";
    }
    
}