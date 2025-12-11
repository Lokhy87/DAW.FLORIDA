<?php

class Coche
{
    public static $totalCoches = 0; // Atributo estático

    public function __construct()
    {
        self::$totalCoches++; // Incrementa el contador cada vez que se crea un coche
    }

    public static function mostrarTotalCoches()
    {
        echo "Total de coches creados: " . self::$totalCoches . "<br>";
    }
}

// Crear algunos objetos de la clase Coche
$coche1 = new Coche();
$coche2 = new Coche();
$coche3 = new Coche();

// Mostrar el total de coches creados usando el atributo estático
Coche::mostrarTotalCoches(); // Muestra: Total de coches creados: 3
?>

