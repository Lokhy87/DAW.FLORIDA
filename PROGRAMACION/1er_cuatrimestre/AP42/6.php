<!DOCTYPE html>
<html>
<head>
    <title>EJERCICIO 6</title>
</head>
<body>
    <h1>Haz un array con 10 notas. A continuación, elimina la nota mas baja y la más alta (solo una, en caso de estar repetida). Haz la media de las que quedan. 
        Puedes comprobar si los datos són numéricos con la función is_numeric. Además puedes usar también array_splice y implode si te son útiles.</h1>

    <?php

    // Array notas 
    $arry = [];

    for ($i = 0; $i <= 9; $i++){
        array_push($arry, rand(1,10));
    }

    print_r($arry); // Imprimir resultado
    echo "<br>";

    // Eliminar notas
    $maxIndice = array_search(max($arry), $arry);
    unset($arry[$maxIndice]); // Eliminar nota mas alta
    $minIndice = array_search(min($arry), $arry);
    unset($arry[$minIndice]); // Eliminar nota mas baja
    echo "<br>";

    $arry = array_values($arry);
    print_r($arry);
    echo "<br>";

    // Media array limpio
    $media = array_sum($arry) / count($arry);
    print_r($media);
    echo "<br>";

    // Comprobar si los datos son numericos 
    $numericos = true;

    foreach ($arry as $valor){
        if (!is_numeric($valor)){
            echo "El array contiene un valor no numérico.";
            break;
        }
    }
    
    if ($numericos) {
        echo "Todos los datos son numéricos.<br>";
    }

   
    ?>
</body>
</html>