<!DOCTYPE html>
<html>
<head>
    <title>EJERCICIO 3</title>
</head>
<body>
    <h1>Escribe un script separar los valores de un array en dos arrays: los pares en uno y en el otro los impares.</h1>

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

$pares = [];
$impares = [];

// Foreach para separar en par/impar
foreach ($arry as $numero) {
    if($numero % 2 == 0){ 
        $pares[] = $numero;
    } else {
        $impares[] = $numero;
    }
}

// Imprimir los arrays en su lugar
echo "El array de los PARES es:";
print_r($pares);
echo "<br>";
echo "<br>";
echo "El array de los IMPARES es:";
print_r($impares);

    ?>
</body>
</html>