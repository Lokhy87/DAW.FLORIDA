<?php
// Clase base Vehiculo
class Vehiculo {
    // Atributos comunes a todos los vehículos
    public $color;
    public $velocidad;
    public $carburante;

    // Constructor de la clase base
    public function __construct($color, $velocidad, $carburante) {
        $this->color = $color;
        $this->velocidad = $velocidad;
        $this->carburante = $carburante;
    }

    // Método para arrancar el vehículo
    public function arrancar() {
        if ($this->carburante > 0) {
            echo "El vehículo de color $this->color ha arrancado.<br>";
        } else {
            echo "No hay suficiente carburante para arrancar el vehículo.<br>";
        }
    }

    // Método para detener el vehículo
    public function detener() {
        echo "El vehículo de color $this->color se ha detenido.<br>";
    }

    // Método para mostrar información general del vehículo
    public function mostrarInformacion() {
        echo "Color: $this->color<br>";
        echo "Velocidad: $this->velocidad km/h<br>";
        echo "Carburante: $this->carburante litros<br>";
    }
}

// Clase hija Moto que hereda de Vehiculo
class Moto extends Vehiculo {
    public $tipo_casco;

    // Constructor para inicializar Moto y los atributos heredados
    public function __construct($color, $velocidad, $carburante, $tipo_casco) {
        parent::__construct($color, $velocidad, $carburante); // Llamada al constructor de Vehiculo
        $this->tipo_casco = $tipo_casco;
    }

    // Método específico de Moto
    public function hacerCaballito() {
        echo "La moto está haciendo un caballito.<br>";
    }

    // Sobrescribir el método mostrarInformacion
    public function mostrarInformacion() {
        parent::mostrarInformacion();
        echo "Tipo de casco: $this->tipo_casco<br>";
    }
}

// Clase hija Coche que hereda de Vehiculo
class Coche extends Vehiculo {
    public $num_puertas;

    // Constructor para inicializar Coche y los atributos heredados
    public function __construct($color, $velocidad, $carburante, $num_puertas) {
        parent::__construct($color, $velocidad, $carburante); // Llamada al constructor de Vehiculo
        $this->num_puertas = $num_puertas;
    }

    // Método específico de Coche
    public function tocarClaxon() {
        echo "El coche está tocando el claxon: ¡Beep beep!<br>";
    }

    // Sobrescribir el método mostrarInformacion
    public function mostrarInformacion() {
        parent::mostrarInformacion();
        echo "Número de puertas: $this->num_puertas<br>";
    }
}

// Clase hija Patinete que hereda de Vehiculo
class Patinete extends Vehiculo {
    public $electrico;

    // Constructor para inicializar Patinete y los atributos heredados
    public function __construct($color, $velocidad, $carburante, $electrico) {
        parent::__construct($color, $velocidad, $carburante); // Llamada al constructor de Vehiculo
        $this->electrico = $electrico;
    }

    // Método específico de Patinete
    public function plegarPatinete() {
        echo "El patinete se ha plegado para facilitar su transporte.<br>";
    }

    // Sobrescribir el método mostrarInformacion
    public function mostrarInformacion() {
        parent::mostrarInformacion();
        echo "Es eléctrico: " . ($this->electrico ? "Sí" : "No") . "<br>";
    }
}

// Crear objetos de las clases hijas
$moto = new Moto("Rojo", 120, 10, "Integral");
$coche = new Coche("Azul", 150, 50, 4);
$patinete = new Patinete("Verde", 25, 0, true);

// Usar los métodos de cada objeto
echo "=== Información de la Moto ===<br>";
$moto->mostrarInformacion();
$moto->arrancar();
$moto->hacerCaballito();
$moto->detener();

echo "<br>=== Información del Coche ===<br>";
$coche->mostrarInformacion();
$coche->arrancar();
$coche->tocarClaxon();
$coche->detener();

echo "<br>=== Información del Patinete ===<br>";
$patinete->mostrarInformacion();
$patinete->arrancar(); // Aunque no tenga carburante, hereda el método
$patinete->plegarPatinete();
$patinete->detener();
?>
