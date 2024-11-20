<!DOCTYPE html>
<html>
<head>
    <title>EJERCICIO 1</title>
</head>
<body>
    <h1>Escribe un script para mostrar en orden inverso los valores de un array. 
        Coloca estos valores previamente en un array.</h1>

    <?php

    // Genero 
    $arry = [];

    // For para correr el array y poniendo datos
    for ($i = 0; $i <= 10; $i++){
        array_push($arry, rand(1,100));
    }

    print_r($arry); // Imprimir resultado
    echo "<br>";

    // Hacer el inverso del array original
    $arrayInvers = array_reverse($arry);

    print_r($arrayInvers); // Imprimir resultado

    

    ?>
</body>
</html>