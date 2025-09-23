<?php
class AreaCalculator {
    public function calcular($forma) {
        if ($forma instanceof Cuadrado) {
            return $forma->lado * $forma->lado;
        } elseif ($forma instanceof Circulo) {
            return pi() * ($forma->radio * $forma->radio);
        }
        // Si se quiere agregar otra forma, hay que modificar esta clase.
    }
}
?>

// con SOLID

<?php
interface Forma {
    public function calcularArea();
}

class Cuadrado implements Forma {
    public $lado;

    public function __construct($lado) {
        $this->lado = $lado;
    }

    public function calcularArea() {
        return $this->lado * $this->lado;
    }
}

class Circulo implements Forma {
    public $radio;

    public function __construct($radio) {
        $this->radio = $radio;
    }

    public function calcularArea() {
        return pi() * ($this->radio * $this->radio);
    }
}

class AreaCalculator {
    public function calcular(Forma $forma) {
        return $forma->calcularArea();
    }
}

$circulo = new Circulo(3);
$cuadrado = new Cuadrado(5);

$calculadora = new AreaCalculator();
echo $calculadora->calcular($circulo) . "\n";
echo $calculadora->calcular($cuadrado) . "\n";
?>

