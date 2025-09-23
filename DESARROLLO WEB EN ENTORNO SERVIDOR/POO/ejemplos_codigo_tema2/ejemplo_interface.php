<?php
// Definir la interfaz Vehiculo
interface Vehiculo {
    // Métodos que las clases que implementen esta interfaz deben definir
    public function arrancar();
    public function detener();
}

// Clase Coche que implementa la interfaz Vehiculo
class Coche implements Vehiculo {
    public function arrancar() {
        echo "El coche ha arrancado.<br>";
    }

    public function detener() {
        echo "El coche se ha detenido.<br>";
    }
}

// Clase Moto que implementa la interfaz Vehiculo
class Moto implements Vehiculo {
    public function arrancar() {
        echo "La moto ha arrancado.<br>";
    }

    public function detener() {
        echo "La moto se ha detenido.<br>";
    }
}

// Clase Bicicleta que implementa la interfaz Vehiculo
class Bicicleta implements Vehiculo {
    public function arrancar() {
        echo "La bicicleta ha empezado a moverse.<br>";
    }

    public function detener() {
        echo "La bicicleta se ha detenido.<br>";
    }
}

// Crear instancias de las clases que implementan la interfaz Vehiculo
$coche = new Coche();
$moto = new Moto();
$bicicleta = new Bicicleta();

// Usar los métodos definidos en la interfaz
$coche->arrancar();
$coche->detener();

$moto->arrancar();
$moto->detener();

$bicicleta->arrancar();
$bicicleta->detener();
?>

