<!DOCTYPE html>
<html>
<head>
    <title>EJERCICIO 1</title>
</head>
<body>
    <h1>Escribe un script para mostrar en orden inverso los valores de un array. 
        Coloca estos valores previamente en un array.</h1>

    <?php
    $arry = [];

    for ($i = 0; $i <= 10; $i++){
        array_push($arry, rand(1,100));
    }

    var_dump($arry);

    

    ?>
</body>
</html>