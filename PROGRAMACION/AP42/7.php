<!DOCTYPE html>
<html>
<head>
    <title>EJERCICIO 7</title>
</head>
<body>
    <h1>Crea un script para desplazar los 0 al final del array, respetando el orden del resto de valores. Muestra el array. Puedes usar un array de prueba, 
        por ejemplo: [2, 5, 7, 0, 4, 0, 7, -5, 8, 0]. 
        Puedes usar array_splice, array_push y implode si te son útiles.</h1>

    <?php

    // Array
    $array = [2, 5, 7, 0, 4, 0, 7, -5, 8, 0];

    // Desplazar 0 al final 
    for ($i = 0; $i < count($array); $i++){
        if ($array[$i] == 0){
            $valor = $array[$i];
            array_splice($array, $i, 1); // Eliminar 0
            $array[] = $valor; // Añadir 0 al final
            $i--;
        }

    }
    
    echo "Array modificado: " . implode(", ", $array);

    ?>
</body>
</html>