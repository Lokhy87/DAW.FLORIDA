<?php
echo "<h1>EJERCICIO 3</h1>
<h2>Programa que permita obtener una combinación de lotería primitiva (6 números entre 1 y 49). Cada número debe generarse mediante la llamada a la 
función dameNumero(), que retornará un número al azar entre 1 y 49. Los números no se pueden repetir.</h2>";  

// Codigo 
$combinacion = [];
// Funcion generar numero aleatorio 1 - 49
function dameNumero(){ 
    return random_int(1, 49);
}
// Bucle para generar 6 numeros
while (count($combinacion) < 6) {
    $numero = dameNumero();
    if (!in_array($numero, $combinacion)) {
        $combinacion[] = $numero;
    }
}
// Visualizacion 
echo "Combinación de lotería: " . implode(", ", $combinacion);
?>