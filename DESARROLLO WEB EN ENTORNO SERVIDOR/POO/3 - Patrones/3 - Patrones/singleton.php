<?php
class Singleton {
    private static $instancia = null;

    // Constructor privado para evitar instanciación directa
    private function __construct() {}

    // Método para obtener la única instancia de la clase
    public static function obtenerInstancia() {
        if (self::$instancia == null) {
            self::$instancia = new Singleton();
        }
        return self::$instancia;
    }
}

// Obtener la única instancia
$instancia1 = Singleton::obtenerInstancia();
$instancia2 = Singleton::obtenerInstancia();

var_dump($instancia1 === $instancia2); // true, ambas son la misma instancia
?>

