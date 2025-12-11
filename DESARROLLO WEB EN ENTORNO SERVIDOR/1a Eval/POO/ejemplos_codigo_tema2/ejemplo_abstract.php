<?php
// Definir la clase abstracta Animal
abstract class Animal {
    public $nombre;

    public function __construct($nombre) {
        $this->nombre = $nombre;
    }

    // Método concreto que puede ser heredado por todas las subclases
    public function dormir() {
        echo "$this->nombre está durmiendo.<br>";
    }

    // Método abstracto: cada subclase debe definir su propia versión
    abstract public function hacerSonido();
}

// Subclase Perro que hereda de Animal
class Perro extends Animal {
    // Implementar el método abstracto
    public function hacerSonido() {
        echo "$this->nombre dice: ¡Guau Guau!<br>";
    }
}

// Subclase Gato que hereda de Animal
class Gato extends Animal {
    // Implementar el método abstracto
    public function hacerSonido() {
        echo "$this->nombre dice: ¡Miau!<br>";
    }
}

// Crear instancias de Perro y Gato
$perro = new Perro("Rex");
$gato = new Gato("Michi");

// Usar métodos de las subclases
$perro->hacerSonido(); // Rex dice: ¡Guau Guau!
$gato->hacerSonido();  // Michi dice: ¡Miau!

// El método concreto dormir() es compartido por ambas clases
$perro->dormir();  // Rex está durmiendo.
$gato->dormir();   // Michi está durmiendo.
?>

