<!DOCTYPE html>
<html>
<head>
    <title>EJERCICIO 5</title>
</head>
<body>
    <h1>Crea un script para contar cuantas repeticiones de cada valor aparecen en un array. 
        Puedes usar la función in_array y array_push si las consideras aplicable.</h1>

    <?php

// Genero array
$arry = [];

// For para correr el array y poner datos
for ($i = 0; $i <= 10; $i++) {
    array_push($arry, rand(1, 100)); // Llenar el array con valores aleatorios
}

print_r($arry); // Imprimir el array generado
echo "<br>";

$contados = [];
foreach ($arry as $valor){
    if(in_array($valor, array_keys($contados))){
        $contados[$valor]++;
    } else{
        $contados[$valor] = 1;
    }
}

// Imprimir el número de repeticiones para cada valor
foreach ($contados as $valor => $cantidad) {
    echo "El número $valor se repite $cantidad veces.<br>";
}


    ?>
</body>
</html>