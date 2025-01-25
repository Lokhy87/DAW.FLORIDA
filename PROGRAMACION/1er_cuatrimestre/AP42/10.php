<!DOCTYPE html>
<html>
<head>
    <title>EJERCICIO 10</title>
</head>
<body>
    <h1>Crea un script para encontrar y mostrar el array dividido en otros dos, de forma que sumen lo mismo a ambos lados de la división. 
        Suponemos que el array que le pasamos cumple la premisa.</h1>

    <?php
    
    // Array que cumple condicion
    $array = [1, 2, 4, 7, 5, 3, 6, 2, 5];

    $totalArrray = array_sum($array); // Suma todo el array

    // Comprobar si suma total es par
    if($totalArrray % 2 != 0){
        echo "No es posible dividir el array en dos partes con la misma suma";
    } else {
        $mitadSuma = $totalArrray / 2;

    }



    ?>
</body>
</html>