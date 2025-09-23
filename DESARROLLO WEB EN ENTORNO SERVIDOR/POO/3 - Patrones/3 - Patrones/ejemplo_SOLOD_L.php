<?php
class Vehiculo {
    public function arrancar() {
        echo "El vehículo ha arrancado\n";
    }
}

class CocheElectrico extends Vehiculo {
    // Este método sobrescrito viola LSP al lanzar una excepción
    public function arrancar() {
        throw new Exception("Los coches eléctricos no pueden arrancar de esta manera");
    }
}

function iniciarVehiculo(Vehiculo $vehiculo) {
    $vehiculo->arrancar();
}

// Esto funcionaría bien
$vehiculo = new Vehiculo();
iniciarVehiculo($vehiculo);

// Esto causaría una excepción no esperada
$cocheElectrico = new CocheElectrico();
iniciarVehiculo($cocheElectrico);  // Viola LSP
?>

// ejemplo SOLID

<?php
class Vehiculo {
    public function arrancar() {
        echo "El vehículo ha arrancado\n";
    }
}

class CocheElectrico extends Vehiculo {
    // Sobrescribimos el método respetando el comportamiento esperado
    public function arrancar() {
        echo "El coche eléctrico ha arrancado en modo silencioso\n";
    }
}

function iniciarVehiculo(Vehiculo $vehiculo) {
    $vehiculo->arrancar();
}

// Esto funcionaría bien
$vehiculo = new Vehiculo();
iniciarVehiculo($vehiculo);

// Esto también funcionaría sin problemas y respetando el contrato del LSP
$cocheElectrico = new CocheElectrico();
iniciarVehiculo($cocheElectrico);
?>
