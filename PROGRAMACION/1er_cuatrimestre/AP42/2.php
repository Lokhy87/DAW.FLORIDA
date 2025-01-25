<!DOCTYPE html>
<html>
<head>
    <title>EJERCICIO 2</title>
</head>
<body>
    <h1>Escribe un script para encontrar los duplicados sin usar funciones de array. 
        Coloca estos valores previamente en un array.</h1>

    <?php

// Genero variable
$arry = [];

// For para correr el array y poner datos
for ($i = 0; $i <= 10; $i++) {
    array_push($arry, rand(1, 100)); // Llenar el array con valores aleatorios
}

print_r($arry); // Imprimir el array generado
echo "<br>";

// Inicializo el array de duplicados
$duplicados = [];

// Detectar duplicados manualmente
for ($i = 0; $i < count($arry); $i++) {
    for ($j = $i + 1; $j < count($arry); $j++) {
        // Si se encuentran duplicados, los añado al array de duplicados
        if ($arry[$i] == $arry[$j] && !in_array($arry[$i], $duplicados)) {
            $duplicados[] = $arry[$i];
        }
    }
}

// Mostrar los duplicados encontrados
echo "Duplicados encontrados: ";
print_r($duplicados);

    ?>
</body>
</html>