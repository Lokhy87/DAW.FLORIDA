<?php

require_once("animal.php");

class Perro extends Animal {
    public function hacerSonido() {
        echo "{$this->getNombre()} de {$this->getEdad()} años de edad, dice: Guau Guau.<br>";
    }

}