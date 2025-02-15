<?php

require_once("animal.php");

class Pajaro extends Animal {
    public function hacerSonido() {
        echo "{$this->getNombre()} de {$this->getEdad()} años de edad, dice: Pio Pio.<br>";
    }
}