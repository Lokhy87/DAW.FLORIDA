<?php
echo "<h1>EJERCICIO 6</h1>
<h2>Crear una función que reciba un carácter y un número, y visualice una figura formada por esa letra de forma que, empezando por la impresión de este 
carácter, llegue a visualizar tantas filas como indica el número pasado incrementando en el número de caractéres por fila, para finalmente decrecer hasta 
la visualización de un único carácter, en decrementos equivalentes de 2. Por ejemplo, si la letra es * y el número es 4, debería escribir:

*
***
*****
*******
*****
***
*</h2>"; 

// Parametros
$caracter = "¡";
$numero = 6;
// Funcion 
function caracNum ($caracter, $numero){
    for ($i = 1; $i <= 2 * $numero - 1; $i += 2) {
        echo str_repeat($caracter, $i) . "<br>";
    }
    for ($i = 2 * $numero - 1; $i >= 1; $i -= 2){
        echo str_repeat($caracter, $i) . "<br>";
    }
}
caracNum($caracter, $numero);
?>