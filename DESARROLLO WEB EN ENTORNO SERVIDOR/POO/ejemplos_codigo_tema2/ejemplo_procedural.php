<?php
// Definir un array de jugadores
$jugadores = [
    [
        'nombre' => 'Lionel',
        'apellidos' => 'Messi',
        'edad' => 36,
        'precio' => 120,
        'puntuacion_media' => 9.5,
        'puntuacion_ultima_jornada' => 10
    ],
    [
        'nombre' => 'Cristiano',
        'apellidos' => 'Ronaldo',
        'edad' => 38,
        'precio' => 100,
        'puntuacion_media' => 8.7,
        'puntuacion_ultima_jornada' => 7
    ]
];

// Función para cambiar el precio de un jugador
function cambiarPrecio(&$jugador, $nuevo_precio) {
    $jugador['precio'] = $nuevo_precio;
}

// Función para poner a un jugador a la venta
function ponerEnVenta(&$jugador) {
    echo "El jugador " . $jugador['nombre'] . " " . $jugador['apellidos'] . " está en venta por $" . $jugador['precio'] . " millones.<br>";
}

// Función para actualizar la puntuación de la última jornada y recalcular la media
function actualizarPuntuacionUltimaJornada(&$jugador, $nueva_puntuacion) {
    // Actualizamos la puntuación de la última jornada
    $jugador['puntuacion_ultima_jornada'] = $nueva_puntuacion;

    // Actualizamos la puntuación media de forma sencilla (puedes ajustar según la fórmula que prefieras)
    $jugador['puntuacion_media'] = ($jugador['puntuacion_media'] + $nueva_puntuacion) / 2;
}

// Ejemplo de uso
echo "=== Antes de actualizar ===<br>";
print_r($jugadores);

// Cambiar el precio de un jugador
cambiarPrecio($jugadores[0], 130);

// Poner al jugador en venta
ponerEnVenta($jugadores[0]);

// Actualizar la puntuación de la última jornada y recalcular la media
actualizarPuntuacionUltimaJornada($jugadores[1], 8);

echo "<br>=== Después de actualizar ===<br>";
print_r($jugadores);
?>
