<!DOCTYPE html>
<html>
<head>
    <title>EJERCICIO 4</title>
</head>
<body>
    <h1>Modifica el script anterior, de forma que, en vez de crear dos arrays, los números pares se almacenen en la fila 0 de un array bi-dimensional, 
        y los impares en la fila 1 del mismo array. 
        Almacena inicialmente los números en un array uni-dimensional y haz la separación a posteriori.</h1>

    <?php

// Genero array
$arry = [];

// For para correr el array y poner datos
for ($i = 0; $i <= 10; $i++) {
    array_push($arry, rand(1, 100)); // Llenar el array con valores aleatorios
}

print_r($arry); // Imprimir el array generado
echo "<br>";
echo "<br>";

$arrayOrdenado = [
    0 => [], // Fila 0 para los números pares
    1 => []  // Fila 1 para los números impares
];

// Foreach para separar en par/impar
foreach ($arry as $numero) {
    if($numero % 2 == 0){ 
        $arrayOrdenado[0][] = $numero;
    } else {
        $arrayOrdenado[1][] = $numero;
    }
}

echo "El array final con filas pares y columnas impares es:";
print_r($arrayOrdenado);

    ?>
</body>
</html>