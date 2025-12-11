<?php
// Definir la clase Jugador
class Jugador {
    public $nombre;
    public $apellidos;
    public $edad;
    public $precio;
    public $puntuacion_media;
    public $puntuacion_ultima_jornada;

    // Constructor para inicializar el jugador
    public function __construct($nombre, $apellidos, $edad, $precio, $puntuacion_media, $puntuacion_ultima_jornada) {
        $this->nombre = $nombre;
        $this->apellidos = $apellidos;
        $this->edad = $edad;
        $this->precio = $precio;
        $this->puntuacion_media = $puntuacion_media;
        $this->puntuacion_ultima_jornada = $puntuacion_ultima_jornada;
    }

    // Método para cambiar el precio del jugador
    public function cambiarPrecio($nuevo_precio) {
        $this->precio = $nuevo_precio;
    }

    // Método para poner al jugador en venta
    public function ponerEnVenta() {
        echo "El jugador $this->nombre $this->apellidos está en venta por \$$this->precio millones.<br>";
    }

    // Método para actualizar la puntuación de la última jornada y la media
    public function actualizarPuntuacionUltimaJornada($nueva_puntuacion) {
        $this->puntuacion_ultima_jornada = $nueva_puntuacion;
        // Actualizamos la puntuación media de forma sencilla
        $this->puntuacion_media = ($this->puntuacion_media + $nueva_puntuacion) / 2;
    }

    // Método para mostrar la información del jugador
    public function mostrarInformacion() {
        echo "Nombre: $this->nombre $this->apellidos<br>";
        echo "Edad: $this->edad<br>";
        echo "Precio: $this->precio millones<br>";
        echo "Puntuación Media: $this->puntuacion_media<br>";
        echo "Puntuación Última Jornada: $this->puntuacion_ultima_jornada<br><br>";
    }
}

// Crear jugadores como objetos
$jugador1 = new Jugador("Lionel", "Messi", 36, 120, 9.5, 10);
$jugador2 = new Jugador("Cristiano", "Ronaldo", 38, 100, 8.7, 7);

// Mostrar información antes de los cambios
echo "=== Antes de actualizar ===<br>";
$jugador1->mostrarInformacion();
$jugador2->mostrarInformacion();

// Cambiar el precio del jugador 1
$jugador1->cambiarPrecio(130);

// Poner al jugador 1 en venta
$jugador1->ponerEnVenta();

// Actualizar la puntuación de la última jornada del jugador 2 y recalcular la media
$jugador2->actualizarPuntuacionUltimaJornada(8);

// Mostrar información después de los cambios
echo "=== Después de actualizar ===<br>";
$jugador1->mostrarInformacion();
$jugador2->mostrarInformacion();
?>
