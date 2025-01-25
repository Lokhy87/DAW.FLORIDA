<!DOCTYPE html>
<html>
<head>
    <title>EJERCICIO 9</title>
</head>
<body>
    <h1>Crea un script para encontrar pares de números que tienen un diferencia pasada por teclado, 
        por ejemplo: si la diferencia es 53, el par que cumple la condición es (39,92), tomando como array de datos [1, 15, 39, 75, 92].</h1>

    <?php

    // Array
    $array = [];

    for ($i = 0; $i <= 10; $i++) {
        array_push($array, rand(1, 100)); // Llenar el array con valores aleatorios
    }
    // Enseñar array 
    echo "<pre>"; 
    print_r($array);
    echo "</pre>";

    // Encontrar pares numeros con diferencia predeterminada
    $diferencia = 10;
    $paresdiferencia = 0;

    for ($i = 0; $i < count($array); $i++){
        for ($j = $i + 1; $j < count($array); $j++){
            if (abs($array[$i] - $array[$j]) == $diferencia){
                echo "Pares encontrados: (" . $array[$i] . ", " . $array[$j] . ")<br>";
                $paresdiferencia++; 
            } 
        }
    }

    // Si no se encontraron pares
    if ($paresdiferencia == 0) {
        echo "No se encontraron pares con la diferencia de $diferencia.";
    }

    ?>
</body>
</html>