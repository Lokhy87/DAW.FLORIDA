<!DOCTYPE html>
<html>
<head>
    <title>PARES</title>
</head>
<body>
    <h1>Realiza un algoritmo para generar e imprimir los números pares que se encuentran entre 0 y 100.</h1>

    <?php
    for ($i = 0; $i <= 100; $i++) {
        if ($i %2 == 0) {
            echo "$i es numero par.<br>";
        }
    }
    ?>
</body>
</html>